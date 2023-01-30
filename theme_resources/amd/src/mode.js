/**
 * Celene 4 boost is a clean and customizable theme.
 *
 * @package
 * @copyright   2022 Brice Courtin
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/log'], function (jQuery, log) {

    "use strict"; // jshint ignore:line

    log.debug('Celene 4 Boost mode.js function called');

    jQuery('.thememode').click(function (event) {
        event.preventDefault();
        if (jQuery('html').hasClass('dark')) {
            jQuery('html').toggleClass('dark', false);
            jQuery('nav.navbar').toggleClass('bg-white', true);
            jQuery('nav.navbar').toggleClass('bg-dark', false);
            M.util.set_user_preference('theme_celene4boost_mode', '');
            log.debug('Remove mode and save user preference');
        }
        else {
            jQuery('html').toggleClass('dark', true);
            jQuery('nav.navbar').toggleClass('bg-dark', true);
            jQuery('nav.navbar').toggleClass('bg-white', false);
            M.util.set_user_preference('theme_celene4boost_mode', 'dark');
            log.debug('Add mode and save user preference');
            log.debug('eeeee');
        }
    });

});
