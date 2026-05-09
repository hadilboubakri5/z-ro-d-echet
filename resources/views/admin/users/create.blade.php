@extends('layouts.admin')

@section('title', 'Ajouter Utilisateur')

@section('content')

<h2 style="
    font-size:28px;
    color:#064f13;
    margin-bottom:28px;
    font-weight:800;
">
    Nouvel utilisateur
</h2>

<form action="{{ route('admin.users.store') }}" method="POST">

    @csrf

    <label>Nom complet</label>

    <input
        type="text"
        name="name"
        value="{{ old('name') }}"
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
        value="{{ old('email') }}"
        required
    >

    @error('email')
        <div style="color:red; margin-bottom:14px;">
            {{ $message }}
        </div>
    @enderror


    <label>Rôle</label>

    <select name="role" required>

        <option value="user">
            Utilisateur
        </option>

        <option value="admin">
            Administrateur
        </option>

    </select>


    <label>Mot de passe</label>

    <input
        type="password"
        name="password"
        required
    >

    @error('password')
        <div style="color:red; margin-bottom:14px;">
            {{ $message }}
        </div>
    @enderror


    <button class="btn">
        <i class="fa-solid fa-floppy-disk"></i>
        Enregistrer
    </button>

</form>

@endsection