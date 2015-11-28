<?php

/**
 * Prevent Direct Access
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Render Settings Page
 *
 * @since 1.0
 */
function mshighlighter_render_submenu_page() {

	// Declare variables
    $options = get_option( 'mshighlighter_settings' );
    $example = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP Code Example</title>
</head>
<body>
    <h1>PHP Code Example</h1>
    
    <p><?php echo "Hello World!"; ?></p>

    <div class="foobar">
        This    is  an
        example of  smart
        tabs.
    </div>

    <p><a href="http://wordpress.org/">WordPress</a></p>
</body>
</html>';

	// Settings update message
	if ( isset( $_GET['settings-updated'] ) ) :
		?>
			<div id="message" class="updated">
				<p>
					<?php _e( 'Your settings was sucessfully saved.', 'mshighlighter' ); ?>
				</p>
			</div>
		<?php
	endif;

	// Page
	?>
	<div class="wrap">
		<h2>
            <?php _e( 'My Syntax Highlighter', 'mshighlighter' ); ?>
            <br/>
            <span>
                <?php _e( 'by <a href="http://mycyberuniverse.com/author.html" target="_blank">Arthur "Berserkr" Gareginyan</a>', 'mshighlighter' ); ?>
            <span/>
		</h2>

        <div id="poststuff" class="metabox-holder has-right-sidebar">

            <!-- SIDEBAR -->
            <div class="inner-sidebar">
                <div id="side-sortables" class="meta-box-sortabless ui-sortable">

                    <div id="about" class="postbox">
                        <h3 class="title">About</a></h3>
                        <div class="inside">
                            <p class="about">
                                <img src="<?php echo plugins_url('thanks.png', __FILE__); ?>">
                            </p>
                            <p>
                                <?php _e( 'This plugin allows you to easily ...', 'mshighlighter' ) ?>
                            </p>
                            <p>
                                <?php _e( 'To use, ..., then click "Save Changes". It\'s that simple!', 'mshighlighter' ) ?>
                            </p>
                        </div>
                    </div>

                    <div id="donate" class="postbox">
                        <h3 class="title">Donate</h3>
                        <div class="inside">
                            <p class="donate">If you like this plugin and find it useful, help me to make this plugin even better and keep it up-to-date.</p>
                            <div class="aligncenter">
                                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank" rel="nofollow">
                                    <img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Make a donation">
                                </a>
                            </div>
                            <p class="donate">Thanks for your support!</p>
                        </div>
                    </div>

                    <div id="help" class="postbox">
                        <h3 class="title">Help</h3>
                        <div class="inside">
                            <div class="aligncenter">
                                <p>If you want more options then tell me and I will be happy to add it.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END-SIDEBAR -->

            <!-- FORM -->
            <div class="has-sidebar sm-padded">
                <div id="post-body-content" class="has-sidebar-content">
                    <div class="meta-box-sortabless">

                        <form name="mshighlighter-form" action="options.php" method="post" enctype="multipart/form-data">
                            <?php settings_fields( 'mshighlighter_settings_group' ); ?>

                            <?php do_action( 'mshighlighter-form-top' ); ?>

                            <div class="postbox" id="Settings">
                                <h3 class="title">Main Settings</h3>
                                <div class="inside">
                                    <p>...</p>
                                    <table class="form-table">
                                        <tr valign='top'>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <?php submit_button( __( 'Save Changes', 'mshighlighter' ), 'primary', 'submit', true ); ?>
                                </div>
                            </div>

                            <div class="postbox" id="Preview">
                                <h3 class="title">Preview</h3>
                                <div class="inside">
                                    <p>Click "Save Changes" to update this preview.</p>
                                    <textarea readonly id="mshighlighter" name="mshighlighter"><?php echo $example; ?></textarea>
                                </div>
                            </div>

                            <?php do_action( 'mshighlighter-form-bottom' ); ?>
                        </div>
                    </div>
                </div>
                <!-- END-FORM -->

            </form>

        </div>

	</div>
	<?php
}