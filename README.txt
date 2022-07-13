=== Markdeep Block ===
Contributors:      neffff
Tags:              markdown, markdeep, diagrams, graphics, mathjax, latex, block
Requires at least: 5.0
Requires PHP:      7.0
Tested up to:      6.0
Stable tag:        0.0.1
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Markdeep Block is a WordPress plugin for adding Gutenberg blocks supporting Markdeep syntax.

== Description ==

> Markdeep is ideal for design documents, specifications, README files, code documentation, lab reports, blogs, and technical web pages. Because the source is plain text, Markdeep works well with software development toolchains.
> -- http://casual-effects.com/markdeep/

> Markdeep is a text formatting syntax that extends Markdown, and a JavaScript program for making it work in browsers. The two most powerful features are its ability to run in any web browser on the client side and the inclusion of diagrams.
> -- https://casual-effects.com/markdeep/features.md.html

This plugin adds a gutenberg block supporting the [markdeep](http://casual-effects.com/markdeep/) language. The editor will show both a plaintext
environment for composing the text, and a preview area to show what the interpreted block will look like.

### Planned features

* Optionally use CDN for JS resources (Markdeep, MathJax).
* Get MathJax commands working.
* Markdeep specific LaTeX/MathJax commands. (e.g. θ₀, θ₁, etc.)
* Optional Table of Contents (currently suppressed)

== Installation ==

This plugin can be installed through the normal processes: the WordPress plugin directory, (hopefully) the WordPress block
directory, and a manual installation.

1. Upload the plugin files to the `/wp-content/plugins/markdeep-block` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress.

== Frequently Asked Questions ==

= Can you make diagrams with this? =

Yes, in fact it's all done with text! See the [markdeep site](https://casual-effects.com/markdeep/features.md.html#diagramexamples) for specific
examples.

== Screenshots ==

1. Open the block by typing "/markdeep" (or use the sidebar and search)
1. When editing the block, there are 2 views.  Use the upper area for writing, and the lower for displaying the diagram.
1. When the block is not selected, it will be displayed as it should be seen on the site.
1. As seen on my test site.

== Changelog ==

= 0.0.1 =
* Release

== Upgrade Notice ==

= 0.0.1 =
Initial install.  Don't know how you would be upgrading yet. 😉
