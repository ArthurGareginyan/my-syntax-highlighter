<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Render Sidebar
 */
?>
    <div class="inner-sidebar">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable">

            <div class="postbox banner">
                <h3 class="title"><?php _e( 'We are «Space X-Chimp»', $plugin['text'] ); ?></h3>
                <div class="inside">
                    <a href="https://www.spacexchimp.com/" target="_blank">
                        <img src="<?php echo $plugin['url'] . 'inc/img/spacexchimp-logo.png'; ?>" alt="Space X-Chimp">
                    </a>
                </div>
            </div>

            <div class="postbox banner">
                <div class="inside">
                    <a href="https://www.spacexchimp.com/plugins/my-syntax-highlighter-pro.html" target="_blank">
                        <img src="<?php echo $plugin['url'] . 'inc/img/upgrade.png'; ?>" alt="Upgrade" style="margin-top:-16px;">
                    </a>
                </div>
            </div>

            <div class="postbox about">
                <h3 class="title"><?php _e( 'About', $plugin['text'] ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'This plugin gives you the ability to easily and safely embed a syntax-highlighted source code within pages and posts on your WordPress website without losing its formatting.', $plugin['text'] ); ?></p>
                </div>
            </div>

            <div class="postbox help">
                <h3 class="title"><?php _e( 'Help', $plugin['text'] ); ?></h3>
                <div class="inside">
                    <p><?php _e( 'If you have a question, please read the information in the FAQ section.', $plugin['text'] ); ?></p>
                </div>
            </div>

            <div class="postbox support">
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

        </div>
    </div>
<?php
