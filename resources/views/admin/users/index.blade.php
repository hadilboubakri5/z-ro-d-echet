@extends('layouts.admin')

@section('title', 'Gestion Utilisateurs')

@section('content')

@if(session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">

    <div>
        <h2 style="font-size:26px; color:#064f13; font-weight:800;">
            Liste des utilisateurs
        </h2>

        <p style="color:#666; margin-top:6px;">
            Gérez les comptes utilisateurs et les rôles.
        </p>
    </div>

    <a href="{{ route('admin.users.create') }}" class="btn">
        <i class="fa-solid fa-plus"></i>
        Ajouter utilisateur
    </a>

</div>

<table>

    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Date création</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

        @forelse($users as $user)

            <tr>

                <td>{{ $user->id }}</td>

                <td>
                    <strong>{{ $user->name }}</strong>
                </td>

                <td>{{ $user->email }}</td>

                <td>

                    @if($user->role === 'admin')

                        <span style="
                            background:#dcfce7;
                            color:#166534;
                            padding:8px 14px;
                            border-radius:999px;
                            font-size:13px;
                            font-weight:700;
                        ">
                            Admin
                        </span>

                    @else

                        <span style="
                            background:#e5e7eb;
                            color:#374151;
                            padding:8px 14px;
                            border-radius:999px;
                            font-size:13px;
                            font-weight:700;
                        ">
                            User
                        </span>

                    @endif

                </td>

                <td>
                    {{ $user->created_at->format('d/m/Y') }}
                </td>

                <td style="display:flex; gap:10px;">

                    <a href="{{ route('admin.users.edit', $user) }}" class="btn">
                        Modifier
                    </a>

                    <form
                        action="{{ route('admin.users.destroy', $user) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Supprimer cet utilisateur ?')"
                        >
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" style="text-align:center; padding:30px;">
                    Aucun utilisateur trouvé.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<div style="margin-top:24px;">
    {{ $users->links() }}
</div>

@endsection