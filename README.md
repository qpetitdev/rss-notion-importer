# Rss notion importer

Application Laravel permettant d'importer des flux RSS multiples dans une base de données Notion.

Le projet est conçu pour :

- Agir comme outil de veille technique
- Être déployé rapidement en local via Docker (Laravel Sail)
- Éviter les doublons d'import grâce à une base SQLite locale

---

## Fonctionnalités

- Récupération de flux RSS configurés dans `config/rss.php`
- Mapping des items RSS vers un format unifié
- Enregistrement des données dans une base Notion (via API officielle)
- Stockage local des URLs déjà importées pour éviter les duplications

---
## Flux RSS disponibles dans le projet

Les flux RSS suivants sont déjà configurés et prêts à l'import :

- laravel_news : https://feed.laravel-news.com/

---

## Pré-requis

- Docker & Docker Compose
- Un token d'intégration [Notion API](https://developers.notion.com/)
- Une base de données Notion avec les colonnes suivantes :
    - `Titre` (title)
    - `URL` (url)
    - `Source` (texte)
    - `Date de publication` (date)
    - `État` (status)
    - `Catégorie` (select)
- Id de base de données Notion (via url)

---

## Installation locale

```bash
# Cloner le projet
git clone git@github.com:qpetitdev/rss-notion-importer.git
cd rss-notion-importer

# Installer les dépendances
composer install

# Copier les variables d'environnement
cp .env.example .env

# Modifier le .env avec vos variables Notion
# NOTION_API_TOKEN=...
# NOTION_DATABASE_ID=...

# Lancer Sail
./vendor/bin/sail up -d

# Générer la clé d'application
./vendor/bin/sail artisan key:generate

# Lancer les migrations
./vendor/bin/sail artisan migrate

# Lancer la commande d'import
./vendor/bin/sail artisan rss:import
```

---

## Ajouter un flux RSS

Pour ajouter un nouveau flux RSS, il suffit de modifier le fichier `config/rss.php`.

Chaque flux est défini comme une entrée dans le tableau `sources`, avec :

- `url` : l’URL du flux RSS
- `mapper` : une classe qui transforme les items RSS en objets compatibles avec l'import Notion
