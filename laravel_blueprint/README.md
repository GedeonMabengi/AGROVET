# Laravel + React + Tailwind + Inertia (Blueprint monolithique)

Ce dossier contient un **squelette fonctionnel** pour implémenter votre marketplace SPA avec 3 rôles : client, vendeur, admin/support.

## Démarrage dans un vrai projet Laravel
1. Créer un projet Laravel (latest): `composer create-project laravel/laravel agrovet`
2. Installer Inertia + React + Tailwind (starter Breeze):
   - `composer require laravel/breeze --dev`
   - `php artisan breeze:install react`
   - `npm install && npm run build`
3. Copier les fichiers de ce blueprint dans votre projet Laravel réel.
4. Déclarer le middleware `role` dans `bootstrap/app.php` (Laravel 11+) ou `Kernel.php`.
5. Lancer les migrations : `php artisan migrate`

## Fonctionnalités couvertes
- Catalogue produit, détail produit
- Favoris (wishlist)
- Panier + checkout avec coupon
- Avis clients avec modération admin
- Espace vendeur (CRUD simplifié)
- Dashboard admin et actions de modération

## Extensions à implémenter ensuite
- Paiement réel (Stripe, PayPal, Flutterwave)
- Chat temps réel (Laravel Reverb / Pusher)
- Tickets support complets
- Upload image produit (spatie medialibrary ou stockage S3)
- Notifications email/push
