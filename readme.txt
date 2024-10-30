=== Plugin Name ===
Contributors: sitebase
Donate link: http://www.sitebase.be/
Tags: mailer, smtp, gmail, email, send, phpmailer, wp_mail, ssl
Requires at least: 3.0
Tested up to: 3.1
Stable tag: trunk

Configure a mail server you want to use for mailing in WordPress

== Description ==

Use a custom mail server to send mails in WP. This way you can also send emails when testing on your local server.
Make sure to follow us on [Twitter](http://twitter.com/Sitebase "Follow Sitebase on Twitter") for updates and more.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `mailbase` to the `/wp-content/plugins/` directory
2. Open the file `/wp-content/plugins/mailbase/mailbase.php` and scroll down untill you find the private static options array.
Here you fill in the information to connect too your mail server you want to use.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings > MailBase and configure the plugin with your mail server settings

== Frequently Asked Questions ==

= Can I use GMail as mail server? =

Yes, that is possible.
To do this you using the following configuration:
From email : email@mysite.com
From name : Your Name
SMTP Host : smtp.gmail.com
SMTP Port : 465
SMTP Secure : true
Auth : true
Auth username : gmail email address
Auth password : gmail password

You only need to change From email, form name, Auth username and auth password.

== Screenshots ==

1. This is a small plugin that uses clean OOP code.

== Changelog ==

= 0.9 =
* Added an easy to use admin panel

= 0.1 =
* Initial version

