<div class="alert alert-success">OK - "dev" dependencies are loaded!</div>
<p>You can now take a look at the <a href="?readme">README page</a>, which may be parsed as the Markdown package is a <code>dev</code> dependency.</p>
<p>To remove "dev" installed packages , run:</p>            
<pre>
$ cd path/to/project
$ php path/to/composer.phar update --no-dev
</pre>
<p>To remove all installed packages and start again the tests, run:</p>            
<pre>
$ cd path/to/project
$ rm -rf vendor composer.lock
</pre>
