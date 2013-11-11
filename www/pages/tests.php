<?php

$page = __DIR__.'/test-uninstalled.php';

// get Composer autoloader
if (file_exists($a = __DIR__.'/../../vendor/autoload.php')) {
    include_once $a;
    $page = __DIR__.'/test-installed.php';
}

?>
<h1>Composer's usage tests</h1>
<p class="lead">The content below will change depending on current package's dependencies status (absent by default).</p>
<hr>
<div class="starter-template">
<?php include $page; ?>
</div>
