<?php

/**
 * @file
 * template.php
 */

/**
 * Preprocess variables for html.tpl.php
 *
 * @see system_elements()
 * @see html.tpl.php
 */
function uw_boundless_preprocess_html(&$variables) {
    // Adding the UW Alert Banner script  
    $options = array();
    $options['type'] = 'external';
    $options['scope'] = 'header';
    drupal_add_js('//www.washington.edu/static/alert.js', $options);
}

/**
 * Add in some variables for use in page.tpl.php
 *
 * Implements hook_preprocess_page()
 * 
 * @param type &$variables
 */
function uw_boundless_preprocess_page(&$variables) {
    
    // reset content column class from bootstrap's default col-sm-9 to col-md-8.
    // the column class for sidebar_second is hard-coded in page.tpl.php 
    if (!empty($variables['page']['sidebar_second'])) {
        $variables['content_column_class'] = ' class="col-md-8"';
    }
    else {
        $variables['content_column_class'] = ' class="col-sm-12"';
  }
    
}
/**
 * Implements hook_process_page()
 *
 * @param array &$variables
 */
function uw_boundless_process_page(&$variables) {
    
    // create new wrapper when main menu is in region "navigation"
    if(!empty($variables['page']['navigation']['system_main-menu'])) {
        $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__main_menu');
    }
}

/**
 * Override or insert variables into the block template
 * 
 * @todo    
 */
function uw_boundless_preprocess_block(&$variables) {

  // var_dump($vars);

  $block = $variables['block'];

  //if ($block->delta == 'YOURBLOCK') {
    $variables['title_attributes_array']['class'][] = 'widgettitle';
  //}

}

/**
 * Bootstrap theme wrapper function for the main menu in navigation region
 */
function uw_boundless_menu_tree__main_menu(&$variables) {
  return '<ul class="dawgdrops-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Returns HTML for the main menu links
 *
 * @param array $vars
 * @return string HTML output
 */
function uw_boundless_menu_link__main_menu($variables) {
    $element = $variables['element'];
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
 * Overrides bootstrap_breadcrumb().
 *
 * @notes   creates link for last crumb,
 *          add 'current' class to last item,
 *          sets breadcrumbs as an unordered list, 
 *          remove 'breadcrumb' class from the list attributes
 */
function uw_boundless_breadcrumb($variables) {
    $output = '';
    $breadcrumb = $variables['breadcrumb'];
        
    // Determine if we are to display the breadcrumb.
    $bootstrap_breadcrumb = theme_get_setting('bootstrap_breadcrumb');
    if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
        
        // only change if the "Show current page title at end" in the theme is checked
        if (theme_get_setting('bootstrap_breadcrumb_title')) {
            // create link for last crumb
            $active_key = (count($breadcrumb) - 1);
            $active_link = array(
                '#theme' => 'link',
                '#text' => $breadcrumb[$active_key]['data'],
                '#path' => current_path(),
                '#options' => array(
                    'attributes' => array('title' => $breadcrumb[$active_key]['data']),
                    'html' => FALSE,
                ),
            );

            // set link as data for the active crumb and add the 'current' class.
            $breadcrumb[$active_key] = array(
                'data' => theme('link', $active_link),
                'class' => array('current active'),
            );
        }
       
        // remove bootstrap's breadcrumb class from the attributes,
        // add breadcrumb to output
        $output = theme('item_list', array(
            'attributes' => array(
              //'class' => array('breadcrumb'),
            ),
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
function _uw_boundless_printtoscreen($vars) {
    print '<pre>';
    print_r($vars);
    print '</pre>';
}