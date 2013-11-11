<h1>Package's README.md</h1>
<p class="lead">This content is the <code>README.md</code> file of the package, parsed by <var title="http://github.com/atelierspierrot/markdown-extended">Markdown Extended</var> if dependencies are installed.</p>
<hr>
<div class="starter-template">
<?php
$readme = __DIR__.'/../../README.md';
$readme_content = "<pre>".file_get_contents($readme)."</pre>";
if (file_exists($a = __DIR__.'/../../vendor/autoload.php')) {
    include_once $a;
    if (class_exists('\MarkdownExtended\MarkdownExtended')) {
        $mde_readme = \MarkdownExtended\MarkdownExtended::create()
            ->transformSource($readme);
        $readme_content = $mde_readme->getBody();
    }
}
echo $readme_content;
?>
</div>