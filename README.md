# Plateforme de Gestion de Rendez-vous Ingénieur-Client

Une application web simple permettant aux clients de planifier des rendez-vous avec des ingénieurs. Cette plateforme facilite la gestion des utilisateurs, la prise de rendez-vous et le suivi des interactions professionnelles.

## 🛠️ Fonctionnalités

- ✅ Authentification des utilisateurs (ingénieurs / clients)
- 📅 Prise et gestion des rendez-vous
- 👤 Gestion des profils utilisateurs
- 🗃️ Base de données relationnelle avec SQL
- 🌐 Interface simple développée en PHP

## 📂 Structure du projet
```bash
    /
    ├── ressources.sql # Script de création de la base de données
    ├── index.php # Page d'accueil de l'application
    ├── login.php # Page de connexion
    ├── dashboard.php # Tableau de bord après connexion
    ├── rendezvous.php # Gestion des rendez-vous
    ├── includes/ # Fichiers communs (connexion, header, footer, etc.)
    └── README.md # Documentation du projet

```

## ⚙️ Technologies utilisées

- PHP (backend)
- HTML / CSS (frontend)
- MySQL (base de données)
- XAMPP / WAMP pour l'environnement local

## 🧑‍💻 Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/hamzasabouri/Plateforme-de-Gestion-de-Rendez-vous-Ingnieur-Client.git
   ```
2. Placez le dossier dans le répertoire htdocs de XAMPP (ou www de WAMP).

3. Importez le fichier ressources.sql dans phpMyAdmin pour créer la base de données.

4. Configurez les identifiants de connexion à la base dans le fichier de connexion (includes/db.php ou équivalent).

5. Lancez le serveur local et accédez à l’application via :

```bash
http://localhost/Plateforme-de-Gestion-de-Rendez-vous-Ingnieur-Client/
```

📌 À venir
- Ajout d’un système de messagerie entre ingénieurs et clients

- Notifications par email

- Interface responsive

- Tableau de bord analytique
