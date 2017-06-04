<?php

/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab
 *
 * @since 2.4
 */
?>
    <!-- SIDEBAR -->
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div id="about" class="postbox">
                <h3 class="title"><?php _e( 'About', MSHIGHLIGHTER_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'Simple post syntax-highlighted code without losing it\'s formatting or making any manual changes. Supporting multiple languages, shortcodes and themes.', MSHIGHLIGHTER_TEXT ); ?></p>
                    <p class="version"><?php _e( 'Version', MSHIGHLIGHTER_TEXT ); ?> <?php echo MSHIGHLIGHTER_VERSION; ?></p>
                </div>
            </div>

            <div id="support" class="postbox">
                <h3 class="title"><?php _e( 'Support', MSHIGHLIGHTER_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', MSHIGHLIGHTER_TEXT ); ?></p>
                    <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', MSHIGHLIGHTER_TEXT ); ?></a>
                    <p><?php _e( 'Thanks for your support!', MSHIGHLIGHTER_TEXT ); ?></p>
                </div>
            </div>

            <div id="help" class="postbox">
                <h3 class="title"><?php _e( 'Help', MSHIGHLIGHTER_TEXT ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'Got something to say? Need help?', MSHIGHLIGHTER_TEXT ); ?></p>
                    <p><a href="mailto:arthurgareginyan@gmail.com?subject=<?php echo MSHIGHLIGHTER_NAME; ?>">arthurgareginyan@gmail.com</a></p>
                </div>
            </div>

        </div>
    </div>
    <!-- END-SIDEBAR -->

    <!-- FORM -->
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( MSHIGHLIGHTER_SETTINGS . '_settings_group' ); ?>

                    <?php
                        // Get options from the database
                        $options = get_option( MSHIGHLIGHTER_SETTINGS . '_settings' );
                    ?>

                    <div class="postbox" id="Settings">
                        <h3 class="title"><?php _e( 'Main Settings', MSHIGHLIGHTER_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'There you can configure this plugin.', MSHIGHLIGHTER_TEXT ); ?></p>

                            <table class="form-table">

                                <?php mshighlighter_setting( 'enable',
                                                             __( 'Enable Plugin', MSHIGHLIGHTER_TEXT ),
                                                             __( 'Enable or disable this plugin.', MSHIGHLIGHTER_TEXT ),
                                                             'check'
                                                            );
                                ?>

                                <tr>
                                    <th>
                                        <?php _e( 'Default language', MSHIGHLIGHTER_TEXT ); ?>
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
                                                foreach ( $defaultLanguage as $key => $value ) {
                                                    $selected = selected( $options['defaultLanguage'], $value );
                                                    echo '<option value="' . $value . '" id="' . $value . '"' . $selected . ' >' . $key . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'>
                                        <?php _e( 'Default language mode for the shortcode [code]. You can select -NONE- to leave without highlighting.', MSHIGHLIGHTER_TEXT ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php _e( 'Color theme', MSHIGHLIGHTER_TEXT ); ?>
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
                                                foreach ( $themes as $option ) {
                                                    $selected = selected( $options['theme'], $option );
                                                    echo '<option value="' . $option . '" id="' . $option . '"' . $selected . ' >' . $option . '</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class='help-text'>
                                        <?php _e( 'Theme which you like to view.', MSHIGHLIGHTER_TEXT ); ?>
                                    </td>
                                </tr>

                                <?php mshighlighter_setting( 'line_numbers',
                                                             __( 'Display line numbers', MSHIGHLIGHTER_TEXT ),
                                                             '',
                                                             'check'
                                                            );
                                ?>

                                <?php mshighlighter_setting( 'first_line_number',
                                                             __( 'First line number', MSHIGHLIGHTER_TEXT ),
                                                             '',
                                                             'field',
                                                             '0',
                                                             '2'
                                                            );
                                ?>

                                <?php mshighlighter_setting( 'dollar_sign',
                                                             __( 'Display dollar sign ($)', MSHIGHLIGHTER_TEXT ),
                                                             __( 'Display the dollar sign ($) before every code line.', MSHIGHLIGHTER_TEXT ),
                                                             'check'
                                                            );
                                ?>

                                <?php mshighlighter_setting( 'automatic_height',
                                                             __( 'Automatic height of code block', MSHIGHLIGHTER_TEXT ),
                                                             __( 'ON - Automatic height. OFF - Fixed height, with scrollbar.', MSHIGHLIGHTER_TEXT ),
                                                             'check'
                                                            );
                                ?>

                                <?php mshighlighter_setting( 'block_height',
                                                             __( 'The height of code block', MSHIGHLIGHTER_TEXT ),
                                                             __( 'The height (in pixels) of code block. Default is 300px.', MSHIGHLIGHTER_TEXT ),
                                                             'field',
                                                             '300',
                                                             '4'
                                                         );
                                ?>

                                <?php mshighlighter_setting( 'tab_size',
                                                             __( 'The width of Tab', MSHIGHLIGHTER_TEXT ),
                                                             '',
                                                             'field',
                                                             '4',
                                                             '2'
                                                            );
                                ?>

                            </table>

                            <?php submit_button( __( 'Save Changes', MSHIGHLIGHTER_TEXT ), 'primary', 'submit', true ); ?>

                        </div>
                    </div>

                    <div class="postbox" id="Preview">
                        <h3 class="title"><?php _e( 'Preview', MSHIGHLIGHTER_TEXT ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save Changes" button to update this preview.', MSHIGHLIGHTER_TEXT ); ?></p>
                            <?php
                                // Put the example in a variable
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
                            ?>
                            <textarea readonly id="mshighlighter" class="mshighlighter" language="html" name="mshighlighter"><?php echo $example; ?></textarea>
                            <p><?php _e( 'This is an example of HTML language.', MSHIGHLIGHTER_TEXT ); ?></p>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', MSHIGHLIGHTER_TEXT ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'I\'m an independent developer, without a regular income, so every little contribution helps cover my costs and lets me spend more time building things for people like you to enjoy.', MSHIGHLIGHTER_TEXT ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="additional-button paypal"><?php _e( 'Donate with PayPal', MSHIGHLIGHTER_TEXT ); ?></a>
                            <p><?php _e( 'Thanks for your support!', MSHIGHLIGHTER_TEXT ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- END-FORM -->
<?php
