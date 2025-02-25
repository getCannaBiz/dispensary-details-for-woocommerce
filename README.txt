=== Dispensary Details for WooCommerce ===
Contributors: deviodigital
Donate link: https://cannabizsoftware.com
Tags: dispensary, weed, woocommerce, ecommerce, marijuana, cannabis
Requires at least: 3.0.1
Tested up to: 5.3.2
Stable tag: 1.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add additional details to your dispensary items being sold through WooCommerce.

== Description ==

Add additional details to your dispensary items being sold through WooCommerce. Brought to you by [CannaBiz Software](https://cannabizsoftware.com/)

== Changelog ==

= 1.6.0 =
* Added validation check to the add to cart button for product inventory amount in `admin/class-wpd-details-woocommerce.php`
* Added validation check to the add to cart button for product inventory amount in `public/js/wpd-details-public.js`
* Bugfix removed recommendation doc if red X is clicked in `admin/wpd-details-user-fields.php`
* Updated text strings for localization in `languages/wpd-details.pot`
* Updated code to escape all `$_POST` instances in multiple files

= 1.5.0 =
* Added setting to require recommendation before checkout in `admin/class-wpd-details-woocommerce.php`
* Added `dispensary_details` shortcode in `includes/class-wpd-details.php`
* Added Shelf type taxonomy in `admin/class-wpd-details-taxonomies.php`
* Added Strain type taxonomy in `admin/class-wpd-details-taxonomies.php`
* Added Shelf type and Strain type functions to activation hook in `includes/class-wpd-details-activator.php`
* Updated text strings for localalization in `admin/class-wpd-details-woocommerce.php`
* Updated `wp_redirect` for empty cart and visitor checkout to remove `exit` in `admin/class-wpd-details-woocommerce.php`
* Updated text strings for localalization in `languages/wpd-details.pot`
* WordPress Coding Standards updates throughout various files
* General code cleanup throughout multiple files

= 1.4.0 =
* Added patient verification fields to user profiles in `admin/wpd-details-user-fields.php`
* Added Doctor recommendation option to Settings page in `admin/class-wpd-details-woocommerce.php`
* Added WooComerce template file for the edit-account screen in `woocommerce/form-edit-account.php`
* Updated CSS for Edit User screen in the admin dashboard in `admin/css/wpd-details-admin.css`
* Updated CSS for patient recommendation fields in user profiles in `admin/css/wpd-details-public.css`
* Updated text strings for localization in `languages/wpd-details.pot`

= 1.3.0 =
* Add ability to reduce stock by decimal grams in `admin/class-wpd-details-woocommerce.php`
* Add input fields for number of grams to reduce stock by for variable products in `admin/class-wpd-details-woocommerce.php`
* Add Product Data Tab's for product dispensary data in `admin/class-wpd-details-woocommerce.php`
* Removed metaboxes in favor of the new Product Data Tabs in `includes/class-wpd-details.php`

= 1.2.0 =
* Add "Auto-complete orders" option to Settings page in `admin/class-wpd-details-woocommerce.php`
* Add "Empty Cart Redirect" option to Settings page in `admin/class-wpd-details-woocommerce.php`
* Add Tinctures details metabox in `admin/class-wpd-details-metaboxes.php`
* Add $capabilities to all taxonomies in `admin/class-wpd-details-taxonomies.php`
* Updated compound details metabox input field width in `admin/css/wpd-details-admin.css`

= 1.1.0 =
* Add CBG% to compound details in `admin/class-wpd-details-metaboxes.php`
* Add "Dispensary Details" tab to the WooCommerce Settings page in `admin/class-wpd-details-woocommerce.php`
* Add "Minimum Order Amount" option to Settings page in `admin/class-wpd-details-woocommerce.php`
* Add "Shipping or Delivery" option to Settings page in `admin/class-wpd-details-woocommerce.php`
* Add "Visitor Checkout Redirect" option to Settings page in `admin/class-wpd-details-woocommerce.php`

= 1.0 =
* Initial Release.
