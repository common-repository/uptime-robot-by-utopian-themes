# Uptime Robot #
Contributors: @briancwelch
Requires at least: WordPress 4.0
Tested up to: WordPress 4.5.2

A simple WordPress dashboard widget that shows you the current uptime stats of your Uptime Robot monitored websites.

## Description ##
This plugin will allow you to enter your Uptime Robot API key and will provide a dashboard widget that will show you each of your current monitors, the monitor ID, their type, ratio and will provide a link to each of the sites in question.

*Each listing is also color coded visually depending on its status, providing much needed information at a quick glance.*


## Installation ##
Either upload the zip in the plugins manager, or install using the WordPress dashboard and activate the plugin.
Once you have activated the plugin, visit the Uptime Robot settings submenu, and enter your Uptime Robot API key, and save your changes.

*The widget and monitor listing will be displayed on your WordPress dashboard.  You may also add a widget in the widget settings, or use the [uptime_robot] shortcode.*


## Frequently Asked Questions ##
**Q: What is Uptime Robot?**
*Uptime Robot provides real time site monitoring for multiple different types of connections and data types.*

**Q: Do I need to sign up for Uptime Robot to get an API key?**
*Yes.  You will not be able to obtain an API key otherwise.*

**Q: Does Uptime Robot cost anything?**
*No.  They have free accounts and options.*

**Q: Are you affiliated with Uptime Robot?**
*No.  I just thought others may enjoy this plugin.*

**Q: Does it cost anything to use this plugin?**
*No.  However, you may donate to help fund further development if you find the plugin useful.*


## Screenshots ##
![Alt text](https://github.com/briancwelch/uptime_robot/blob/screenshots/screenshot-1.png?raw=true "Dashboard Widget")

![Alt text](https://github.com/briancwelch/uptime_robot/blob/screenshots/screenshot-2.png?raw=true "Settings")


## Changelog ##
**v1.5.1**
- Fix missing table CSS.

**v1.5.0**
- Major re-write.
- Better class instantiation of class objects for modularity.
- Numerous bug fixes.
- Reduced amount of CSS needed to render widgets.
- Remove Javascript tooltips and use CSS tooltips instead.
- Remove Bootstrap dependencies.
- Add [uptime_robot] shortcode to display widget where needed.
- Updated translations.
- Tagged as WordPress 4.5.x compatible.

**v1.1.1**
- Properly sanitize the front end widget input/output.
- Updated translations.

**v1.1.0**
- Updated translations.

**v1.0.9**
- Tagged as WordPress 4.2.x compatible.
- Minified the CSS to help load times.
- Added a new front-end widget.
- Fixed a bug that allowed links to non http(s) servers.
- Code cleanup to further adhere to WordPress coding standards.
- Reverse final standalone version; will continue to provide future updates due to user requests.

**v1.0.8**
- Tagging as ready for WordPress 4.1
- ~~Final standalone version.  Now being maintained only as a Maera framework plugin for WordPress.  Find out more at http://press.codes~~

**v1.0.7**
- Fix an issue with $port_tip being undefined which caused an error in the debugger.
- Fix spelling and grammar mistakes in the documentation.

**v1.0.6**
- Code Cleanup [See also: WordPress PHP Coding Standards.](http://make.wordpress.org/core/handbook/coding-standards/php/)
- Sanitize the URL of the panel images.
- Update readme.txt for better legibility and markdown.
- Tagging as WordPress 4.0 ready.

**v1.0.5**
- Added icons and tooltips for the monitor status and removed status text in an order to maximize widget real estate.
- Added option to toggle the display of the monitor ID.
- Added option to toggle the display of the uptime ratio.
- Added option to toggle the display of the monitor type.
- Cleaned up tooltip styling.

**v1.0.4**
- Fix API key sanitization.

**v1.0.3**
- Code and CSS cleanup.  
- Revised tooltip function so that tooltips are displayed only on monitored ports.  
- Updated screenshot.

**v1.0.2**
- Add tooltips to show the port being monitored if the monitor subtype is set to "Port."

**v1.0.1**
- Fix error with loading CSS file if plugin directory name was changed.

**v1.0.0**
- Initial version.


## Upgrade Notice ##
**1.5.0**
Upgrading to 1.5.0 adds a new shortcode and fixes numerous issues and bugs.

**1.0.9**
Upgrading to 1.0.9 adds a new front-end widget and fixes a few issues.

**1.0.6**
Upgrading to 1.0.6 fixes a security issue with sanitizing the panel image URLs, and is ready for WordPress 4.0.

**1.0.5**
Upgrading to 1.0.5 enables a few additional display options.

**1.0.4**
Upgrading to 1.0.4 fixes a security issue by properly sanitizing the API Key setting.


## Translations ##
* English: Default - Always included.


## Credits ##
* Thanks to David Sal for the idea.
* [Uptime Robot](http://www.uptimerobot.com/) for providing a wonderful free service.
* @emiliorcueto for various bugfix(es).


## Additional Info ##
No additional information is available at the moment.
