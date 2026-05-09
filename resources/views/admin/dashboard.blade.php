@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    .stats {
        display:grid;
        grid-template-columns:repeat(3, 1fr);
        gap:22px;
    }

    .stat {
        background:#f7f8f4;
        border-radius:20px;
        padding:28px;
    }

    .stat h2 {
        font-size:42px;
        color:#064f13;
        margin-bottom:8px;
    }

    .stat p {
        color:#555;
        font-weight:700;
    }
</style>

<div class="stats">
    <div class="stat">
        <h2>{{ $usersCount }}</h2>
        <p>Utilisateurs</p>
    </div>

    <div class="stat">
        <h2>{{ $produitsCount }}</h2>
        <p>Produits</p>
    </div>

    <div class="stat">
        <h2>{{ $defisCount }}</h2>
        <p>Défis</p>
    </div>
</div>

@endsection