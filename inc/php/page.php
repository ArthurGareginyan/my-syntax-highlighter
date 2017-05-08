<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 1.3
 */
function mshighlighter_render_submenu_page() {

    // Call messages
    mshighlighter_hello_message();
    mshighlighter_error_message();

    // Layout of page
    ?>
    <div class="wrap">
        <h2>
            <?php _e( 'My Syntax Highlighter', MSHIGHLIGHTER_TEXT ); ?>
            <span>
                <?php printf(
                              __( 'by %s Arthur Gareginyan %s', MSHIGHLIGHTER_TEXT ),
                                  '<a href="http://www.arthurgareginyan.com" target="_blank">',
                                  '</a>'
                             );
                ?>
            </span>
        </h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- TABS NAVIGATION MENU -->
            <ul class="tabs-nav">
                <li class="active"><a href="#tab-core" data-toggle="tab"><?php _e( 'Settings', MSHIGHLIGHTER_TEXT ); ?></a></li>
                <li><a href="#tab-usage" data-toggle="tab"><?php _e( 'Usage', MSHIGHLIGHTER_TEXT ); ?></a></li>
                <li><a href="#tab-faq" data-toggle="tab"><?php _e( 'F.A.Q.', MSHIGHLIGHTER_TEXT ); ?></a></li>
                <li><a href="#tab-author" data-toggle="tab"><?php _e( 'Author', MSHIGHLIGHTER_TEXT ); ?></a></li>
                <li><a href="#tab-support" data-toggle="tab"><?php _e( 'Support', MSHIGHLIGHTER_TEXT ); ?></a></li>
                <li><a href="#tab-family" data-toggle="tab"><?php _e( 'Family', MSHIGHLIGHTER_TEXT ); ?></a></li>
            </ul>
            <!-- END-TABS NAVIGATION MENU -->


            <!-- TAB 1 -->
            <div class="tab-page fade active in" id="tab-core">

                <?php require_once( MSHIGHLIGHTER_PATH . 'inc/php/settings.php' ); ?>

            </div>
            <!-- END-TAB 1 -->

            <!-- TAB 2 -->
            <div class="tab-page fade" id="tab-usage">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Usage', MSHIGHLIGHTER_TEXT ); ?></h3>
                    <div class="inside">
                        <p><?php _e( 'To add the syntax highlighting to your code in any post, simply follow these steps:', MSHIGHLIGHTER_TEXT ); ?></p>
                        <ol class="custom-counter">
                            <li><?php _e( 'Go to the "Settings" tab.', MSHIGHLIGHTER_TEXT ); ?></li>
                            <li><?php _e( 'Select the desired settings and click the "Save Changes" button.', MSHIGHLIGHTER_TEXT ); ?></li>
                            <li><?php _e( 'On the WP Post/Page Editor page switch to the Text/HTML editor and wrap your source code in one of the supported shortcodes (like <code>[code]...[/code]</code> that is universal shortcode). Example:', MSHIGHLIGHTER_TEXT ); ?><br><br>

<pre><code>[code]
This

is

an "example"!
[/code]</code></pre>
                                <p><?php _e( 'In this case, the shortcode will prevent WordPress from inserting paragraph breaks between `This`, `is` and `an "example"`, as well as ensure that the double quotes around `example` are not converted to typographic (curly) quotes.', MSHIGHLIGHTER_TEXT ); ?></p>
                                <p><?php _e( 'You can use shortcodes such as:', MSHIGHLIGHTER_TEXT ); ?><p>
                                <code>[code] [php] [javascript] [js] [xml] [html] [css] [scss] [less] [sass] [markdown] [perl] [sql] [mysql] [shell] [bash]</code>
                                <p class="note"><b><?php _e( 'Note!', MSHIGHLIGHTER_TEXT ); ?></b> <?php _e( 'To avoid problems, edit posts that contain your source code only in Text/HTML mode.', MSHIGHLIGHTER_TEXT ); ?></p></li>
                            <li><?php _e( 'Enjoy the fancy syntax highlighting on your website.', MSHIGHLIGHTER_TEXT ); ?> <?php _e( 'It\'s that simple!', MSHIGHLIGHTER_TEXT ); ?></li>
                        </ol>
                        <p class="note"><b><?php _e( 'Note!', MSHIGHLIGHTER_TEXT ); ?></b> <?php _e( 'If you want more options then tell me and I will be happy to add it.', MSHIGHLIGHTER_TEXT ); ?></p>
                    </div>
                </div>
            </div>
            <!-- END-TAB 2 -->

            <!-- TAB 3 -->
            <div class="tab-page fade" id="tab-faq">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Frequently Asked Questions', MSHIGHLIGHTER_TEXT ); ?></h3>
                    <div class="inside">

                        <div class="panel-group" id="collapse-group">
                            <?php
                                $loopvalue = '9';
                                for ( $i = 1; $i <= $loopvalue; $i++ ) {
                                    echo '<div class="panel panel-default">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#collapse-group" href="#element' . $i . '">
                                                    <h4 class="panel-title"></h4>
                                                </a>
                                            </div>
                                            <div id="element' . $i . '" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                </div>
                                            </div>
                                          </div>';
                                }
                            ?>
                        </div>

                        <div class="question-1"><?php _e( 'Will this plugin work on my WordPress.COM website?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-1"><?php _e( 'Sorry, this plugin is available for use only on self-hosted (WordPress.ORG) websites.', MSHIGHLIGHTER_TEXT ); ?></div>

                        <div class="question-2"><?php _e( 'Can I use this plugin on my language?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-2"><?php printf(
                                                            __( 'Yes. But If your language is not available then you can make one. This plugin is ready for translation. The<code>.pot</code>file is included and placed in the <code>languages</code> folder. Many of plugin users would be delighted if you shared your translation with the community. Just send the translation files (<code>*.po, *.mo</code>) to me at the %s and I will include the translation within the next plugin update.', MSHIGHLIGHTER_TEXT ),
                                                                '<a href="mailto:arthurgareginyan@gmail.com?subject=My Syntax Highlighter">arthurgareginyan@gmail.com</a>'
                                                          );
                                              ?></div>

                        <div class="question-3"><?php _e( 'How does it work?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-3"><?php _e( 'On the "Settings" tab, select the desired settings and click the "Save Changes" button. Enjoy the fancy syntax highlighting on your website. It\'s that simple!', MSHIGHLIGHTER_TEXT ); ?></div>

                        <div class="question-4"><?php _e( 'Does this plugin requires any modification of the theme?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-4"><?php _e( 'Absolutely not. This plugin is configurable entirely from the plugin settings page.', MSHIGHLIGHTER_TEXT ); ?></div>

                        <div class="question-5"><?php _e( 'Does this require any knowledge of HTML or CSS?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-5"><?php _e( 'Absolutely not. This plugin can be configured with no knowledge of HTML or CSS, using an easy-to-use plugin settings page.', MSHIGHLIGHTER_TEXT ); ?></div>

                        <div class="question-6 question-red"><?php _e( 'It\'s not working. What could be wrong?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-6"><?php _e( 'As with every plugin, it\'s possible that things don\'t work. The most common reason for this is a web browser\'s cache. Every web browser stores a cache of the websites you visit (pages, images, and etc.) to reduce bandwidth usage and server load. This is called the browser\'s cache.​ Clearing your browser\'s cache may solve the problem.', MSHIGHLIGHTER_TEXT ); ?><br><br>
                                              <?php _e( 'It\'s impossible to tell what could be wrong exactly, but if you post a support request in the plugin\'s support forum on WordPress.org, I\'d be happy to give it a look and try to help out. Please include as much information as possible, including a link to your website where the problem can be seen.', MSHIGHLIGHTER_TEXT ); ?></div>

                        <div class="question-7 question-red"><?php _e( 'Where to report bug if found?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-7"><?php printf(
                                                            __( 'Please visit the %s Dedicated Plugin Page on GitHub %s and report.', MSHIGHLIGHTER_TEXT ),
                                                                '<a href="https://github.com/ArthurGareginyan/my-syntax-highlighter" target="_blank">',
                                                                '</a>'
                                                          );
                                              ?></div>

                        <div class="question-8"><?php _e( 'Where to share any ideas or suggestions to make the plugin better?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-8"><?php printf(
                                                            __( 'Any suggestions are very welcome! Please send me an email to %s arthurgareginyan@gmail.com %s. Thank you!', MSHIGHLIGHTER_TEXT ),
                                                                '<a href="mailto:arthurgareginyan@gmail.com?subject=My Syntax Highlighter">',
                                                                '</a>'
                                                          );
                                              ?></div>

                        <div class="question-9"><?php _e( 'I love this plugin! Can I help somehow?', MSHIGHLIGHTER_TEXT ); ?></div>
                        <div class="answer-9"><?php printf(
                                                            __( 'Yes, any financial contributions are welcome! Just visit %s my website %s, click on the donate button, and thank you!', MSHIGHLIGHTER_TEXT ),
                                                                '<a href="http://www.arthurgareginyan.com/donate.html" target="_blank">',
                                                                '</a>'
                                                          );
                                              ?></div>

                    </div>
                </div>
            </div>
            <!-- END-TAB 3 -->

            <!-- TAB 4 -->
            <div class="tab-page fade" id="tab-author">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Author', MSHIGHLIGHTER_TEXT ); ?></h3>
                    <div class="inside include-tab-author"></div>
                </div>
            </div>
            <!-- END-TAB 4 -->

            <!-- TAB 5 -->
            <div class="tab-page fade" id="tab-support">
                <div class="postbox">
                    <h3 class="title"><?php _e( 'Support', MSHIGHLIGHTER_TEXT ); ?></h3>
                    <div class="inside include-tab-support"></div>
                </div>
            </div>
            <!-- END-TAB 5 -->

            <!-- TAB 6 -->
            <div class="tab-page fade" id="tab-family">
                <div class="include-tab-family"></div>
            </div>
            <!-- END-TAB 6 -->

            <div class="additional-css"></div>

        </div>

    </div>
    <?php
}
