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

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'email'));

        return redirect()->route('users.index')->with('sucsess', 'Dados do usuário atulaizados com Sucesso.');
    }
}