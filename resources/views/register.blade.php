<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Nom complet" required>

    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="Mot de passe" required>

    <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>

    <button type="submit">Ajouter</button>

    <p>
        Vous avez déjà un compte ?
        <a href="{{ route('login') }}">Connectez-vous</a>
    </p>
</form>