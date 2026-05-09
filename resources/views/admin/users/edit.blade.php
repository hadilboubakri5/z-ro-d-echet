@extends('layouts.admin')

@section('title', 'Modifier Utilisateur')

@section('content')

<h2 style="
    font-size:28px;
    color:#064f13;
    margin-bottom:28px;
    font-weight:800;
">
    Modifier utilisateur
</h2>

<form
    action="{{ route('admin.users.update', $user) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <label>Nom complet</label>

    <input
        type="text"
        name="name"
        value="{{ old('name', $user->name) }}"
        required
    >

    @error('name')
        <div style="color:red; margin-bottom:14px;">
            {{ $message }}
        </div>
    @enderror


    <label>Email</label>

    <input
        type="email"
        name="email"
        value="{{ old('email', $user->email) }}"
        required
    >

    @error('email')
        <div style="color:red; margin-bottom:14px;">
            {{ $message }}
        </div>
    @enderror


    <label>Rôle</label>

    <select name="role" required>

        <option
            value="user"
            {{ $user->role === 'user' ? 'selected' : '' }}
        >
            Utilisateur
        </option>

        <option
            value="admin"
            {{ $user->role === 'admin' ? 'selected' : '' }}
        >
            Administrateur
        </option>

    </select>


    <label>Nouveau mot de passe (optionnel)</label>

    <input
        type="password"
        name="password"
        placeholder="Laisser vide pour conserver l'ancien mot de passe"
    >

    @error('password')
        <div style="color:red; margin-bottom:14px;">
            {{ $message }}
        </div>
    @enderror


    <button class="btn">
        <i class="fa-solid fa-pen"></i>
        Modifier
    </button>

</form>

@endsection