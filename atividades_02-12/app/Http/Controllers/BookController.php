<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Formulário com input de ID
    public function createWithId()
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }

        return view('books.create-id');
    }

    // Salvar livro com input de ID
    public function storeWithId(Request $request)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $bookData = $validated;

        if ($request->hasFile('cover_image')) {

            $path = $request->file('cover_image')->store('covers', 'public');
            $bookData['cover_image'] = $path;
        } else {
            $bookData['cover_image'] = null;
        }

        Book::create($bookData);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
    }

    // Formulário com input select
    public function createWithSelect()
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }

        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('books.create-select', compact('publishers', 'authors',
            'categories'));
    }

    // Salvar livro com input select
    public function storeWithSelect(Request $request)
    {
        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };
      
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $bookData = $validated;

        if ($request->hasFile('cover_image')) {

            $path = $request->file('cover_image')->store('covers', 'public');
            $bookData['cover_image'] = $path;
        } else {
            $bookData['cover_image'] = null;
        }

        Book::create($bookData);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');

    }

    public function edit(Book $book)
    {
        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };
      

        $publishers = Publisher::all();
        $authors = Author::all();
        $categories = Category::all();

        return view('books.edit', compact('book', 'publishers', 'authors',
            'categories'));
    }

    public function update(Request $request, Book $book)
    {
        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };
      

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $bookData = $validated;

        // lógica de troca de imagem
        $path = $book->cover_image;
        if ($request->hasFile('cover_image')) {

            $book->deleteCoverImage();
            $path = $request->file('cover_image')->store('covers', 'public');
        }

        $bookData['cover_image'] = $path;
        $book->update($bookData);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function show(Book $book)
    {
        // Carregando autor, editora e categoria do livro com eager loading
        $book->load(['author', 'publisher', 'category']);

        // carregar os empréstimos do livro com os usuários que o emprestaram
        $users = User::all();

        return view('books.show', compact('book', 'users'));

    }

    public function index()
    {
        // Carregar os livros com autores usando eager loading e paginação
        $books = Book::with('author')->paginate(20);

        return view('books.index', compact('books'));

    }

    public function destroy(Book $book)
    {
        if ( !in_array( auth()->user()->role, ['admin', 'librarian'])){
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        };
      

        $book->deleteCoverImage();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso.');
    }
}
