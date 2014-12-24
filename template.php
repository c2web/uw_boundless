<?php

/**
 * @file
 * template.php
 */

/**
 * Preprocess variables for html.tpl.php
 *
 * Implements template_preprocess_html(&$variables)
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
 * Implements template_preprocess_page(&$variables)
 * 
 * @param type &$variables
 */
function uw_boundless_preprocess_page(&$variables) {

    // reset content column class from bootstrap's default col-sm-9 to col-md-8.
    // the column class for uw-sidebar is hard-coded in page.tpl.php 
    if (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second'])) {
        $variables['content_column_class'] = ' class="col-md-8"';
    }
    else {
        $variables['content_column_class'] = ' class="col-sm-12"';
    }

    //new variable for the sidebar menu
    $variables['uw_sidebar_menu'] = _uw_boundless_uw_sidebar_menu();
    
    // new variable to display copyright
    $variables['uw_copyright_year'] = _uw_boundless_copyrightyear();
}

/**
 * Implements template_preprocess_block(&$variables)
 * 
 * Override or insert variables into the block template
 * 
 * @notes   adds WP classess widget and widgettitle to blocks in the sidebar
 * 
 * @todo    
 */
function uw_boundless_preprocess_block(&$variables) {

    $block = $variables['block'];
   
    if (($block->region == 'sidebar_first') || ($block->region == 'sidebar_second'))  {
        $variables['classes_array'][] = 'widget';
        $variables['title_attributes_array']['class'][] = 'widgettitle';
    }

}

/**
 * Bootstrap theme wrapper function for the main-menu in navigation region
 */
function uw_boundless_menu_tree__main_menu(&$variables) {
    return '<ul class="dawgdrops-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_menu_link(array $variables)
 * Overrides bootstrap_menu_link(array $variables) for the main-menu
 * 
 * Returns HTML for the main menu links
 *
 * @param array $vars
 * @return string HTML output
 */
function uw_boundless_menu_link__main_menu(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';
    
    // Generate as dawgdrops-item.
    $element['#attributes']['class'][] = 'dawgdrops-item';
    
    if ($element['#below']) {
    
        if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
            
            // Set dropdown trigger element to # to prevent inadvertant page loading
            // when a submenu link is clicked.
            //$element['#localized_options']['attributes']['data-target'] = '#';
            $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
            //$element['#localized_options']['attributes']['data-toggle'] = 'dropdown';

            // Add our own wrapper.
            unset($element['#below']['#theme_wrappers']);
            $sub_menu = '<ul class="dawgdrops-menu">' . drupal_render($element['#below']) . '</ul>';
        }
    } 
   
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements theme_breadcrumb($variables)
 * Overrides bootstrap_breadcrumb($variables).
 *
 * @notes   creates link for last crumb,
 *          add 'current' class to last item,
 *          sets breadcrumbs as an unordered list, 
 *          remove 'breadcrumb' class from the list attributes
 * 
 * @todo fix when "Show 'Home' breadcrumb link" is unchecked in settings
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
            // data is currently set as html content, not as a link
            $breadcrumb[$active_key] = array(
                //'data' => theme('link', $active_link),
                'data' => '<span>'.$breadcrumb[$active_key]['data'].'</span>',
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
 * New wrapper for search form.
 * Implements hook_form_BASE_FORM_ID_alter(&$form, &$form_state, $form_id).
 * 
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 * 
 * @notes   sets the overridden theme wrapper bootstrap_search_form_wrapper
 * 
 * @todo Extend with options to select the site to be searched
 */
function uw_boundless_form_search_block_form_alter(&$form, &$form_state, $form_id) {
      $form[$form_id]['#theme_wrappers'] = array('bootstrap_search_form_wrapper');
}

/**
 * Overrides bootstrap_bootstrap_search_form_wrapper($variables)
 * 
 * Theme function implementation for bootstrap_search_form_wrapper.
 * 
 * @notes   added class 'search' to button element
 */
function uw_boundless_bootstrap_search_form_wrapper($variables) {
    $output = '<div class="input-group">';
    $output .= $variables['element']['#children'];
    $output .= '<span class="input-group-btn">';
    $output .= '<button type="submit" class="btn btn-default search">';
    // We can be sure that the font icons exist in CDN.
    if (theme_get_setting('bootstrap_cdn')) {
      $output .= _bootstrap_icon('search');
    }
    else {
      $output .= t('Search');
    }
    $output .= '</button>';
    $output .= '</span>';
    $output .= '</div>';
    return $output;
}


/**
 * Local function.
 * 
 * Returns a string containing the year or year-range.
 * 
 * @return string 
 * 
 * @see uw_boundless_preprocess_page(&$variables)
 */
function _uw_boundless_copyrightyear() {
    $start = "2014";
    $range = ((date('Y') == $start) ? $range = $start : $range = $start."&#45;".date('Y')); 
    return t($range);
}

/**
 * Local function 
 * 
 * Builds a dynamic sidebar menu.
 * 
 * @return HTML content
 * 
 * @todo Refactor. build item list and links as proper arrays
 */
function _uw_boundless_uw_sidebar_menu() {
          
    // get some data
    $current_path = current_path();
    $active_trail = menu_get_active_trail();
    $current_depth = count($active_trail);
    $active_trail_key =  $current_depth - 1;
    
    // get the current menu link
    $current_link = menu_link_get_preferred($current_path, 'main-menu');
   
    $output = TRUE;
    $output_menu = '';
    
    //$output_menu .= '<ul class="uw-sidebar-menu first-level">';
    //$output_menu .= '<li class="pagenav">';
    //$output_menu .= l("Home", $GLOBALS['base_url'], array('attributes' => array('title' => 'Home', 'class' => array('homelink'))));
    $output_menu .= '<ul>';
    
    // only display sidebar menu when there's a parent and it's not hidden
    if ((isset($current_link['plid'])) && (!$current_link['hidden'])) {
        
        // first level links
        if (($current_depth == 2) && ($current_link['has_children'])) {
            // show sub tree of current node            
            
            $output_menu .= '<li class="page_item page_item_has_children current_page_item">';
            $output_menu .= l($current_link['link_title'], $current_link['link_path']);
            
            // parameters to build the tree
            $parameters = array(
                'active_trail' => array($current_link['plid']),
                'only_active_trail' => FALSE,
                'min_depth' => $current_link['depth']+1,
                'max_depth' => $current_link['depth']+1,
                'conditions' => array('plid' => $current_link['mlid']),
              );  
            // get the children
            $children = menu_build_tree($current_link['menu_name'], $parameters);
            
            $output_menu .= '<ul class="children">';
            foreach ($children as $child) {
                if (!$child['link']['hidden']) {
                    $output_menu .= '<li class="page_item">';
                    $output_menu .= l($child['link']['link_title'], $child['link']['link_path']);
                    $output_menu .= '</li>';
                }
            }   
            $output_menu .= '</ul>';
            $output_menu .= '</li>';
            
        }
        // second level links and deeper
        elseif (($current_depth > 2)) {
            // show sub tree of parent and 
            // display current node as current page item
            
            // get active parent by moving one up the trail
            $active_parent = ($active_trail[$active_trail_key - 1]); 
            // get the parent menu link
            $parent_link = menu_link_get_preferred($active_parent['link_path'], 'main-menu');
            
            $output_menu .= '<li class="page_item page_item_has_children current_page_ancestor current_page_parent">';
            $output_menu .= l($parent_link['link_title'], $parent_link['link_path']);
            
            // parameters to build the tree
            $parameters = array(
                'active_trail' => array($parent_link['plid']),
                'only_active_trail' => FALSE,
                'min_depth' => $parent_link['depth']+1,
                'max_depth' => $parent_link['depth']+1,
                'conditions' => array('plid' => $parent_link['mlid']),
              );  
            // get the children
            $children = menu_build_tree($parent_link['menu_name'], $parameters);
            
            $output_menu .= '<ul class="children">';
            foreach ($children as $child) {  
                if ($current_path == $child['link']['link_path']) {
                    $output_menu .= '<li class="page_item current_page_item">';
                    $output_menu .= '<span>'.$child['link']['link_title'].'</span>';
                } else {
                    $output_menu .= '<li class="page_item">';
                    $output_menu .= l($child['link']['link_title'], $child['link']['link_path']);
                }
                $output_menu .= '</li>';
            }
            $output_menu .= '</ul>';
            $output_menu .= '</li>';
            
        } else {
            // link has no children
            $output = FALSE;
        }        
    } else {
        $output = FALSE;
    }
    
    $output_menu .= '</ul>';
    //$output_menu .= '</li>';
    //$output_menu .= '</ul>';
        
    return ($output) ? $output_menu : $output;
}



/**
 * Development function.
 * 
 * Prints a block of preformatted text.
 * 
 * @param type $vars
 */
function _uw_boundless_dump($vars) {
    //$output = '<pre class="uw_boundless_dump">'.var_export($vars, TRUE).'</pre>';
    $output = '<pre class="uw_boundless_dump">'.print_r($vars, TRUE).'</pre>';
    echo $output;
}