A Better Underscores Theme
===

Hi. I'm a starter theme based off of [`_s`](https://github.com/Automattic/_s), or `underscores`, if you like. I come with some modern best practices and a few opinions others didn't want to force on you to make your life better. By removing features meant for theme users and not developers this theme is leaner than '_s' making it a quicker path to starting your next project.

Here are some of the interesting things I come with:

- A just right amount of lean, well-commented, modern, HTML5 templates.
- Symantic [SASS](http://sass-lang.com/) partials to get you started (makes CSS awesome)
- Basic [Webpack](https://webpack.github.io/) setup to start you on the way to a better life with js. Webpack is pre configured to:
	* Cross compile your ES6/ES2015 javascript to ES5 with [Babel](https://babeljs.io/). The futures is now!
	* Bundle your js module 'import' declarations in `index.js` to `bundle.js`.
	* Compile your SASS and watch for file changes.
- A helpful 404 template.
- Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
- Some small tweaks to your `functions.php` that can improve your theming experience.
- A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
- 2 sample layouts in `/layouts` for a sidebar on either side of your content.
- Smartly organized starter SASS in `style.scss` that will help you to quickly get your design off the ground.
- Licensed under GPLv2 or later. :) Use it to make something cool.

Bonus, you won't find these lingering around:

- [inc/custom-header.php](https://github.com/Automattic/_s/blob/master/inc/custom-header.php)
- [inc/customizer.php](https://github.com/Automattic/_s/blob/master/inc/customizer.php)
- [inc/jetpack.php](https://github.com/Automattic/_s/blob/master/inc/jetpack.php)
- [inc/wpcom.php](https://github.com/Automattic/_s/blob/master/inc/wpcom.php)

Theme Setup
-----------

You'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in style.css.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
5. Search for `_s-` to capture prefixed handles.

OR

* Search for: `'_s'` and replace with: `'megatherium'`
* Search for: `_s_` and replace with: `megatherium_`
* Search for: `Text Domain: _s` and replace with: `Text Domain: megatherium` in style.css.
* Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `_s-` and replace with: `megatherium-`

Then, update the stylesheet header in `style.scss` and the links in `footer.php` with your own information.

System Setup
------------

- If your machine already has [Node](http://nodejs.org/) installed you can skip to the next step otherwise download and install.
- From the command line navigate to your theme directory.
- Now a simple `npm install`.
- To starting developing `npm run webpack` to compile you SASS and js.
- When deploying to production environments use `npm run build` to compile and minify your assets.