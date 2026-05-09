<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Zéro Déchet</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: #f0f8f6;
            color: #1a3a32;
            line-height: 1.6;
            padding-top: 90px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: rgba(248, 250, 252, 0.95);
            border-bottom: 1px solid #e5e7eb;
            backdrop-filter: blur(12px);
        }

        .header-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 800;
            font-size: 1.5rem;
            color: #064e3b;
            letter-spacing: -0.03em;
            font-style: italic;
        }

        .logo svg {
            width: 32px;
            height: 32px;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links button {
            background: none;
            border: none;
            cursor: pointer;
            color: #475569;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.2s;
            letter-spacing: 0.01em;
        }

        .nav-links button:hover {
            color: #059669;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .cta-button {
            background: #115e2f;
            color: #ffffff;
            border: none;
            border-radius: 999px;
            padding: 0.75rem 1.4rem;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.2s, background 0.2s;
        }

        .cta-button:hover {
            background: #0f532a;
            transform: translateY(-1px);
        }

        .icon-buttons {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .icon-button {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            border: none;
            background: #f8fafc;
            color: #475569;
            cursor: pointer;
            transition: background 0.2s;
        }

        .icon-button:hover {
            background: #ecfdf5;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
        }

        .header-section {
            padding: 4rem 1rem;
            background: linear-gradient(135deg, rgba(0, 34, 1, 0.05) 0%, #f0f8f6 50%, rgba(139, 195, 74, 0.05) 100%);
            max-width: 1200px;
            margin: 0 auto;
        }

        .header-section h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #1a3a32;
            margin-bottom: 1rem;
        }

        .header-section p {
            font-size: 1.125rem;
            color: rgba(26, 58, 50, 0.7);
            max-width: 600px;
        }

        .contact-info-section {
            padding: 4rem 1rem;
            background: white;
            max-width: 1200px;
            margin: 0 auto;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .info-card {
            padding: 2rem;
            background: #f0f8f6;
            border: 1px solid #ddd;
            border-radius: 0.75rem;
            transition: box-shadow 0.3s;
        }

        .info-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-card svg {
            width: 48px;
            height: 48px;
            margin-bottom: 1rem;
        }

        .info-card h3 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1a3a32;
            margin-bottom: 0.5rem;
        }

        .info-card p {
            color: rgba(26, 58, 50, 0.7);
            margin-bottom: 1rem;
        }

        .info-card a {
            color: #002201;
            font-weight: 600;
            transition: text-decoration 0.3s;
        }

        .info-card a:hover {
            text-decoration: underline;
        }

        .form-section {
            padding: 5rem 1rem;
            background: #f0f8f6;
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .form-container h2 {
            font-size: 2.25rem;
            font-weight: bold;
            color: #1a3a32;
            text-align: center;
            margin-bottom: 3rem;
        }

        .success-message,
        .error-message {
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            margin-bottom: 1.5rem;
            display: none;
        }

        .success-message.show,
        .error-message.show {
            display: block;
        }

        .success-message {
            background-color: rgba(139, 195, 74, 0.1);
            border: 1px solid #8bc34a;
            color: #2d6a1f;
        }

        .error-message {
            background-color: rgba(220, 38, 38, 0.1);
            border: 1px solid #dc2626;
            color: #991b1b;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #1a3a32;
            margin-bottom: 0.5rem;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #002201;
        }

        textarea {
            resize: none;
            min-height: 150px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
        }

        .checkbox-group label {
            margin-bottom: 0;
            font-weight: normal;
            font-size: 0.875rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 1rem;
            background-color: #002201;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        button[type="submit"]:hover {
            opacity: 0.9;
        }

        .form-note {
            text-align: center;
            color: rgba(26, 58, 50, 0.6);
            font-size: 0.875rem;
            margin-top: 2rem;
        }

        .faq-section {
            padding: 5rem 1rem;
            background: white;
            max-width: 1200px;
            margin: 0 auto;
        }

        .faq-section h2 {
            font-size: 2.25rem;
            font-weight: bold;
            color: #1a3a32;
            text-align: center;
            margin-bottom: 3rem;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            gap: 1.5rem;
        }

        .faq-item {
            padding: 1.5rem;
            background: #f0f8f6;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
        }

        .faq-item h3 {
            font-size: 1.125rem;
            font-weight: bold;
            color: #1a3a32;
            margin-bottom: 0.75rem;
        }

        .faq-item p {
            color: rgba(26, 58, 50, 0.7);
        }

        footer {
            background-color: #1a3a32;
            color: #f0f8f6;
            padding: 3rem 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-column h3,
        .footer-column h4 {
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-column p,
        .footer-column a {
            color: rgba(240, 248, 246, 0.8);
            font-size: 0.875rem;
        }

        .footer-column a:hover {
            color: #f0f8f6;
        }

        .footer-column ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(240, 248, 246, 0.2);
            padding-top: 2rem;
            text-align: center;
            color: rgba(240, 248, 246, 0.6);
            font-size: 0.875rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-inner">
            <a href="/" class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M6.5 3c-1 1.5-2.5 4.5-2.5 8.5 0 6 3 11 8 13.5 5-2.5 8-7.5 8-13.5 0-4-1.5-7-2.5-8.5-1 1-2 3-2 5-1-2-2-4-3.5-5-1.5 1-2.5 3-3.5 5-1-2-1.5-4-2.5-5z"/>
                </svg>
                <span>Zéro Déchet</span>
            </a>
            <nav class="nav-links">
                <button onclick="window.location.href='/'">Accueil</button>
                <button onclick="window.location.href='/solutions'">Solutions</button>
                <button onclick="window.location.href='/impact'">Impact</button>
                <button onclick="window.location.href='/assistant'">Assistant IA</button>
                <button onclick="window.location.href='/blog'">Blog</button>
                <button onclick="window.location.href='/contact'">Contact</button>
            </nav>
            <div class="icon-buttons">
                <button class="cta-button" onclick="navigateToHome()">Retour à l'accueil</button>
                <button class="icon-button" aria-label="Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </button>
                <button class="icon-button" aria-label="Notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <section class="header-section">
        <h1>Nous Contacter</h1>
        <p>Avez-vous des questions sur notre mission zéro déchet? Nous aimerions vous entendre. Remplissez le formulaire ci-dessous ou utilisez l'une de nos coordonnées de contact.</p>
    </section>

    <section class="contact-info-section">
        <div class="cards-grid">
            <div class="info-card">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#002201" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <path d="M22 6l-10 7L2 6"/>
                </svg>
                <h3>Email</h3>
                <p>Envoyez-nous un email et nous vous répondrons dès que possible.</p>
                <a href="mailto:hello@zerodechet.fr">hello@zerodechet.fr</a>
            </div>

            <div class="info-card">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#8bc34a" stroke-width="2">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
                <h3>Téléphone</h3>
                <p>Appelez-nous pendant nos heures de bureau.</p>
                <a href="tel:22080734">22080734</a>
            </div>

            <div class="info-card">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#ffcc00" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
                <h3>Adresse</h3>
                <p>REGUS-TUNIS, Berges du Lac<br>2 Rue de l'EURO</p>
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="form-container">
            <h2>Envoyez-nous un Message</h2>

            <div class="success-message" id="successMessage">
                Merci! Votre message a été envoyé avec succès. Nous vous répondrons bientôt.
            </div>
            <div class="error-message" id="errorMessage"></div>

            <form id="contactForm" method="POST" action="/contact">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nom Complet</label>
                        <input type="text" id="name" name="name" placeholder="Votre nom" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <select id="subject" name="subject" required>
                        <option value="">Sélectionnez un sujet</option>
                        <option value="enterprise">Partenariat Entreprise</option>
                        <option value="individual">Consultation Individuelle</option>
                        <option value="event">Événement ou Workshop</option>
                        <option value="partnership">Proposition de Partenariat</option>
                        <option value="other">Autre</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Votre message..." required></textarea>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="consent" name="consent" required>
                    <label for="consent">J'accepte d'être contacté par email pour discuter de ma demande</label>
                </div>

                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" width="20" height="20">
                        <circle cx="12" cy="12" r="1"/>
                        <path d="M12 19V5M19 12H5"/>
                    </svg>
                    Envoyer le Message
                </button>
            </form>

            <p class="form-note">
                Temps de réponse moyen: 24 heures<br>
                Nous traitons tous les messages avec soin et attention.
            </p>
        </div>
    </section>

    <section class="faq-section">
        <h2>Questions Fréquemment Posées</h2>
        <div class="faq-container">
            <div class="faq-item">
                <h3>Combien de temps faut-il pour passer au zéro déchet?</h3>
                <p>Le délai varie en fonction de vos habitudes actuelles et de votre engagement. Certains voient des changements en quelques semaines, tandis que d'autres prennent plusieurs mois. Nous vous accompagnerons à chaque étape.</p>
            </div>

            <div class="faq-item">
                <h3>Travaillez-vous avec des entreprises?</h3>
                <p>Oui! Nous proposons des programmes spécialisés pour les entreprises cherchant à réduire leur empreinte environnementale. Contactez-nous pour discuter de partenariats possibles.</p>
            </div>

            <div class="faq-item">
                <h3>Quels sont vos tarifs?</h3>
                <p>Nos tarifs varient selon les services et le niveau de personnalisation. Nous proposons des consultations gratuites pour évaluer vos besoins.</p>
            </div>

            <div class="faq-item">
                <h3>Pouvez-vous venir dans mon domicile/entreprise?</h3>
                <p>Nous proposons des consultations en ligne et sur site. Contactez-nous pour planifier une visite adaptée à vos besoins.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" width="20" height="20">
                            <path d="M6.5 3c-1 1.5-2.5 4.5-2.5 8.5 0 6 3 11 8 13.5 5-2.5 8-7.5 8-13.5 0-4-1.5-7-2.5-8.5-1 1-2 3-2 5-1-2-2-4-3.5-5-1.5 1-2.5 3-3.5 5-1-2-1.5-4-2.5-5z"/>
                        </svg>
                        Zéro Déchet
                    </h3>
                    <p>Rejoignez notre mouvement pour un avenir sans déchet et plus durable.</p>
                </div>

                <div class="footer-column">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Nous Joindre</h4>
                    <p><a href="mailto:hello@zerodechet.fr">hello@zerodechet.fr</a></p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Zéro Déchet. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        function navigateToHome() {
            window.location.href = '/';
        }

        const form = document.getElementById('contactForm');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            successMessage.classList.remove('show');
            errorMessage.classList.remove('show');
            errorMessage.textContent = '';

            const formData = new FormData(this);

            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    successMessage.classList.add('show');
                    this.reset();
                } else {
                    const errors = data.errors ? data.errors.join(' - ') : (data.message || 'Une erreur est survenue');
                    errorMessage.textContent = errors;
                    errorMessage.classList.add('show');
                }
            } catch (error) {
                errorMessage.textContent = 'Erreur réseau, réessayez plus tard.';
                errorMessage.classList.add('show');
            }
        });
    </script>
</body>
</html>
