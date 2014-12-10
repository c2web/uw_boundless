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

  //_uw_boundless_printtoscreen($breadcrumb);
?>
<div id="uwsearcharea" class="uw-search-bar-container">
    <div class="container no-height">
        <div class="center-block uw-search-wrapper">
            <?php print render($page['search']); ?>
        </div>
    </div>
</div>
<!-- /#uwsearcharea -->

<div id="uw-container">

    <nav id="quicklinks" role="navigation" aria-label="quick links" aria-hidden="" class="">
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
    
    <div id="uw-container-inner">
        <?php include "includes/thinstrip.php"; ?>
        <!-- /#uw-thinstrip -->

        <nav id="dawgdrops" aria-label="Main menu" role="navigation">
            <div class="dawgdrops-inner container">
                <?php print render($page['navigation']); ?>
            </div>
        </nav>
        <div class="uw-hero-image" style="background-image:url('http://www.washington.edu/brand/files/2014/09/w3.jpg');"></div>
         
        <div class="container uw-body">
                        
            <div class="row">
                
                <section<?php print $content_column_class; ?>>
                    
                <?php if (!empty($site_name)): ?>
                    <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><h2 class="uw-site-title"><?php print $site_name; ?><?php if (!empty($site_slogan)): print '&#32;&#47;&#32;'.$site_slogan; endif; ?></h2></a>
                <?php endif; ?>
                    
                <?php if (!empty($page['highlighted'])): ?>
                  <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
                <?php endif; ?>
                  
                <?php if (!empty($breadcrumb)): ?>
                    <nav class="uw-breadcrumbs" role="navigation" aria-label="breadcrumbs">
                    <?php print $breadcrumb; ?>
                    </nav>
                <?php endif;?>
                  
                  
                  <!-- /#uw-mobile-menu -->
                  
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
                <aside class="col-md-4 uw-sidebar" role="complementary">
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

            <p role="contentinfo">&copy; <?php print uw_boundless_copyrightyear(); ?>  University of Washington  |  Seattle, WA</p>


        </div><!-- /#uw-footer -->

    </div><!-- /#uw-container-inner -->
</div><!-- /#uw-container -->
