<div class="alert alert-success">OK - dependencies are loaded!</div>
<p>The Composer's dependencies autoloader file <code>vendor/autoload.php</code> exists and is now loaded ... You can begin to use your dependencies.</p>
<p>For instance:</p>
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
<hr>
<?php
if (class_exists('\MarkdownExtended\MarkdownExtended')) {
    include __DIR__.'/test-installed-dev.php';
} else {
    include __DIR__.'/test-installed-nodev.php';
}
?>