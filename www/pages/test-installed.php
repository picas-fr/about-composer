<div class="alert alert-success">OK - dependencies are loaded!</div>
<p>The Composer's dependencies autoloader file <code>vendor/autoload.php</code> exists and is now loaded ...</p>

<h3>To begin to use your dependencies, just include the autoloader:</h3>
<pre>
require_once __DIR__.'/../../vendor/autoload.php';

echo \Library\Helper\Text::slugify('My f***ing string to slugify!');
// the namespace is automatically loaded ...
</pre>
<p>Which will result in the true life in:</p>
<pre>
<?php
$a = \Library\Helper\Text::slugify('My f***ing string to slugify!');
var_export($a);
?>
</pre>

<h3>You can directly use your app as it is loaded by the autoloader:</h3>
<pre>
echo \TestNamespace\TestClass::myTest();
</pre>
<p>Which will result in the true life in:</p>
<pre>
<?php
echo \TestNamespace\TestClass::myTest();
?>
</pre>

<hr>
<?php
if (class_exists('\MarkdownExtended\MarkdownExtended')) {
    include __DIR__.'/test-installed-dev.php';
} else {
    include __DIR__.'/test-installed-nodev.php';
}
?>
