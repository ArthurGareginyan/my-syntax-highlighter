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

	// Declare variables
    $options = get_option( 'mshighlighter_settings' );
    $example = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Code Example</title>
</head>
<body>
    <h1>Code Example</h1>
    
    <p><?php echo "Hello World!"; ?></p>

    <div class="foobar">
        This    is  an
        example of  smart
        tabs.
    </div>

    <p><a href="http://wordpress.org/">WordPress</a></p>
</body>
</html>';

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'My Syntax Highlighter', MSHIGHLIGHTER_TEXT ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://www.arthurgareginyan.com" target="_blank">Arthur Gareginyan</a>', MSHIGHLIGHTER_TEXT ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title"><?php _e( 'About', MSHIGHLIGHTER_TEXT ); ?></a></h3>
                        <div class="inside">
                            <p><?php _e( 'Simple post syntax-highlighted code without losing it\'s formatting or making any manual changes. Supporting multiple languages, shortcodes and themes.', MSHIGHLIGHTER_TEXT ); ?></p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title"><?php _e( 'Help', MSHIGHLIGHTER_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Got something to say? Need help?', MSHIGHLIGHTER_TEXT ); ?></p>
                            <p><a href="mailto:arthurgareginyan@gmail.com?subject=My Syntax Highlighter">arthurgareginyan@gmail.com</a></p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title"><?php _e( 'Donate', MSHIGHLIGHTER_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', MSHIGHLIGHTER_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                <img src="<?php echo plugins_url('../img/btn_donateCC_LG.gif', __FILE__); ?>" alt="Make a donation">
                            </a>
                            <p><?php _e( 'Thanks for your support!', MSHIGHLIGHTER_TEXT ); ?></p>
                        </div>
                    </div>

                    <a href="//www.iconfinder.com/?ref=ArthurGareginyan" target="_blank" rel="nofollow">
                        <img style="border:0px" src="<?php echo plugins_url('../img/banner.png', __FILE__); ?>" width="280" height="180" alt="">
                    </a>

                </div>
            </div>
            <!-- END-SIDEBAR -->

            <!-- FORM -->
            <div class="has-sidebar sm-padded">
                <div id="post-body-content" class="has-sidebar-content">
                    <div class="meta-box-sortabless">

                        <form name="mshighlighter-form" action="options.php" method="post" enctype="multipart/form-data">
                            <?php settings_fields( 'mshighlighter_settings_group' ); ?>

                            <div class="postbox" id="Settings">
                                <h3 class="title"><?php _e( 'Main Settings', MSHIGHLIGHTER_TEXT ); ?></h3>
                                <div class="inside">

                                    <table class="form-table">

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'Enable Plugin:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="checkbox" name="mshighlighter_settings[enable]" id="mshighlighter_settings[enable]" <?php if ( !empty($options['enable']) ) { checked( $options['enable'], "on" ); } ?> >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'>
                                                <?php _e( 'Enable or disable this plugin.', MSHIGHLIGHTER_TEXT ); ?>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'Default language:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <select name="mshighlighter_settings[defaultLanguage]">
                                                    <?php
                                                        $defaultLanguage = array(
                                                                                 '- NONE -' => '',
                                                                                 'PHP' => 'php',
                                                                                 'JavaScript' => 'javascript',
                                                                                 'XML' => 'xml',
                                                                                 'HTML' => 'html',
                                                                                 'CSS' => 'css',
                                                                                 'SCSS' => 'scss',
                                                                                 'LESS' => 'less',
                                                                                 'SASS' => 'sass',
                                                                                 'Markdown' => 'markdown',
                                                                                 'Perl' => 'perl',
                                                                                 'SQL' => 'sql',
                                                                                 'MySQL' => 'mysql',
                                                                                 'Shell' => 'shell',
                                                                                 'BASH' => 'bash'
                                                                                 );
                                                        foreach ($defaultLanguage as $key => $value) {
                                                            $selected = selected( $options['defaultLanguage'], $value );
                                                            echo '<option value="' . $value . '" id="' . $value . '"' . $selected . ' >' . $key . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'>
                                                <?php _e( 'Default language mode for the shortcode [code]. You can select -NONE- to leave without highlighting.', MSHIGHLIGHTER_TEXT ); ?>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'Color theme:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <select name="mshighlighter_settings[theme]">
                                                    <?php
                                                        $themes = array(
                                                                        'default',
                                                                        '3024-day',
                                                                        '3024-night',
                                                                        'ambiance-mobile',
                                                                        'ambiance',
                                                                        'base16-dark',
                                                                        'base16-light',
                                                                        'blackboard',
                                                                        'cobalt',
                                                                        'colorforth',
                                                                        'eclipse',
                                                                        'elegant',
                                                                        'erlang-dark',
                                                                        'lesser-dark',
                                                                        'liquibyte',
                                                                        'mbo',
                                                                        'mdn-like',
                                                                        'midnight',
                                                                        'monokai',
                                                                        'neat',
                                                                        'neo',
                                                                        'night',
                                                                        'paraiso-dark',
                                                                        'paraiso-light',
                                                                        'pastel-on-dark',
                                                                        'rubyblue',
                                                                        'solarized',
                                                                        'the-matrix',
                                                                        'tomorrow-night-bright',
                                                                        'tomorrow-night-eighties',
                                                                        'ttcn',
                                                                        'twilight',
                                                                        'vibrant-ink',
                                                                        'xq-dark',
                                                                        'xq-light',
                                                                        'zenburn'
                                                                        );
                                                        foreach ($themes as $option) {
                                                            $selected = selected( $options['theme'], $option );
                                                            echo '<option value="' . $option . '" id="' . $option . '"' . $selected . ' >' . $option . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'>
                                                <?php _e( 'Theme which you like to view.', MSHIGHLIGHTER_TEXT ); ?>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'Display line numbers:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="checkbox" name="mshighlighter_settings[line_numbers]" id="mshighlighter_settings[line_numbers]" class="" <?php if ( !empty($options['line_numbers']) ) { checked( $options['line_numbers'], "on" ); } ?> >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'First line number:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="text" name="mshighlighter_settings[first_line_number]" id="mshighlighter_settings[first_line_number]" size="3" value="<?php if ( !empty($options['first_line_number']) ) { echo $options['first_line_number']; } else { echo "0"; } ?>" >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'The width of Tab:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="text" name="mshighlighter_settings[tab_size]" id="mshighlighter_settings[tab_size]" size="1" value="<?php if ( !empty($options['tab_size']) ) { echo $options['tab_size']; } else { echo "4"; } ?>" >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'Automatic height of code block:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="checkbox" name="mshighlighter_settings[automatic_height]" id="mshighlighter_settings[automatic_height]" class="" <?php if ( !empty($options['automatic_height']) ) { checked( $options['automatic_height'], "on" ); } ?> >
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'>
                                                <?php _e( 'ON - Automatic height. OFF - Fixed height, with scrollbar.', MSHIGHLIGHTER_TEXT ); ?>
                                            </td>
                                        </tr>

                                        <tr valign='top'>
                                            <th>
                                                <?php _e( 'The height of code block:', MSHIGHLIGHTER_TEXT ); ?>
                                            </th>
                                            <td>
                                                <input type="text" name="mshighlighter_settings[block_height]" id="mshighlighter_settings[block_height]" size="4" value="<?php if ( !empty($options['block_height']) ) { echo $options['block_height']; } else { echo "300"; } ?>" >
                                            </td>
                                        </tr>
                                        <tr valign='top'>
                                            <td></td>
                                            <td class='help-text'>
                                                <?php _e( 'The height (in pixels) of code block. Default is 300px.', MSHIGHLIGHTER_TEXT ); ?>
                                            </td>
                                        </tr>


                                    </table>
                                    <?php submit_button( __( 'Save Changes', MSHIGHLIGHTER_TEXT ), 'primary', 'submit', true ); ?>
                                </div>
                            </div>

                            <div class="postbox" id="Preview">
                                <h3 class="title"><?php _e( 'Preview', MSHIGHLIGHTER_TEXT ); ?></h3>
                                <div class="inside">
                                    <p><?php _e( 'Click "Save Changes" to update this preview.', MSHIGHLIGHTER_TEXT ); ?></p>
                                    <textarea readonly id="mshighlighter" class="mshighlighter" language="html" name="mshighlighter"><?php echo $example; ?></textarea>
                                    <p><?php _e( 'This is an example of HTML language.', MSHIGHLIGHTER_TEXT ); ?></p>
                                </div>
                            </div>

                            <div class="postbox" id="Using">
                                <h3 class="title"><?php _e( 'Using', MSHIGHLIGHTER_TEXT ); ?></h3>
                                <div class="inside">
                                    <p><?php _e( 'Just switch to the Text/HTML editor and wrap your source code in one of the supported shortcodes (like `[code]...[/code]` that is universal shortcode) and this plugin takes care of the rest. Example:', MSHIGHLIGHTER_TEXT ); ?></p>
<pre><code>[code]
 This

 is

 an "example"!
 [/code]</code></pre>
                                    <p><?php _e( 'In this case, the shortcode will prevent WordPress from inserting paragraph breaks between `This`, `is` and `an "example"`, as well as ensure that the double quotes around `example` are not converted to typographic (curly) quotes.', MSHIGHLIGHTER_TEXT ); ?></p>
                                    <p><?php _e( 'You can use shortcodes such as:', MSHIGHLIGHTER_TEXT ); ?><br>
                                    <span><?php _e( '[code] [php] [javascript] [js] [xml] [html] [css] [scss] [less] [sass] [markdown] [perl] [sql] [mysql] [shell] [bash]', MSHIGHLIGHTER_TEXT ); ?></span></p>
                                    <p><?php _e( 'NOTE: To avoid problems, edit posts that contain your source code only in Text/HTML mode.', MSHIGHLIGHTER_TEXT ); ?></p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- END-FORM -->

        </div>

	</div>
	<?php
}