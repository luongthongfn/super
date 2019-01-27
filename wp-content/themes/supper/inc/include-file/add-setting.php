<?php
function setting_address_callback()
{
    ?>
        <textarea id="" cols="80" rows="10" name="setting_address" ><?= get_option('setting_address') ?></textarea>
    <?php
}
function setting_phone_callback()
{
    ?>
        <input type="tel" id="" name="setting_phone" value="<?= esc_attr(get_option('setting_phone')) ?>"/>
    <?php
}
function setting_email_callback()
{
    ?>
        <input type="email" id="" name="setting_email" value="<?= esc_attr(get_option('setting_email')) ?>"/>
    <?php
}

function your_function(){
    add_settings_field('setting_address', __('address', 'super'), 'setting_address_callback', 'general');
    add_settings_field('setting_phone', __('phone number', 'super'), 'setting_phone_callback', 'general');
    add_settings_field('setting_email', __('email', 'super'), 'setting_email_callback', 'general');

    register_setting('general', 'setting_address', 'esc_attr');
    register_setting('general', 'setting_phone', 'esc_attr');
    register_setting('general', 'setting_email', 'esc_attr');
}
add_action('admin_init', 'your_function');
