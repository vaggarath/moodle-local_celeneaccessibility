<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * (This is a one-line short description of the file).
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    local_inwitools
 * @copyright  2021 bcourtin@univ-tours.fr
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_celeneaccessibility_myprofile_navigation(core_user\output\myprofile\tree $tree, $user, $iscurrentuser, $course) {
    if (!isloggedin() || isguestuser()) {
        return '';
    }

    $category = new core_user\output\myprofile\category('local_celeneaccessibility/management', "Accessibilité", null);
    $tree->add_category($category);

    $name = get_string('menuname', 'local_celeneaccessibility');
    $url = new moodle_url('/local/celeneaccessibility/index.php');

    $localnode =  new core_user\output\myprofile\node('local_celeneaccessibility/management', 'celeneaccessibility',
            $name, null, $url, null, null,'local-celeneaccessibility');
    $tree->add_node($localnode);
}

// mysql -e "use moodle;SELECT MAX(UPDATE_TIME) FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ;" | grep -v "\----" | grep -v "MAX(UPDATE_TIME)" | awk '{print $1}'