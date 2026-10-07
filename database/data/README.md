# Kit de données - Otelo

Quatre fichiers JSON pour le projet optionnel Otelo. Sprint 1, étape 1 : le kit se télécharge en ZIP
(Code > Download ZIP) et le **contenu** du dossier extrait `kit-otelo-main` va dans `database/data/` du projet Laravel ; `hotel.json` et `categories.json` y sont servis directement.
Étape 2 : votre `DatabaseSeeder` verse `categories.json`, `chambres.json` et `reservations.json` dans vos tables.

| Fichier | Contenu | Ce qu'il faut savoir |
|---|---|---|
| hotel.json | la fiche de l'Otelo (Rouen, 3 étoiles) | elle ne va pas en base : l'hôtel est unique, le fichier suffit |
| categories.json | 3 catégories : Standard, Confort, Suite | Finder ne les connaît pas : il range les chambres par ses propres règles (sujet, §1.3) |
| chambres.json | 12 chambres sur trois étages, numéros `1A` à `3D` | `nb_couchages` de 1 à 4, `prix_base` en euros entiers, `baignoire` en booléen |
| reservations.json | 6 réservations prises à la réception | la n° 5 est `annulee` et ne bloque rien ; `reference_externe` est vide : aucune ne vient de Finder |

Repères pour vérifier votre travail : du 9 au 11 octobre 2026, 9 chambres sont libres (7 pour deux personnes) ;
la réservation 2 occupe la `2B` jusqu'au 12 octobre, jour de départ, donc libre pour le client suivant.

Règles :
- le kit ne se modifie pas : vos données de démonstration supplémentaires vont dans le seeder ;
- les adresses `.example` ne sont pas réelles, les personnes sont fictives ;
- statuts de réservation : `confirmee`, `annulee` (sans accent : un mot que le code lit ne porte pas d'accent).
