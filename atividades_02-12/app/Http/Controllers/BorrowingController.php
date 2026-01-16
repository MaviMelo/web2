<?php

/**
 * controlador BorrowingController implementa as funções necessárias para registrar empréstimos e devoluções de livros.
 */

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function store(Request $request, Book $book)
    {

        // dd( /* auth()->user() ,*/ $request->all(), $book  );

        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // $root = $request->root();  // retorna o host e a porta, tipo: "https://localhost:8000".

        if (Borrowing::where('book_id', $book->id)->whereNull('returned_at')->exists()) {
            // echo '<script>
            // alert("Este livro já está emprestado. Não é possível um novo empréstimo. Veja as pendências do Livro: '.$book->title.'"); window.history.back();
            // </script>';
            
            // return redirect()->back()->with('error', 'Este livro já está emprestado. Não é possível um novo empréstimo. Veja as pendências do Livro: '.$book->title.'');
            return(
                '<script>
                    alert("Este livro já está emprestado. Não é possível um novo empréstimo. Veja as pendências do Livro: '.$book->title.'"); 
                    
                    window.history.back();
                </script>'
            );
        }
            
        $borrowingCount = Borrowing::where('user_id', $request->user_id)
            ->where('returned_at', null)->count();    // Conta quantos registros de emprestimos tem associado ao ID do usuário/cliente

        $user = User::find($request->user_id);

        // limitar os eprestimos de livros até cinco livros por cliente/usuário.
        if ($borrowingCount >= 5) {
            exit(                
                '<script>
                
                    if (confirm("Este Usuário (nome: '.$user->name.') já atingiu o número máximo de pendências de devolução de livros (máximo: 5 livros). Não é possível um novo empréstimo. Click em \\"OK\\" Veja as pendências do Usuério.")){
                    
                    window.location.href = "'.route('users.show', $request->user_id).'";
                
                    }else{
                        window.history.back();
                    }
                
                </script>'
                );
                }
                
        if($user->debit > 0){
            // dd($request, $book);
            $user = User::find($request->user_id);
            exit(                
                '<script> 
                    if (confirm("O usuário '.$user->name.' tem pendências de multas a serem quitadas (R$ '.$user->debit.'). Resolva as pendências entes de um novo empréstimo. \\n Click em \\"OK\\" para ver/editar as pendências do Usuário.")){
                        window.location.href = "'.route('users.show', $request->user_id).'";
                    }else{  
                        window.history.back();
                    }  
                </script>'
            );
        };
     
        Borrowing::create([
            'user_id' => $request->user_id,
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);
        
        return redirect()->route('books.show', $book)->with('success', 'Empréstimo
        registrado com sucesso.');
    }
    
    public function returnBook(Borrowing $borrowing)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        
        $daysDiff = Carbon::parse($borrowing->borrowed_at)
        ->diffinDays($borrowing->returned_at);      
        
        if ($daysDiff  > 15){
            $user = User::find($borrowing->user_id);
            $user->debit += 0.50 * $daysDiff;
            $user->save();
            // dd( print_r($user));
        };
        
        $borrowing->update(['returned_at' => now()]);
        
         // dd( $borrowing, var_dump($daysDiff) );        
        
        return redirect()->route('books.show', $borrowing->book_id)->with('success', 'Devolução registrada com sucesso.');
        
    }
    
    public function userBorrowings(User $user)
    {
        $borrowings = $user->books()->withPivot('borrowed_at', 'returned_at')->get();
        
        return view('users.borrowings', compact('user', 'borrowings'));
    }
    
}
