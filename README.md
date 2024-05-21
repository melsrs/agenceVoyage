# Brief Agence de voyage 

### Contexte du projet :
J'ai réalisé ce projet dans le cadre de ma formation de Développeuse Web et Web Mobile à Simplon Grenoble. Il s'agissait de créer un site pour une agence de voyage avec différents voyages. Chaque voyage est associé à une date et à une catégorie. L'interface admin permet de gérer les voyages, les utilisateurs et les prises de contact des visiteurs via le formulaire du site. Le backend communique avec le frontend par le biais d'une API. 

---

### Prérequis

Installer PHP, WampServer, MySQL.

---

### Installation
Télécharger ce repository à l'aide de cette commande : 

    git clone git@github.com:melsrs/agenceVoyage.git

Dans le dossier backend démarrez le serveur symfony :

    symfony console server:stard -d 

Dans le dossier fronted démarrez le serveur next.js : 

    npm run dev 

Retournons au dossier backend, à la racine se trouve le fichier .env

A la ligne 27 veuillez insérer les informations concernant votre base de données. Indiquez la bonne version de votre serveur MySQL.

    DATABASE_URL="mysql://vosinformations:vosinformations@127.0.0.1:3306/vosinformations?serverVersion=8.2.00&charset=utf8mb4"

---

### Technologies Utilisées
- HTML/CSS
- JavaScript
- PHP 8.3.0
- MySQL 5.2.1
- Symfony
- Next.js


