UW Boundless - A Bootstrap 7.x-3.0 Sub-theme for Drupal.

REQUIREMENTS
---------------
1. UW Boundless requires Bootstrap 7.x-3.0 base-theme. Download Bootstrap 3 for Drupal (https://www.drupal.org/project/bootstrap). 
2. Bootstrap requires a minimum jQuery version of 1.7 to function properly. You must download and enable the jQuery Update (http://drupal.org/project/jquery_update/) module, 7.x-2.3 version or higher. Navigate to the configuration page and ensure that the minimum version selected is 1.7.

Recommendation:
For simplified navigation of the Management menu it is suggested to download and install the Administration menu module (https://www.drupal.org/project/admin_menu). 

AUTHORS
---------------
UW "Boundless" brand design & development:  UW Marketing & Communications
Drupal 7 theme implementation:              UW Creative Communications

DOCUMENTATION
---------------
The following documentation assumes:
- a new/fresh installation of Drupal 7
- use of the Main menu
- the default content feed as the default front page 
Some instructions may not apply exactly to existing Drupal 7 installations.

1. Download this theme and put it in the sites/all/themes/ folder of your site.

2. Enable the theme
Navigate to Administration > Appearance and make sure that the UW Boundless theme is the enabled and default theme.

3. Bootstrap CDN
The theme uses local bootstrap files. Make sure that BootstrapCDN is disabled.
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
In the "Bootstrap Settings" section, on the "Advanced" tab:
Expand "BOOTSTRAPCDN"
The "BootstrapCDN version" should be disabled.

4. UW Favicon
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
In the "Override Global Settings" section:
"Toggle display" tab:           "Shortcut icon" should be checked.
"Shortcut icon settings" tab:   "Use the default shortcut icon" should be checked.

5. Site Name / Site slogan
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
In the "Override Global Settings" section:
"Toggle display" tab:           "Site name" should be checked. "Site slogan" can be used optionally.

To change the name of your site,
navigate to Administration > Configuration > System > Site Information
and change the "Site name" field.

6. Main menu visibility
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
In the "Override Global Settings" section:
"Toggle display" tab:           "Main menu" should be checked.

7. Main menu region assignment
Navigate to Administration > Structures > Blocks
Assign the "Main menu" block to the "Navigation" region

8. Main menu links 
Navigate to Administration > Structures > Menu > Main Menu
Edit each of 1st level menu links and make sure the "Show as expanded" is checked.
Edit each of 2nd (and subsequent) level menu links and make sure the "Show as expanded" is unchecked.

9. Search form region assignment
Enable the core Search module by navigating to Administration > Modules, check "Search" in the core package, and click Save Configuration.
Navigate to Administration > Structures > Blocks
Assign the "Search form" block to the "Search" region

10. Breadcrumbs
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
In the "Bootstrap Settings" section, on the "Components" tab:
Expand "BREADCRUMBS"
Make sure that the breadcrumbs visibility setting is set to Visible
Make sure that "Show 'Home' breadcrumb link" is checked
Make sure that "Show current page title at end " is checked

11. Region wells
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
In the "Bootstrap Settings" section, on the "Components" tab:
Expand "REGION WELLS"
Make sure that none of the regions have classes specified. All regions should display "None" as the selected option.

12. jQuery update
Navigate to Administration > Configuration > Development > jQuery update
Make sure the "Default jQuery Version" is at least 1.7
