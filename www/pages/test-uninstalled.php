<div class="alert alert-danger">Dependencies are not installed yet and can't be loaded!</div>
<p>The Composer's dependencies autoloader file <code>vendor/autoload.php</code> doesn't seem to exist ...</p>

<h3>To install dependencies and generate the autoloader, try to run:</h3>
<pre>
$ cd path/to/project
$ php path/to/composer.phar install --no-dev
</pre>

<h3>To use your app, you will have to load it manually:</h3>
<pre>
require __DIR__.'/../../src/TestNamespace/TestClass.php';

echo \TestNamespace\TestClass::myTest();
</pre>
<p>Which will result in the true life in:</p>
<pre>
<?php
require __DIR__.'/../../src/TestNamespace/TestClass.php';
echo \TestNamespace\TestClass::myTest();
?>
</pre>
