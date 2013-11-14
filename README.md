Composer - an initiation
========================

Presentation and small "how-to" about [Composer](http://getcomposer.org/) and its indispensable
friend [Packagist](http://packagist.org/).

Once you have downloaded or cloned this repo, browse to <http://localhost/path/to/package/www/index.php>
for a small web test page (requires PHP 5.3+).


## Presentation

### What is Composer?

>   a dependency manager for PHP

### What is Packagist?

>   the main Composer repository

### How does it work?

-   single PHP script that embeds a full application that you use as a command line binary
    (PHP archive "phar" < 1M)
-   handles a set of dependencies (install/update/uninstall) with complex version number selection
-   generates an autoloader to easily use dependencies and the root package itself
-   based on a single configuration file in the root package


## Step by step

### Install Composer

The single file can be installed locally as `composer.phar` or globally as `composer` command:

    $ curl -sS https://getcomposer.org/installer | php
    // or
    $ curl -sS https://getcomposer.org/installer | php -- --install-dir=target/path

Then use it as a classic command:

    $ php composer.phar  [-options]  action

To get help, run:

    // help and list of available commands:
    $ php composer.phar
    
    // help on a specific command:
    $ php composer.phar action -h

### "composer.json" config file

Full schema is explained at <http://getcomposer.org/doc/04-schema.md>.
Composer's `init` command can help create a configuration file prompting basic infos.

Basic config file of the root package:

    // composer.json
    {
        "require": {
            "php": "vers",
            "package": "1.0.0"
        },
        "require-dev": {
            "package-for-dev": "1.*"
        }
    }

For a complete review of version number in Composer, see <http://getcomposer.org/doc/01-basic-usage.md#package-versions>.

### Managing dependencies

Just run the `install` or `update` script's command, using (or not) an option to precise
from which environment your dependencies may be taken:

    $ cd path/to/package
    $ php path/to/composer.phar install/update (--dev | --no-dev)

By default, Composer is in "--dev" mode and will install both `require` and `require-dev`
dependencies stacks.

Composer will end with an error status if your dependencies stack can't be resolved to 
an installable set of resources. It mostly comes from version number errors. In case of
error, Composer will not install anything. Except with `-q` option, an error message is 
written through STDOUT.

### Autoloading

The autoloader will define dependencies namespaces and simple classes or functions, including
the ones defined in the root package (own `composer.json`). This means that you are just
required to load one single file to use any class or function of your dependencies (as long
as they all correctly define their autoloading).

    require_once 'root-package/vendor/composer/autoload.php';

that's it!

The root package and its dependencies can (MUST ?) use the [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)
ruleset to construct their filesystem architecture. It's the autoloading method the most commonly
used in PHP, based on the [SplClassLoader](https://gist.github.com/jwage/221634).

To define your own package loading rules, write in your "composer.json":

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


### Default filesystem tree

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

`install` and `update`
:   quite explicits: used to install or update dependencies ; they can automatically
switch from one to the other

`dump-autoload`
:   generate the autoloader ; useful in case of error or if you change your root package
autoloading configuration

`create-project`
:   allows to download a project as root package and install its dependencies from scatch

`init` and `validate`
:   create or validate a "composer.json"

`self-update`
:   update Composer itself ; the script will magically tell you if it is old and advise for
a self-update

`search`
:   search a package in Packagist by name or mask

`licenses`
:   full and clear overview of root package and dependencies packages names, current versions
and licenses

-   `status`
-   `run-script`

### Environments

-   `--dev` (default)
-   `--no-dev`

### What is a package for Composer?

Any app filesystem as long as:

-   it is hosted somewhere reachable by Composer
-   it fully delcares what it is in a `composer.json` configuration file
-   concerned version number exists in the repository, as a branch or a tag

See <http://getcomposer.org/doc/05-repositories.md> for more infos.

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


## To go further

-   declare your package to packagist: just register its repository and add a git-hook on it
-   declare a package with type "project" to allow `create-project` command (example: <https://github.com/symfony/symfony-standard>)
-   usage of declared scripts during Composer's events (see: <http://getcomposer.org/doc/articles/scripts.md>)
-   make plugins for custom installs (example: <http://github.com/atelierspierrot/assets-manager>)

### Composer's lock

Composer will use a `package/composer.lock` file to store current packages installed with
precise versions (useful for ISO duplication).

### Composer's cache

Composer will use a `$HOME/.composer/` directory to store informations and repositories cache.
It also stores a global configuration file.

### The Composer code

Hosted on GitHub at <http://github.com/composer/composer>, open source under MIT license
and authored by:

-   Nils Adermann - <http://www.naderman.de>
-   Jordi Boggiano - <http://seld.be>

### Useful links

-   the `composer.json` cheatsheet from Joli Code: <http://composer.json.jolicode.com/>
-   the [Semantic Versioning](http://semver.org/) by Tom Preston-Werner (GitHub, Gravatar)


----

Repo by [**picas**](picas@smile.fr) - attached but not liable to [Smile](http://www.smile.fr/) - under free license - educational work.
