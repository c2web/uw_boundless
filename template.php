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
//function uw_boundless_preprocess_page(&$vars) {
//}

/**
 * Override or insert variables into the block template
 */
function uw_boundless_preprocess_block(&$vars) {

  // var_dump($vars);

  $block = $vars['block'];

  //if ($block->delta == 'YOURBLOCK') {
    $vars['title_attributes_array']['class'][] = 'widgettitle';
  //}

}