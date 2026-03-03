# Parcours utilisateur — AGROVET Marketplace

## 1) Parcours Client
1. **Inscription / Connexion** : le client crée un compte, vérifie son email, puis complète son profil.
2. **Navigation catalogue** : il parcourt les produits (catégorie, recherche, filtres, tri), consulte la fiche détail, lit les avis et notes.
3. **Favoris** : il ajoute des produits dans sa wishlist pour les retrouver plus tard.
4. **Panier** : il ajoute des articles, ajuste les quantités, applique un coupon de réduction.
5. **Checkout** : il choisit son adresse, son mode de livraison, puis paie. Une commande est créée avec ses lignes.
6. **Suivi** : il voit le statut de commande (pending, paid, shipped, delivered).
7. **Post-achat** : il laisse un commentaire/avis + note étoilée pour chaque produit acheté.
8. **Communication** : il peut ouvrir une conversation avec le vendeur ou un ticket support.

## 2) Parcours Vendeur
1. **Activation du rôle vendeur** : un utilisateur devient vendeur via un flag de rôle (ou onboarding KYC).
2. **Création catalogue** : il crée ses produits (prix, stock, images, description, catégorie).
3. **Gestion commerciale** : il crée des coupons/remises, active des promotions et suit la performance.
4. **Gestion commandes** : il consulte les commandes contenant ses produits, prépare et expédie.
5. **Messagerie** : il répond aux clients dans les conversations.
6. **Paiements** : il visualise ses ventes et retraits (logique d'encaissement via payout).

## 3) Parcours Admin / Support
1. **Supervision globale** : l'admin voit dashboard, produits, utilisateurs, commandes, tickets.
2. **Modération** : il modère avis/commentaires, bloque/suspend comptes, masque/supprime produits non conformes.
3. **Contenu légal** : il maintient pages confidentialité et conditions d'utilisation.
4. **Support** : il gère les tickets et discussions en escalade.
5. **Offres globales** : il peut créer/valider coupons et remises globales.

## 4) Sécurité & Autorisations
- **Client** : actions d'achat, favoris, avis, chat, tickets.
- **Vendeur** : droits client + CRUD sur ses produits, coupons, promotions.
- **Admin** : droits globaux (modération, gestion site, contenus légaux).

## 5) Flux technique monolithique Laravel + Inertia + React
- **Backend Laravel** : Routes web, Controllers, Policies, Models Eloquent, migrations.
- **SPA React via Inertia** : pages React consommant les props Laravel sans API séparée obligatoire.
- **Auth** : middleware `auth`, `verified`, et middleware custom `role`.
- **Paiement** : service `PaymentService` branchable vers Stripe/PayPal/Flutterwave.
