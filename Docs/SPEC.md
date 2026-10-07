# Documentation API Otelo - Sprint 1 (Étapes 1 à 3)

Ce document récapitule l'architecture, la base de données et les routes de l'API construites lors des trois premières étapes du Sprint 1 du projet Otelo.

## Étape 1 : Initialisation et Routes Statiques

Cette étape a mis en place le socle du projet Laravel (version 13.x avec PHP 8.3+) et les premières routes de consultation statiques.

**Configuration :**

* Base de données MySQL nommée `otelo`.


* Intégration du kit de données (`hotel.json`, `categories.json`, `chambres.json`, `reservations.json`) dans le dossier `database/data/`.



**Endpoints mis en place :**

| Méthode | Route | Description | Réponse attendue |
| --- | --- | --- | --- |
| `GET` | `/api/sante` | Vérifie l'état de l'API.

 | `200 OK` : `{"ok":true}`.

 |
| `GET` | `/api/hotel` | Renvoie la fiche de l'hôtel lue depuis le fichier JSON.

 | `200 OK` : JSON de l'hôtel (ex: "ville": "Rouen").

 |

---

## Étape 2 : Base de données (Migrations, Modèles et Seeder)

Cette étape a structuré la base de données pour utiliser le vocabulaire métier de l'hôtel (couchages, prix de base) et a mis en place les relations Eloquent.

**Structure des tables (Migrations) :**

* **`categories`** : `id`, `libelle`.


* **`chambres`** : `id`, `numero` (unique), `categorie_id` (clé étrangère), `etage`, `couchages`, `baignoire` (booléen), `prix_base`, `description`.


* **`reservations`** : `id`, `chambre_id` (clé étrangère), `date_debut` (date), `date_fin` (date), `nb_personnes`, `nom_client`, `statut` (défaut : `confirmee`), `reference_externe` (string, max 64, unique, nullable).



**Relations des Modèles (`app/Models/`) :**

* `Categorie` : Possède plusieurs chambres (`hasMany`).


* `Chambre` : Appartient à une catégorie (`belongsTo`), possède plusieurs réservations (`hasMany`), et convertit la colonne `baignoire` en booléen (`$casts`).


* `Reservation` : Appartient à une chambre (`belongsTo`), avec la protection d'assignation de masse `#[Fillable]` sur ses colonnes.



**Ensemencement (`DatabaseSeeder`) :**
Le Seeder lit les fichiers JSON du kit pour remplir les tables `categories`, `chambres` et `reservations` via la méthode `insert()`. Il crée également le compte partenaire avec `User::create()` (Nom : `Finder`, Email : `finder@partenaires.example`).

---