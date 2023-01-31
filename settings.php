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
 * An accessibility plugin to enhance user experience
 *
 * @package   local_celeneaccessibility
 * @copyright 2022 Chambon Julien - Université de Tours
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if ($hassiteconfig) {
    //recuperer toutes les options vides pour les compter et plus tard proposer une option pour les nettoyer
    $sql = "SELECT *
            FROM {user_preferences}
            WHERE name LIKE :name AND value=''";
    $records = $DB->get_records_sql($sql, array('name'=>"theme_celene4boost_%"));

    $settings = new admin_settingpage('local_celeneaccessibility', get_string('pluginname', 'local_celeneaccessibility'));
    $ADMIN->add('localplugins', $settings);

    if ($ADMIN->fulltree) {
        require_once($CFG->dirroot . '/local/celeneaccessibility/lib.php');

        $settings->add(new admin_setting_configcheckbox(
            'local_celeneaccessibility/showtts', //name wich we retrieve it on index.php (and anywhere we'd use it)
            get_string('showtts', 'local_celeneaccessibility'), //checkbox' displayed label
            get_string('showttsdesc', 'local_celeneaccessibility'), //description of the option
            '0',
        ));

        $settings->add(new admin_setting_configcheckbox(
            'local_celeneaccessibility/showguiding', //name wich we retrieve it on index.php (and anywhere we'd use it)
            get_string('showguiding', 'local_celeneaccessibility'), //checkbox' displayed label
            get_string('showguidingdesc', 'local_celeneaccessibility'), //description of the option
            '0',
        ));

        $languages = array(
            'french' => get_string('frenchlanguage', 'local_celeneaccessibility'),
            'english' => get_string('englishlanguage', 'local_celeneaccessibility')
        );

        $settings->add(new admin_setting_configselect(
            'local_celeneaccessibility/chooselanguage',
            get_string('chooselanguage', 'local_celeneaccessibility'),
            get_string('chooselanguagedescription', 'local_celeneaccessibility'),
            get_string('defaultlanguage', 'local_celeneaccessibility'),
            $languages
        ));

        $settings->add(new admin_setting_confightmleditor('local_celeneaccessibility/adminMessage', get_string('adminmessage', 'local_celeneaccessibility'), '', ''));
    }
}
