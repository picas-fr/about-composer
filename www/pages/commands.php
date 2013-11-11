<h1>Composer's usage commands</h1>
<p class="lead">Try the instructions below to manage your dependencies and run various tests.</p>
<hr>
<div class="starter-template">

<h3>Install Composer</h3>
<pre>
$ curl -sS https://getcomposer.org/installer | php -- --install-dir=path/to/where/you/want
</pre>

<h3>See Composer's help</h3>
<pre>
$ php path/to/composer.phar
// help on a command:
$ php path/to/composer.phar command -h
</pre>

<h3>Create a simple "composer.json" with assistance</h3>
<pre>
$ cd path/to/project
$ php path/to/composer.phar init
...
</pre>

<h3>Validate a "composer.json"</h3>
<pre>
$ cd path/to/project
$ php path/to/composer.phar validate
</pre>

<h3>Install dependencies with NO dev stuff</h3>
<pre>
$ cd path/to/project
$ php path/to/composer.phar install --no-dev
// or
$ php path/to/composer.phar update --no-dev
</pre>

<h3>Install dependencies WITH dev stuff</h3>
<pre>
$ cd path/to/project
$ php path/to/composer.phar install
// or
$ php path/to/composer.phar update
</pre>

<h3>Rebuild the autoloader of dependencies</h3>
<pre>
$ cd path/to/project
$ php path/to/composer.phar dump-autoload
</pre>

<h3>Remove dependencies</h3>
<pre>
$ cd path/to/project
$ rm -rf vendor composer.lock
</pre>

<h3>Create a project from scratch</h3>
<pre>
$ mkdir path/to/project && cd path/to/project
$ php path/to/composer.phar create-project project/package .

// for instance
$ php path/to/composer.phar create-project symfony/symfony .
// then go drink a coffee or two :(
</pre>

</div>