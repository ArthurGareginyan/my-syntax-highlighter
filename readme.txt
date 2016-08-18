=== My Syntax Highlighter ===
Contributors: Arthur Gareginyan
Tags: code, php, html ,css, javascript, snippet, codemirror, hightlight, syntax highlighting, syntaxhighlighting, syntax highlighter, syntaxhighlighter, syntax,
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS
Requires at least: 3.9
Tested up to: 4.6
Stable tag: 1.0
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Simple post syntax-highlighted code without losing it's formatting or making any manual changes. Supporting multiple languages, shortcodes and themes.

== Description ==

An easy to use WordPress plugin that provides a simple way for embedding syntax-highlighted source code within pages or posts on your website, without losing it's formatting or making any manual changes. Supporting 14 languages, 16 shortcodes and 36 themes. The syntax highlighting feature implemented via a [CodeMirror](https://codemirror.net/) library.

Syntax highlighting is a feature that displays source code, in different colors and fonts according to the category of terms. Syntax highlighting is one strategy to improve the readability and context of the text; especially for code that spans several pages. The reader can easily ignore large sections of comments or code, depending on what they are looking for. 

This plugin also uses standalone Shortcode-Processor to prevent WordPress from converting newlines to HTML paragraphs, replacing apostrophes with typographic quotes and so on.

This plugin is just plug and play, no tedious configurations or hacks, just install, enable and start using your new shortcodes.

= Features =

* Easy to use Settings Page
* Live preview on Settings Page
* Standalone Shortcode-Processor
* Syntax highlighting (by CodeMirror)
* Line numbering
* 36 Themes
* 14 Languages
* 16 Shortcodes
* Ready for translation (POT file included)


**A list of supported languages:**

Click to view language examples. Highlighted with Default theme.

* [PHP](http://codemirror.net/mode/php/index.html)
* [JavaScript](http://codemirror.net/mode/javascript/index.html)
* [XML](http://codemirror.net/mode/xml/index.html)
* [HTML](http://codemirror.net/mode/htmlmixed/index.html)
* [CSS](http://codemirror.net/mode/css/index.html)
* [SCSS](http://codemirror.net/mode/css/scss.html)
* [LESS](http://codemirror.net/mode/css/less.html)
* [SASS](http://codemirror.net/mode/sass/index.html)
* [MarkDown](http://codemirror.net/mode/markdown/index.html)
* [Perl](http://codemirror.net/mode/perl/index.html)
* [SQL](http://codemirror.net/mode/sql/index.html)
* [MySQL](http://codemirror.net/mode/sql/index.html)
* [Shell](http://codemirror.net/mode/shell/index.html)
* [BASH](http://codemirror.net/mode/shell/index.html)


**A list of supported shortcodes:**

* [code][/code]
* [php][/php]
* [javascript][/javascript]
* [js][/js]
* [xml][/xml]
* [html][/html]
* [css][/css]
* [scss][/scss]
* [less][/less]
* [sass][/sass]
* [markdown][/markdown]
* [perl][/perl]
* [sql][/sql]
* [mysql][/mysql]
* [shell][/shell]
* [bash][/bash]


**A list of supported themes:**

* 3024-day
* 3024-night
* ambiance-mobile
* ambiance
* base16-dark
* base16-light
* blackboard
* cobalt
* colorforth
* eclipse
* elegant
* erlang-dark
* lesser-dark
* liquibyte
* mbo
* mdn-like
* midnight
* monokai
* neat
* neo
* night
* paraiso-dark
* paraiso-light
* pastel-on-dark
* rubyblue
* solarized
* the-matrix
* tomorrow-night-bright
* tomorrow-night-eighties
* ttcn
* twilight
* vibrant-ink
* xq-dark
* xq-light
* zenburn

= Translation =

Please keep in mind that not all translations are up to date. You are welcome to contribute!

* English (default)
* Russian

= Usage =

Just switch to the Text/HTML editor and wrap your source code in one of the supported shortcodes (like `[code]...[/code]` that is universal shortcode) and this plugin takes care of the rest. Example:
`[code]
This 

is 

an "example"!
[/code]`

In this case, the shortcode will prevent WordPress from inserting paragraph breaks between `This`, `is` and `an "example"`, as well as ensure that the double quotes around `example` are not converted to typographic (curly) quotes.

To avoid problems, only edit posts that contain your source code in Text/HTML mode.

>**Contribution**
>
>Developing plugins is long and tedious work. If you benefit or enjoy this plugin please take the time to:
>
>* [Donate](http://www.arthurgareginyan.com/donate.html) to support ongoing development. Your contribution would be greatly appreciated.
>* [Rate and Review](https://wordpress.org/support/view/plugin-reviews/my-syntax-highlighter?rate=5#postform) this plugin.
>* [Share with me](mailto:arthurgareginyan@gmail.com) or view the [GitHub Repo](https://github.com/ArthurGareginyan/my-syntax-highlighter) if you have any ideas or suggestions to make this plugin better.


== Installation ==
Install "My Syntax Highlighter" just as you would any other WordPress Plugin.

Automatically via WordPress:

1. Log into WordPress Dashboard of your website.
2. Go to "`Plugins`" —> "`add new plugins`".
3. Find this plugin and click install.
4. Activate this plugin through the "`Plugins`" tab.

Manual via FTP:

1. Download a copy (zip file) of this plugin from WordPress.org.
2. Unzip the zip file.
3. Upload the unzipped directory to your website's plugin directory (`/wp-content/plugins/`).
4. Log into WordPress Dashboard of your website.
5. Activate this plugin through the "`Plugins`" tab.

After installation, a "`Syntax Highlighter`" menu item will appear in the "`Settings`" section. Click on this in order to view plugin's administration page.

[More help installing Plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins "WordPress Codex: Installing Plugins")


== Frequently Asked Questions ==
= Q. Will this Plugin work on my WordPress.COM website? =
A. Sorry, this plugin is available for use only on self-hosted (WordPress.org) websites.

= Q. Can I use this plugin on my language? =
A. Yes. But If your language is not available then you can make one. This plugin is ready for translation. The `.pot` file is included and placed in "`languages`" folder. Many of plugin users would be delighted if you shared your translation with the community. Just send the translation files (`*.po, *.mo`) to me at the arthurgareginyan@gmail.com and I will include the translation within the next plugin update.

= Q. Does this plugin require modification to the theme? =
A. Absolutely not. This plugin is added/configured entirely from the website's Admin section.

= Q. It's not working. What could be wrong? =
A. As with every plugin, it's possible that things don't work. The most common reason for this is that the plugin has a conflict with another plugin you're using. It's impossible to tell what could be wrong exactly, but if you post a support request in the plugin's support forum on WordPress.org, I'd be happy to give it a look and try to help out. Please include as much information as possible, including a link to your website where the problem can be seen.

= Q. Where to report bug if found? =
A. Please visit [Dedicated Plugin Page on GitHub](https://github.com/ArthurGareginyan/my-syntax-highlighter) and report.

= Q. Where to share any ideas or suggestions to make the plugin better? =
A. Please send me email [arthurgareginyan@gmail.com](mailto:arthurgareginyan@gmail.com).

= Q. I love this plugin! Can I help somehow? =
A. Yes, any financial contributions are welcome! Just visit my website and click on the donate link, and thank you! [My website](http://www.arthurgareginyan.com/donate.html)


== Screenshots ==
1. Plugin settings page.
2. Example of post with added source code and wrapped it in shortcode provided by this plugin. Default theme of highlighter.
3. Example of post with added source code and wrapped it in shortcode provided by this plugin. The "The Matrix" theme of highlighter.
4. Example of post with added source codes on multiple language and wrapped it in shortcode provided by this plugin. Default theme of highlighter.


== Other Notes ==

"My Syntax Highlighter" is one of the personal software projects of [Arthur Gareginyan](http://www.arthurgareginyan.com).

**License**

This plugin is licensed under the [GNU General Public License, version 3 (GPLv3)](http://www.gnu.org/licenses/gpl-3.0.html) and is distributed free of charge.
Commercial licensing (e.g. for projects that can’t use an open-source license) is available upon request.

**Credits**

[CodeMirror](https://codemirror.net/) is an open-source project shared under a [MIT license](https://codemirror.net/LICENSE).

**Links**

* [Developer Website](http://www.arthurgareginyan.com)
* [Dedicated Plugin Page on GitHub](https://github.com/ArthurGareginyan/my-syntax-highlighter)


== Changelog ==
= 1.0 =
* The directory structure is changed. All files are moved to directories with names of file extensions.
* Some changes in design of settings page.
* [js], [xml], [scss], [less], [sass], [markdown], [perl], [sql], [mysql], [shell], [bash] shortcodes added.
* Constants variables added.
* Added function for preserve formatting of code.
* Added option "Enable Plugin".
* Added option "Default language".
* Added option "Automatic height of code block".
* Added option "The height of code block".
* Text domain changed to "my-syntax-highlighter" and thus added compatibility with the translate.wordpress.org.
* Plugin URI changed to GitHub repository.
* POT file added.
* Russian translation added.
* Many more small changes.
= 0.3 =
* [php], [html], [css], [javascript] shortcodes added.
* Added option "Display line numbers".
* Added option "First line number".
* Added option "The width of Tab".
* Image from plugin's settings page changed.
= 0.2 =
* Beta version.
= 0.1 =
* Alfa version.


== Upgrade Notice ==
= 1.0 =
Please update to first stable release!
= 0.3 =
Prerelease.
= 0.2 =
Please update to beta version.
