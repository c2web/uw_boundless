<?php
/**
 * @file
 * theme-settings.php
 *
 * Provides theme settings for the UW Boundless theme.
 *
 */

/**
 * Implements hook_form_FORM_ID_alter().
 */
function uw_boundless_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
    // Work-around for a core bug affecting admin themes.
    // @see https://drupal.org/node/943212
    if (isset($form_id)) {
        return;
    }
    
    // UW Boundless Theme Settings 
    $form['uw_boundless'] = array(
        '#type' => 'vertical_tabs',
        '#prefix' => '<h2><small>' . t('UW Boundless Theme Settings') . '</small></h2>',
        '#weight' => -11,
    );

    // Sidebar menu 
    $form['uw_boundless_sidebar_menu'] = array(
        '#type' => 'fieldset',
        '#title' => t('Sidebar menu'),
        '#group' => 'uw_boundless',
    );
    // Sidebar menu visibilty
    $form['uw_boundless_sidebar_menu']['uw_boundless_sidebar_menu_visibility']= array(
        '#type' => 'select',
        '#title' => t('Sidebar menu visibility'),
        '#default_value' => theme_get_setting('uw_boundless_sidebar_menu_visibility'),
        '#options' => array(
            0 => t('Hidden'),
            1 => t('Visible'),
        ),
    );
    
}
