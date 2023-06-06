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
 * This page is for site's administrator to get visual stats
 *
 * @package   local_celeneaccessibility
 * @copyright 2022 Chambon Julien - UT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

require_once("../../config.php");
global $USER, $CFG, $PAGE, $OUTPUT, $DB;

require_login();
$context = context_system::instance();

$PAGE->set_context($context);

$PAGE->set_url('/local/celeneaccessibility/statistics.php');

$PAGE->set_pagelayout('standard');
$PAGE->set_title($SITE->fullname);

$PAGE->set_heading(get_string('statsname', 'local_celeneaccessibility'));

$nbusers = $DB->get_record_sql('SELECT COUNT(*) as result FROM {user} WHERE suspended = 0;');

$sql = "SELECT up.id, up.userid, up.name
FROM {user_preferences} up
LEFT JOIN {user} u ON up.userid = u.id
WHERE up.name LIKE '%celene4boost%'
AND u.suspended = 0";

$result = $DB->get_records_sql($sql);

$data = json_encode($result);

$templatecontext = [
    "isadmin" => is_siteadmin(),
    "nbactiveusers" => $nbusers->result,
    "data" => $data,
    "nbusr" => get_string('nbusrs', 'local_celeneaccessibility', $nbusers->result),
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template("local_celeneaccessibility/statistics", $templatecontext);
echo $OUTPUT->footer();
