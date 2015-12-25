## CrudKit QuickStart

This repository contains the quickstart which lets you quickly build a simple app using [CrudKit](http://crudkit.com). It is an alternative to the [Manual Installation](http://crudkit.com/docs/install/manual.html).

1. It automatically requires all the dependencies.
2. It copies the static files into the `static` folder

#### Installation using `composer create-project`

```
composer create-project skyronic/crudkit-template your_project
```

#### Alternative installation

```
git clone git@github.com:skyronic/crudkit-template.git your_project
cd your_project
composer install
```

#### Running for development

```
php -S 0.0.0.0:8080
```

And open `http://localhost:8080/index.php`

#### Deploying on Apache or XAMPP

Copy this into your web root (usually `/var/www` or `htdocs`)

#### Deploying on Nginx

Copy this into your web root and open it in your browser.

#### Upgrading crudkit

This will always use the latest CrudKit beta version. You can start the upgrade by using `composer update`. The installer will automatically copy all the static files each time you update.