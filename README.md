A Better Underscores Theme
===

Hi. I'm a starter theme based off of [`_s`](https://github.com/Automattic/_s), or `underscores`, if you like. I come with some modern best practices and loads of opinions others didn't want to force on you added to make life better.

Here are some of the interesting things I come with:

- A just right amount of lean, well-commented, modern, HTML5 templates.
- Symantic SASS partials to get you started
- Bower setup to handle frontend components (read: all that great sass/css and js you love to use but did not write eg: jQuery, etc.).
	* predefined depencies
	* bower install drops into `components`
- Bundlr setup to keep your themes ruby gems in order. Comes with:
	* [SASS](http://sass-lang.com/) (makes CSS awesome)
	* [SASS css importer](https://github.com/chriseppstein/sass-css-importer) (plays nice with Bower!)
	* [Compass](http://compass-style.org/) (makes SASS awesomer)
	* [SASS Toolkit](https://github.com/Team-Sass/toolkit) (makes Compass awesomer)
- A helpful 404 template.
- Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
- Some small tweaks in already added to your `functions.php` that can improve your theming experience.
- A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
- 2 sample SASS layouts in `sass/_layouts.scss` for a sidebar on either side of your content.
- Smartly organized starter SASS in `style.scss` that will help you to quickly get your design off the ground.
- Licensed under GPLv2 or later. :) Use it to make something cool.

Theme Setup
-----------

You'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
4. Search for `_s-` to capture prefixed handles.
5. Search for `Text Domain: _s` in style.css.

OR

* Search for: `'_s'` and replace with: `'megatherium'`
* Search for: `_s_` and replace with: `megatherium_`
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `_s-` and replace with: `megatherium-`
* Search for: `Text Domain: _s` and replace with: `Text Domain: megatherium` in style.scss.

Then, update the stylesheet header in style.scss, recompile your sass, and change the links in footer.php with your own information. Lastly, update or delete this readme.

System Setup
------------

- If your machine already has ruby and [Bundlr](http://bundler.io/) installed you can skip to the next step. If and your on a Unix based system (that includes Mac's) you already have ruby others will need to find instructions for setting ruby up in their environment. The internet is full of tutorials for every platform so you should be fine. Once ruby is setup just run `gem install bundler`!
- Now a simple `bundle install` to get your project gems in order.
- OPITIONALLY: for those of you looking to manage frontend packages you can also install [Node](http://nodejs.org/) and [Bower](http://bower.io/). Given the nature and usage of these tools and the fact this project does not depend on your usage of them I will leave this up to you to figure out.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
