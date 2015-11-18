UW Boundless - A Bootstrap 7.x-3.0 Sub-theme for Drupal.

REQUIREMENTS
---------------
1. UW Boundless requires Bootstrap 7.x-3.0 base-theme. Download Bootstrap 3.0 for Drupal (https://www.drupal.org/node/2137547). 
    - http://ftp.drupal.org/files/projects/bootstrap-7.x-3.0.tar.gz
    - http://ftp.drupal.org/files/projects/bootstrap-7.x-3.0.zip
2. Bootstrap requires a minimum jQuery version of 1.7 to function properly. You must download and enable the jQuery Update (http://drupal.org/project/jquery_update/) module, 7.x-2.3 version or higher. Navigate to the configuration page and ensure that the minimum version selected is 1.7.

Recommendation:
For simplified navigation of the Management menu it is suggested to download and install the Administration menu module (https://www.drupal.org/project/admin_menu). 

AUTHORS
---------------
UW "Boundless" brand design & development:  UW Marketing & Communications
Drupal 7 theme implementation:              UW Creative Communications

ADDITIONAL DEVELOPMENT INFO
---------------
- The UW Boundless theme uses local bootstrap source files as described in "Method 1" of the Bootstrap Theming Guide: https://www.drupal.org/node/1978010
- The style sheet (css/style.css) is compiled using LESS CSS preprocessor.
- Scripts are not compiled and merely declared in the uw_boundless.info file.

DOCUMENTATION
---------------
The following documentation assumes:
- a new/fresh installation of Drupal 7
- use of the Main menu
- the default content feed as the default front page 
Some instructions may not apply exactly to existing Drupal 7 installations.

Configuration
---------------
1. Download this theme and put the extracted folder in the sites/[all|my_sitename]/themes/ folder of your site.
Make sure the folder name is "uw_boundless".

2. Enable the theme
Navigate to Administration > Appearance and make sure that the UW Boundless theme is the enabled and default theme.

3. Bootstrap CDN
The theme uses local bootstrap files (v3.3.1). Make sure that BootstrapCDN is disabled.
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
Set the "Default jQuery Version" to 1.8


UW Boundless Theme Settings
---------------
A custom theme settings section is introduced.
Navigate to Administration > Appearance and click the settings of the UW Boundless theme.
The "UW Boundless Theme Settings" section contains theme-specific configuration options.

1. Hero Image
Customize the path for the front page image and the image used on all other pages.

2. Front page
Contains color settings for elements on the front page.

3. Sidebar menu
Contains a setting to manage the visibility of the sidebar menu.


Creating a sub-theme
---------------
The following instructions are based on the "Creating a sub-theme" page of the Drupal Theming guide (https://www.drupal.org/node/225125)

1. Folder "my_subtheme_name"
Create a new folder in the sites/[all|my_sitename]/themes/ location of your drupal installation. 
This folder should have the same name as the internal name of the your sub-theme (e.g., my_subtheme_name).

2. File "my_subtheme_name.info"
Copy the uw_boundless.info file to you sub-theme folder and rename it to the name of your sub-theme (e.g. my_subtheme_name.info)
Edit your my_subtheme_name.info file by changing the "name" and "description" values to your liking. 
Don't change the "core" value. 
Change the "base theme" value to uw_boundless.

The first lines of your my_subtheme_name.info file should now look something like this:
name = My theme name
description = A UW Boundless sub-theme description
core = 7.x
base theme = uw_boundless

2a. Regions inheritance
Drupal sub-themes do not inherit regions, so keep the regions declarations as-is in your my_subtheme_name.info file.

2b. Style sheet inheritance
You must declare at least one stylesheet in your sub-theme for any of the parent theme's stylesheets to be inherited.
Keep the style sheet declaration as-is:
stylesheets[all][] = css/style.css

Copy the css folder (and its content) from the uw_boundless theme folder to your sub-theme folder.
Your sub-theme's folder and file structure should now look something like this:
my_subtheme_name/
--my_subtheme_name.info
--css/
----assets/
----style.css
----style.css.map

2c. JavaScript inheritance
All scripts defined in the uw_boundless theme will be inherited.
Disable or remove all scripts[] declarations from your my_subtheme_name.info file.

2d. Theme settings inheritance
All theme settings defined in the uw_boundless theme will be inherited.
Disable or remove all settings[uw_boundless_...] declarations from your my_subtheme_name.info file.

3. Enable your sub-theme
Navigate to Administration > Appearance and enable your sub-theme as the default theme.

4. Configuration
Step through the theme configuration instructions as described above (in particular 3.BootstrapCDN, 10.Breadcrumbs and 11.Region-wells) 
to reset some settings for your sub-theme.

5. Customize
You're now ready to further customize your sub-theme.