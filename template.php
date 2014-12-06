<?php

/**
 * @file
 * template.php
 */

/**
 * Add in some variables for use in page.tpl.php
 *
 * Implements hook_preprocess_page()
 *
 * @param array &$vars
 */
function uw_boundless_process_page(&$vars) {
    // create new wrapper when main menu is in region "navigation"
    if(!empty($vars['page']['navigation']['system_main-menu'])) {
        $vars['primary_nav']['#theme_wrappers'] = array('menu_tree__main_menu');
    }
}

/**
 * Override or insert variables into the block template
 * 
 * @todo    
 */
function uw_boundless_preprocess_block(&$vars) {

  // var_dump($vars);

  $block = $vars['block'];

  //if ($block->delta == 'YOURBLOCK') {
    $vars['title_attributes_array']['class'][] = 'widgettitle';
  //}

}

/**
 * Bootstrap theme wrapper function for the main menu in navigation region
 */
function uw_boundless_menu_tree__main_menu(&$vars) {
  return '<ul class="dawgdrops-nav">' . $vars['tree'] . '</ul>';
}

/**
 * Returns HTML for the main menu links
 *
 * @param array $vars
 * @return string HTML output
 */
function uw_boundless_menu_link__main_menu($vars) {
    $element = $vars['element'];
    $sub_menu = '';
    
    if ($element['#below']) {
        // Add our own wrapper.
        unset($element['#below']['#theme_wrappers']);
        $sub_menu = '<ul class="dawgdrops-menu">' . drupal_render($element['#below']) . '</ul>';
    }
    // Generate as standard dropdown.
    $element['#attributes']['class'][] = 'dawgdrops-item';
    
    // Set dropdown trigger element to # to prevent inadvertant page loading
    // when a submenu link is clicked.
    //$element['#localized_options']['attributes']['data-target'] = '#';
    $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
    //$element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
      
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Overrides theme_breadcrumb().
 *
 * Print breadcrumbs as an unordered list.
 */
function uw_boundless_breadcrumb($variables) {
  $output = '';
  $breadcrumb = $variables['breadcrumb'];

  // Determine if we are to display the breadcrumb.
  $bootstrap_breadcrumb = theme_get_setting('bootstrap_breadcrumb');
  if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
    $output = theme('item_list', array(
//      'attributes' => array(
//        'class' => array('breadcrumb'),
//      ),
      'items' => $breadcrumb,
      'type' => 'ul',
    ));
  }
  return $output;
}



/**
 * Helper function
 * 
 * @return string returns a string containing the year or year-range
 */
function uw_boundless_copyrightyear() {
    $start = "2014";
    $range = ((date('Y') == $start) ? $range = $start : $range = $start."&#45;".date('Y')); 
    return t($range);
}


/**
 * temp devel function
 */
function _uw_boundless_printtoscreen(&$vars) {
    print '<pre>';
    print_r($vars);
    print '</pre>';
}