<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Settings Tab Content
 */
?>
    <div class="has-sidebar sm-padded">
        <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless">

                <form action="options.php" method="post" enctype="multipart/form-data">
                    <?php settings_fields( $plugin['settings'] . '_settings_group' ); ?>

                    <?php
                        // Preparing an array with unique names of languages but non-unique modes (reversed key-value pair)
                        $languages = spacexchimp_p010_get_codemirror_mode_pairs();
                        $languages = array_flip( $languages );
                        $languages_plus = array( '' => '- NONE - ' ) + $languages;

                        // Preparing an array with the names of themes
                        $themes = spacexchimp_p010_get_codemirror_theme_pairs();
                        $themes_plus = array( 'default' => 'Default' ) + $themes;
                    ?>

                    <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg button-save-top">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        <span><?php _e( 'Save changes', $plugin['text'] ); ?></span>
                    </button>

                    <div class="postbox" id="settings">
                        <h3 class="title"><?php _e( 'Main Settings', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Here you can configure this plugin.', $plugin['text'] ); ?></p>
                            <table class="form-table">
                                <?php
                                    spacexchimp_p010_control_switch( 'enable',
                                                                     __( 'Enable plugin', $plugin['text'] ),
                                                                     __( 'Enable or disable this plugin.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p010_control_list( 'defaultLanguage',
                                                                    $languages_plus,
                                                                   __( 'Default language', $plugin['text'] ),
                                                                   __( 'Default language mode for the shortcode [code]. You can select -NONE- to leave without highlighting.', $plugin['text'] ),
                                                                   ''
                                                                 );
                                    spacexchimp_p010_control_list( 'theme',
                                                                    $themes_plus,
                                                                   __( 'Color theme', $plugin['text'] ),
                                                                   __( 'You can choose the theme which you like to view.', $plugin['text'] ),
                                                                   'default'
                                                                 );
                                    spacexchimp_p010_control_switch( 'line_numbers',
                                                                     __( 'Line numbering', $plugin['text'] ),
                                                                     __( 'Display the line numbers in the code block.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p010_control_number( 'first_line_number',
                                                                     __( 'First line number', $plugin['text'] ),
                                                                     __( 'You can set the number of the first line.', $plugin['text'] ),
                                                                     '0'
                                                                   );
                                    spacexchimp_p010_control_switch( 'dollar_sign',
                                                                     __( 'Dollar sign ($)', $plugin['text'] ),
                                                                     __( 'Display the dollar sign ($) before every code line.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p010_control_switch( 'automatic_height',
                                                                     __( 'Automatic height of code block', $plugin['text'] ),
                                                                     __( 'YES - Automatic height. NO - Fixed height, with scrollbar.', $plugin['text'] )
                                                                   );
                                    spacexchimp_p010_control_number( 'block_height',
                                                                     __( 'Height of code block', $plugin['text'] ),
                                                                     __( 'The height (in pixels) of code block. Default is 300px.', $plugin['text'] ),
                                                                     '300'
                                                                   );
                                     spacexchimp_p010_control_number( 'tab_size',
                                                                      __( 'Tab character size', $plugin['text'] ),
                                                                      __( 'The width (in spaces) of the Tab character. Default is 4.', $plugin['text'] ),
                                                                      '4'
                                                                    );
                                ?>
                            </table>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" class="btn btn-default btn-lg button-save-main" value="<?php _e( 'Save changes', $plugin['text'] ); ?>">

                    <div class="postbox" id="preview">
                        <h3 class="title"><?php _e( 'Preview', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p class="note"><?php _e( 'Click the "Save changes" button to update this preview.', $plugin['text'] ); ?></p>
                            <?php
                                // Put the example in a variable
                                $example = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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

    <p><a href="https://wordpress.org/">WordPress</a></p>
</body>
</html>';
                            ?>
                            <textarea readonly id="mshighlighter" class="mshighlighter" language="html" name="mshighlighter"><?php echo $example; ?></textarea>
                            <p><?php _e( 'This is an example of HTML language.', $plugin['text'] ); ?></p>
                        </div>
                    </div>

                    <div class="postbox" id="support-addition">
                        <h3 class="title"><?php _e( 'Support', $plugin['text'] ); ?></h3>
                        <div class="inside">
                            <p><?php _e( 'Every little contribution helps to cover our costs and allows us to spend more time creating things for awesome people like you to enjoy.', $plugin['text'] ); ?></p>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" class="btn btn-default button-labeled">
                                <span class="btn-label">
                                    <img src="<?php echo $plugin['url'] . 'inc/img/paypal.svg'; ?>" alt="PayPal">
                                </span>
                                <?php _e( 'Donate with PayPal', $plugin['text'] ); ?>
                            </a>
                            <p><?php _e( 'Thanks for your support!', $plugin['text'] ); ?></p>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php
