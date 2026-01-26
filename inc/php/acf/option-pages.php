<?php
    add_action('acf/init', 'site_option_page');
    function site_option_page() {

        // Check function exists.
        if( function_exists('acf_add_options_page') ) {

            // Register options page.
            $option_page = acf_add_options_page(array(
                'page_title'    => __('Theme General Settings'),
                'menu_title'    => __('Theme Settings'),
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));
        }
    }
