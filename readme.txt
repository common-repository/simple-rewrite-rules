=== Simple Rewrite Rules ===
Contributors: WordPress Plugins
Tags: wp_rewrite, simple, rewrite, rules
Requires at least: 2.7
Tested up to: 3.2.1
Stable tag: 1.0

Easily add custom rewrite rules to your WordPress blog.

== Description ==

WordPress uses rewrites to allow <a href="http://codex.wordpress.org/Introduction_to_Blogging#Pretty_Permalinks">pretty permalinks</a>. Simple Rewrite Rules plugin allows you to customize the URL of your WordPress blog even further.

= How to use rewrites =

If you aren't already familiar with Apache's <a href="http://httpd.apache.org/docs/2.0/mod/mod_rewrite.html">mod_rewrite</a>, it is recommended that you have a look at it.

This plugin can parse <a href="http://www.regular-expressions.info/">regular expression</a> to rewrite one URL to another. The best way to understand this is through an example:


Rewrite `random-posts` to `index.php?orderby=rand` (Random posts)<br>
Rewrite `(cats)|(dogs)` to `index.php?categoryname=$match[1]` (All posts under a certain category)<br>
Rewrite `([^/]+)/popular/?` to `index.php?month=$match[1]&meta_key=votes&orderby=meta_value` (The most popular posts in the month)<br>
Rewrite `user/([^/]+)/([^/]+)/?(/(.*))` to `index.php?authorname=$match[1]&day=$match[2]&categoryname=$match[4]` (The possibilities are endless!)<br>


= Quick Regular Expression References =

<ul>
<li><a href="http://www.regular-expressions.info/reference.html">http://www.regular-expressions.info/reference.html</a></li>
<li><a href="http://networking.ringofsaturn.com/Web/regex.php">http://networking.ringofsaturn.com/Web/regex.php</a></li>
<li><a href="www.google.com/search?q=regular+expression">www.google.com/search?q=regular+expression</a></li>
</ul>

= List of All WordPress Query Variables =

<ul>
<li>attachment</li>
<li>attachment_id</li>
<li>author</li>
<li>author_name</li>
<li>cat</li>
<li>category__and</li>
<li>category__in</li>
<li>category__not_in</li>
<li>category_name</li>
<li>comments_popup</li>
<li>day</li>
<li>error</li>
<li>feed</li>
<li>fields</li>
<li>hour</li>
<li>m</li>
<li>meta_key</li>
<li>meta_query</li>
<li>meta_value</li>
<li>minute</li>
<li>monthnum</li>
<li>name</li>
<li>order</li>
<li>orderby</li>
<li>p</li>
<li>page_id</li>
<li>page</li>
<li>paged</li>
<li>pagename</li>
<li>post__in</li>
<li>post__not_in</li>
<li>post_status</li>
<li>post_type</li>
<li>preview</li>
<li>robots</li>
<li>s</li>
<li>sentence</li>
<li>second</li>
<li>static</li>
<li>subpost</li>
<li>subpost_id</li>
<li>tag__and</li>
<li>tag__in</li>
<li>tag__not_in</li>
<li>tag_id</li>
<li>tag_slug__and</li>
<li>tag_slug__in</li>
<li>tag</li>
<li>tax_query</li>
<li>taxonomy</li>
<li>tb</li>
<li>term</li>
<li>w</li>
<li>withcomments</li>
<li>withoutcomments</li>
<li>year</li>
</ul>

== Installation ==

1. Upload the entire `srr` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the 'Simple Rewrite Rules' menu in your WordPress admin panel to get started!

== Changelog ==

= 1.0 =
* initial release

