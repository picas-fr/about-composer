About Composer
==============

Presentation and small "how-to" about [Composer](http://getcomposer.org/) and its indispensable
friend [Packagist](http://packagist.org/).

Browse to "path/to/package/www/index.php" for a small web test page.


## Presentation

### What is Composer?

>   a dependency manager for PHP

### How does it work?

-   single PHP script that embeds a full application (PHP archive "phar" - < 1M)
-   handles a set of dependencies (install/update/uninstall)
-   generates an autoloader to easily use dependencies
-   based on a single configuration file in the root package


## Step by step

### Install Composer

-   `composer.phar` or global `composer` command

    $ curl -sS https://getcomposer.org/installer | php -- --install-dir=target/path

### "composer.json" config file

Full schema explained at <http://getcomposer.org/doc/04-schema.md>.

Basic confg file of the root package:

    // package/composer.json
    {
        "require": {
            "php": "vers",
            "package": "1.0.0"
        },
        "require-dev": {
            "package-for-dev": "1.*"
        }
    }

### Managing dependencies

Just run the `install` or `update` script's command, using (or not) an option to precise
from which environment your dependencies may be taken:

    $ cd path/to/package
    $ php path/to/composer.phar install/update (--dev | --no-dev)

By default, Composer is in "--dev" mode and will install both `require` and `require-dev`
dependencies stacks.

Composer will end with an error status if your dependencies stack can't be resolved to 
an installable set of resources. It mostly comes from version number errors. In case of
error, Composer will not install anything.

### Autoloading

The autoloader will define dependencies namespaces and simple classes or functions, including
the ones defined in the root package (own `composer.json`).

    require_once 'root-package/vendor/composer/autoload.php';

To define your own package loading rules:

    "autoload": {
        "psr-0": { "MyAppNamespace": "src" },
        "classmap": [ "src/SimpleClass.php" ]
    },

Which will be understood by the autoloader like:

    [root dir]
    |
    | src/
    | ---- SimpleClass.php
    | ---- MyNameSpace/
    | ----------------- ClassOfMyNameSpace.php

### Default tree

By default, Composer will install dependencies in a `vendor/` directory, in a `package/name/`
sub-directory.

For instance, for the `mypackage/myname/` package:

    [root dir]
    |
    | composer.json
    |
    | vendor/
    | ------- mypackage/
    | ------------------ myname/


## Composer usage

### Commands

-   `install`
-   `update`
-   `dump-autoload`
-   `run-script`

-   `self-update`

-   `create-project`

-   `list`
-   `validate`
-   `status`


### Environements

-   `--dev` (default)
-   `--no-dev`

### What is a repository for Composer?

Any app filesystem as long as:

-   it is hosted on a place reachable by Composer
-   it fully delcares what it is in a `composer.json` configuration file
-   concerned version number exists in the repository

#### Packagist

Any package can be registered in the Packagist database to allow simple usage of:

    "require":{ "my/package": "version" },

#### Custom

Any package that is NOT registered in Packagist can be a dependency handled by Composer 
writing its access URL:

    "require":{ "my/package": "version" },
    "repositories": [
        { "type": "vcs", "url": "http://my.domain/my/repo.vcs" }
    ],

## Build a project to use Composer


## To go further

-   declare your package to packagist: just register its repository and add a git-hook on it
-   declare a package with type "project" to allow `create-project` command (example: <https://github.com/symfony/symfony-standard>)
-   usage of declared scripts during Composer's events (see: <http://getcomposer.org/doc/articles/scripts.md>)
-   make plugins for custom installs (example: <http://github.com/atelierspierrot/assets-manager>)

### Composer's cache

Composer will use a `$HOME/.composer/` directory to store informations and repositories cache.

### The Composer code

Hosted on GitHub at <http://github.com/composer/composer>.

Authors:

-   Nils Adermann - <naderman@naderman.de> - <http://www.naderman.de>
-   Jordi Boggiano - <j.boggiano@seld.be> - <http://seld.be>

### Useful links

-   the `composer.json` cheatsheet from Joli Code: <http://composer.json.jolicode.com/>
-   the [Semantic Versioning](http://semver.org/) by Tom Preston-Werner (GitHub, Gravatar)


----

Repo by [**picas**](picas@smile.fr) for [Smile](http://www.smile.fr/) - under free license.
