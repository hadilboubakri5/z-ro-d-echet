<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <input type="email" name="email" placeholder="Adresse email" required>

    <input type="password" name="password" placeholder="Mot de passe" required>

    <button type="submit">Se connecter</button>

    <p>
        Pas encore de compte ?
        <a href="{{ route('register') }}">Créer un compte</a>
    </p>
</form><form method="POST" action="{{ route('login.store') }}">
    @csrf

    <input type="email" name="email" placeholder="Adresse email" required>

    <input type="password" name="password" placeholder="Mot de passe" required>

    <button type="submit">Se connecter</button>

    <p>
        Pas encore de compte ?
        <a href="{{ route('register') }}">Créer un compte</a>
    </p>
</form>