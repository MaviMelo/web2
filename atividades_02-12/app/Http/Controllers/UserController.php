<?php
/**
 * Excluído create e store porque o registro de usuários já está implementado pelo scaffolding 
 * padrão do Laravel. Excluído destroy para evitar exclusão direta de usuários.
 * Implementado sistema de paginação na listagem de usuários.
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::paginate(10); // Paginação de 10 usuários por página

            if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
                abort(403, 'Acesso não autorizado. Apenas funcionários.');
            };

        return view('users.index', compact('users'));

    }

    public function show(User $user)
    {
        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // $user->update($request->only('name', 'email', ' role'));

        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };

        $validate = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email,' . $user->id,
            'payment'=>'nullable|numeric|min:0|max:'.$user->debit,
            'role'=>'nullable|string|in:admin,librarian,client' // Só aceita esses valores (ENUM do Banco de dados). 
        ]);

        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->debit -= $validate['payment'];
        $user->role = $validate['role'];

        $user->save();

        return redirect()->route('users.index')->with('success', '<html> Dados do usuário <a href="'.route('users.show', $user->id).'">'. e($user->name) .'</a> atualizados com Sucesso.</html>');
    }
};