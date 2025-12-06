@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Usuário</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @method('PUT')
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            @if(auth()->user()->role ==='admin')
            <div class="mb-3">
                <label for="role" class="form-label">Tipo de usuário</label>
                <select name="role" id="role" class="form-control">
                    <option value="{{ old('role', $user->role) }}" >Atualmente: {{ old('role', $user->role) }}</option>
                    <option value="client">Cliente (client)</option>
                    <option value="librarian">Bibliotecário (librarian)</option>
                    <option value="admin">Administrador (Admin)</option>
                </select>
            </div>
            @endif
            
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
