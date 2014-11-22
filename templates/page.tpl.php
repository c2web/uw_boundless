<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
//print '<pre>';
//print_r ($page['header']);
//print '</pre>';
?>
<!-- #todo  build uwsearcharea dynamically -->
<div id="uwsearcharea" class="uw-search-bar-container">
    <div class="container no-height">
        <div class="center-block uw-search-wrapper">
            <form class="uw-search" action="/uw_brand/">
                <input id="uw-search-bar" type="search" name="s" value="" autocomplete="off" tabindex="-1"></form>
            <select id="mobile-search-select" class="visible-xs">
                <option value="uw" selected="">All the UW</option>
                <option value="site">Current site</option></select>
            <button class="search" tabindex="-1"></button>
            <div class="labels hidden-xs">
                <label class="radio checked">
                    <span class="icons">
                        <span class="first-icon fui-radio-unchecked"></span>
                        <span class="second-icon fui-radio-checked"></span></span>
                    <input type="radio" name="search" value="uw" data-toggle="radio" checked="" tabindex="-1">All the UW</label>
                <label class="radio">
                    <span class="icons">
                        <span class="first-icon fui-radio-unchecked"></span>
                        <span class="second-icon fui-radio-checked"></span></span>
                    <input type="radio" name="search" value="site" data-toggle="radio" tabindex="-1">Current site</label>
            </div>
        </div>
        <div class="uw-results center-block" style="display: none;">
            <p class="more-results" style="display:none;">Need more results? Try the <a href="http://www.washington.edu/directory/" title="Full directory">full directory</a></p>
        </div>
    </div>
</div>
<!-- /#uwsearcharea -->

    <?php //print render($page['search']); ?>

<div id="uw-container">

    <!-- #todo  build quicklinks dynamically -->
    <nav id="quicklinks" role="navigation" aria-label="quick links" aria-hidden="false" class="open">
        <ul id="big-links"> 
            <li><span class="icon-myuw"></span><a href="http://myuw.washington.edu" tabindex="0">MyUW</a></li> 
            <li><span class="icon-calendar"></span><a href="http://uw.edu/calendar" tabindex="0">Calendar</a></li> 
            <li><span class="icon-directories"></span><a href="http://uw.edu/directory/" tabindex="0">Directories</a></li> 
            <li><span class="icon-libraries"></span><a href="http://www.lib.washington.edu/" tabindex="0">Libraries</a></li> 
            <li><span class="icon-medicine"></span><a href="http://www.uwmedicine.org/" tabindex="0">UW Medicine</a></li> 
            <li><span class="icon-maps"></span><a href="http://uw.edu/maps" tabindex="0">Maps</a></li> 
            <li><span class="icon-uwtoday"></span><a href="http://www.uw.edu/news" tabindex="0">UW Today</a></li>
        </ul>
        <h3>Helpful Links</h3>
        <ul id="little-links">
            <li><span class="false"></span><a href="http://www.washington.edu/itconnect/forstudents.html" tabindex="0">Computing/IT</a></li> 
            <li><span class="false"></span><a href="http://f2.washington.edu/fm/payroll/payroll/ESS" tabindex="0">Employee Self Service</a></li> 
            <li><span class="false"></span><a href="http://www.hfs.washington.edu/huskycard/" tabindex="0">Husky Card</a></li> 
            <li><span class="false"></span><a href="http://www.bothell.washington.edu/" tabindex="0">UW Bothell</a></li> 
            <li><span class="false"></span><a href="http://www.tacoma.uw.edu/" tabindex="0">UW Tacoma</a></li> 
            <li><span class="false"></span><a href="https://www.facebook.com/UofWA" tabindex="0">UW Facebook</a></li> 
            <li><span class="false"></span><a href="https://twitter.com/UW" tabindex="0">UW Twitter</a></li>
        </ul>
    </nav>
    
    
    <!--<a href='#main_content' class='screen-reader-shortcut' tabindex=1>Skip to main content</a>-->

    <div id="uw-container-inner">
        
        <header class="uw-thinstrip">

        <nav class="uw-thin-strip-nav" role='navigation' aria-label='audience based'>
            <ul class="uw-thin-links">
              <li class="uw-quicklinks"><button aria-haspopup="true" aria-expanded="false">Quick Links<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15.63px" height="69.13px" viewBox="0 0 15.63 69.13" enable-background="new 0 0 15.63 69.13" xml:space="preserve"><polygon fill="#FFFFFF" points="12.8,7.776 12.803,7.773 5.424,0 3.766,1.573 9.65,7.776 3.766,13.98 5.424,15.553 12.803,7.78"/><polygon fill="#FFFFFF" points="9.037,61.351 9.036,61.351 14.918,55.15 13.26,53.577 7.459,59.689 1.658,53.577 0,55.15 5.882,61.351 5.882,61.351 5.884,61.353 0,67.557 1.658,69.13 7.459,63.019 13.26,69.13 14.918,67.557 9.034,61.353"/></svg></button></li>
              <li class="uw-search"><button aria-haspopup='true' aria-owns='uwsearcharea' aria-controls='uwsearcharea' aria-expanded='false'>Open search area

              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="18.776px" height="51.062px" viewBox="0 0 18.776 51.062" enable-background="new 0 0 18.776 51.062" xml:space="preserve">
              <g>
                <path fill="#FFFFFF" d="M3.537,7.591C3.537,3.405,6.94,0,11.128,0c4.188,0,7.595,3.406,7.595,7.591
                  c0,4.187-3.406,7.593-7.595,7.593C6.94,15.185,3.537,11.778,3.537,7.591z M5.245,7.591c0,3.246,2.643,5.885,5.884,5.885
                  c3.244,0,5.89-2.64,5.89-5.885c0-3.245-2.646-5.882-5.89-5.882C7.883,1.71,5.245,4.348,5.245,7.591z"/>

                  <rect x="2.418" y="11.445" transform="matrix(0.7066 0.7076 -0.7076 0.7066 11.7842 2.0922)" fill="#FFFFFF" width="1.902" height="7.622"/>
              </g>
              <path fill="#FFFFFF" d="M3.501,47.864c0.19,0.194,0.443,0.29,0.694,0.29c0.251,0,0.502-0.096,0.695-0.29l5.691-5.691l5.692,5.691
                c0.192,0.194,0.443,0.29,0.695,0.29c0.25,0,0.503-0.096,0.694-0.29c0.385-0.382,0.385-1.003,0-1.388l-5.692-5.691l5.692-5.692
                c0.385-0.385,0.385-1.005,0-1.388c-0.383-0.385-1.004-0.385-1.389,0l-5.692,5.691L4.89,33.705c-0.385-0.385-1.006-0.385-1.389,0
                c-0.385,0.383-0.385,1.003,0,1.388l5.692,5.692l-5.692,5.691C3.116,46.861,3.116,47.482,3.501,47.864z"/>
              </svg>

            </button></li>
              <li><a href="http://uw.edu/alumni" title="Alumni">Alumni</a></li>
              <li><a href="http://uw.edu/facultystaff" title="Faculty & Staff">Faculty & Staff</a></li>
              <li><a href="http://uw.edu/parents" title="Parents">Parents</a></li>
                 <li><a href="http://uw.edu/studentlife" title="Students">Students</a></li>
            </ul>
        </nav>

        <div class="container">
          <a href="http://uw.edu" title="University of Washington Home" class="uw-patch" tabindex='-1' aria-hidden='true'>Home</a>
          <a href="http://uw.edu" title="University of Washington Home" class="uw-wordmark">Home</a>
        </div>
      </header><!-- /#uw-thinstrip -->
        
        <div class="container uw-body">
            
            <header role="banner" id="page-header">
              <?php if (!empty($site_slogan)): ?>
                <p class="lead"><?php print $site_slogan; ?></p>
              <?php endif; ?>

              <?php print render($page['header']); ?>
            </header> <!-- /#page-header -->
            
            <div class="row">
                
                <section<?php print $content_column_class; ?>>
                <?php if (!empty($page['highlighted'])): ?>
                  <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
                <?php endif; ?>
                <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
                <a id="main-content"></a>
                <?php print render($title_prefix); ?>
                <?php if (!empty($title)): ?>
                  <h1 class="page-header"><?php print $title; ?></h1>
                <?php endif; ?>
                <?php print render($title_suffix); ?>
                <?php print $messages; ?>
                <?php if (!empty($tabs)): ?>
                  <?php print render($tabs); ?>
                <?php endif; ?>
                <?php if (!empty($page['help'])): ?>
                  <?php print render($page['help']); ?>
                <?php endif; ?>
                <?php if (!empty($action_links)): ?>
                  <ul class="action-links"><?php print render($action_links); ?></ul>
                <?php endif; ?>
                <div class="uw-content" role='main'>
                    <div id='main_content' class="uw-body-copy">
                    <?php print render($page['content']); ?>
                    </div>
                </div>
                </section>
                
            <?php if (!empty($page['sidebar_second'])): ?>
            <aside class="col-sm-3 uw-sidebar" role="complementary">
            <?php print render($page['sidebar_second']); ?>
            </aside>  <!-- /#sidebar-second -->
            <?php endif; ?>
              
            </div>

        </div><!-- /#uw-body -->
        
        
        
        
        <div class="uw-footer">

            <a href="http://www.washington.edu" class="footer-wordmark">University of Washington</a>

            <a href="http://www.washington.edu/boundless/be-boundless/"><h3 class="be-boundless">Be boundless</h3></a>

            <h4>Connect with us:</h4>

            <nav role="navigation" aria-label="social networking">
                <ul class="footer-social">
                    <li><a class="facebook" href="http://www.facebook.com/UofWA">Facebook</a></li>
                    <li><a class="twitter" href="http://twitter.com/UW">Twitter</a></li>
                    <li><a class="instagram" href="http://instagram.com/uofwa">Instagram</a></li>
                    <li><a class="tumblr" href="http://uofwa.tumblr.com/">Tumblr</a></li>
                    <li><a class="youtube" href="http://www.youtube.com/user/uwhuskies">YouTube</a></li>
                    <li><a class="linkedin" href="http://www.linkedin.com/company/university-of-washington">LinkedIn</a></li>
                    <li><a class="pinterest" href="http://www.pinterest.com/uofwa/">Pinterest</a></li>
                    <li><a class="vine" href="https://vine.co/uofwa">Vine</a></li>
                    <li><a class="google" href="https://plus.google.com/+universityofwashington/posts">Google+</a></li>
                </ul>
            </nav>

            <nav role="navigation" aria-label="footer links">
                <ul class="footer-links">
                    <li><a href="http://www.uw.edu/accessibility">Accessibility</a></li>
                    <li><a href="http://uw.edu/home/siteinfo/form">Contact Us</a></li>
                    <li><a href="http://www.washington.edu/jobs">Jobs</a></li>
                    <li><a href="http://www.washington.edu/safety">Campus Safety</a></li>
                    <li><a href="http://myuw.washington.edu/">My UW</a></li>
                    <li><a href="http://www.washington.edu/admin/rules/wac/rulesindex.html">Rules Docket</a></li>
                    <li><a href="http://www.washington.edu/online/privacy">Privacy</a></li>
                    <li><a href="http://www.washington.edu/online/terms">Terms</a></li>
                </ul>
            </nav>

            <p role="contentinfo">&copy;	 2014 University of Washington  |  Seattle, WA</p>


        </div><!-- /#uw-footer -->

    </div><!-- /#uw-container-inner -->
</div><!-- /#uw-container -->
