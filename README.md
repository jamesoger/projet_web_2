# Fest-X Projet web 2 en équipe

<img src="/public/logos/centre_color_blanc.png?raw=true" alt="">

## Installation:

### 1

- cloner le projet 
- Se rendre sur le bon chemin

```bash
cd projet_web_2
```


### 2
-Installer XAMP
-Glisser le dossier VS code dans le htdocs de XAMP
- Se rendre sur localhost/phpmyadmin
- Créer une database
- Renommer le fichier .env à la racine du projet et modifier les informations suivantes:

```bash
HOST=localhost
USERNAME=root
PASSWORD=
DBNAME=nom de votre BDD
```

### 3

- Installer les dépendances

```bash
composer install
```

-Effectuer les migrations

```bash
php artisan migrate --seed
```

-Générer une clef

```bash
php artisan key:generate
```

- Créer le lien storage/uploads

```bash
php artisan storage:link
```

-Démarrer le serveur

```bash
php artisan key:generate
```



  
