## CrudKit QuickStart

This repository contains the quickstart which lets you quickly build a simple app using [CrudKit](http://crudkit.com). It is an alternative to the [Manual Installation](http://crudkit.com/docs/install/manual.html).

1. It automatically requires all the dependencies.
2. It copies the static files into a `public` folder (we reccomend using a `public` folder )

#### Installation using `composer create-project`

```
composer create-project skyronic/crudkit-template your_project
```

#### Manual Installation

```
git clone git@github.com:skyronic/crudkit-template.git your_project
cd your_project
composer install
```

#### Running for development

```
cd public
php -S 0.0.0.0:8080
```

And open `http://localhost:8080/index.php`

#### Deploying on Apache

1. Create a new site.
2. Set `DocumentRoot` as `/path/to/your_project/public/`

#### Deploying on Nginx

1. Create a new site.
2. Set the `root` as `/path/to/your_project/public/`

#### Deploy without `public` or into subdirectory:

1. Copy all files from `public` into the root directory.
2. Delete the `public` folder
3. Copy this folder anywhere you want. Please note this exposes your `vendor` folder to be publicly accessible, though you can block this with .htaccess

#### Upgrading crudkit

This will always use the latest CrudKit beta version. You can start the upgrade by using `composer update`. The installer will automatically copy all the static files each time you update.