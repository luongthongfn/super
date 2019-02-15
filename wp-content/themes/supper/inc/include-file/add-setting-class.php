<?php
/*
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;
    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }
    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"

        // add_options_page(
        //     'Settings About us',
        //     'About us',
        //     'manage_options',
        //     'setting-about',
        //     array( $this, 'create_admin_page' )
        // );


        // add top level menu page
        add_menu_page(
            'Settings About us',
            'About us',
            'manage_options',
            'setting-about',
            array($this, 'create_admin_page'),
            'dashicons-info'
        );
    }
    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('setting_about');
        ?>
        <div class="wrap">
            <h1><?php _e('About us', 'super') ?></h1>
            <form method="post" action="options.php">
                <?php
                    // This prints out all hidden setting fields
                    settings_fields('my_about_group');
                    do_settings_sections('my-setting-admin-about');
                    submit_button();
                ?>
            </form>
        </div>
        <?php
}
    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'my_about_group', // Option group
            'setting_about', // Option name
            array($this, 'sanitize') // Sanitize
        );
        add_settings_section(
            'setting_section_about_id', // ID
            'My Custom Settings', // Title
            array($this, 'print_section_info'), // Callback
            'my-setting-admin-about' // Page
        );

        add_settings_field(
            'about_address', // ID
            __('Address'), // Title
            array($this, '_address_callback'), // Callback
            'my-setting-admin-about', // Page
            'setting_section_about_id' // Section
        );
        add_settings_field(
            'about_phone',
            __('Phone'),
            array($this, '_phone_callback'),
            'my-setting-admin-about',
            'setting_section_about_id'
        );
        add_settings_field(
            'about_email',
            __('Email'),
            array($this, '_email_callback'),
            'my-setting-admin-about',
            'setting_section_about_id'
        );
    }
    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        if (isset($input['address'])) {
            $new_input['address'] = sanitize_text_field($input['address']);
        }

        if (isset($input['phone'])) {
            $new_input['phone'] = sanitize_text_field($input['phone']);
        }

        if (isset($input['email'])) {
            $new_input['email'] = sanitize_text_field($input['email']);
        }

        return $new_input;
    }
    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }
    /**
     * Get the settings option array and print one of its values
     */

    public function _address_callback()
    {
        printf(
            '<textarea cols=80 rows=10 id="address" name="setting_about[address]" >%s</textarea>',
            isset($this->options['address']) ? esc_attr($this->options['address']) : ''
        );
    }

    public function _phone_callback()
    {
        printf(
            '<input type="text" id="phone" name="setting_about[phone]" value="%s" />',
            isset($this->options['phone']) ? esc_attr($this->options['phone']) : ''
        );
    }

    public function _email_callback()
    {
        printf(
            '<input type="text" id="email" name="setting_about[email]" value="%s" />',
            isset($this->options['email']) ? esc_attr($this->options['email']) : ''
        );
    }
}
if (is_admin()) {
    $my_settings_page = new MySettingsPage();
}
