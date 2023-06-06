<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines {@link \local_celeneaccessibility\privacy\provider} class.
 *
 * @package     local_celeneaccessibility
 * @category    privacy
 * @copyright   2023 Vaggarath <jchambon@univ-tours.fr>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_celeneaccessibility\privacy;

use core_privacy\local\metadata\collection;

/**
 * class to provide user's used informations
 */
class provider implements
    \core_privacy\local\metadata\provider {

    /**
     * Privacy api
     *
     * @param class $collection
     * @return collection
     */
    public static function get_metadata(collection $collection): collection {

        $collection->add_user_preference('theme_celene4boost_darkbtn',
                                        'privacy:metadata:preference:theme_celene4boost_darkbtn');
        $collection->add_user_preference('theme_celene4boost_parkinson',
                                        'privacy:metadata:preference:theme_celene4boost_parkinson');
        $collection->add_user_preference('theme_celene4boost_letter', 'privacy:metadata:preference:theme_celene4boost_letter');
        $collection->add_user_preference('theme_celene4boost_word', 'privacy:metadata:preference:theme_celene4boost_word');
        $collection->add_user_preference('theme_celene4boost_line', 'privacy:metadata:preference:theme_celene4boost_line');
        $collection->add_user_preference('theme_celene4boost_font', 'privacy:metadata:preference:theme_celene4boost_font');
        $collection->add_user_preference('theme_celene4boost_blue', 'privacy:metadata:preference:theme_celene4boost_blue');
        $collection->add_user_preference('theme_celene4boost_fontsize', 'privacy:metadata:preference:theme_celene4boost_fontsize');
        $collection->add_user_preference('theme_celene4boost_lowsat', 'privacy:metadata:preference:theme_celene4boost_lowsat');
        $collection->add_user_preference('theme_celene4boost_texttransform',
                                        'privacy:metadata:preference:theme_celene4boost_texttransform');

        return $collection;
    }
}
