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

 */

global $USER, $CFG, $PAGE, $OUTPUT;
require_once("../../config.php");
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot. '/local/celeneaccessibility/options_form.php');

require_login();
$context = context_system::instance();


$PAGE->set_context($context);

$PAGE->set_url('/local/celeneaccessibility/index.php');

$PAGE->set_pagelayout('standard');
$PAGE->set_title($SITE->fullname);

$PAGE->set_heading(get_string('menuname', 'local_celeneaccessibility'));


$messageform = new local_celeneaccessibility_options_form();

if ($messageform->is_cancelled()){

    unset_user_preference('theme_celene4boost_mode', $USER->id);
    unset_user_preference('theme_celene4boost_dys', $USER->id);
    unset_user_preference('theme_celene4boost_parkinson', $USER->id);
    unset_user_preference('theme_celene4boost_letter', $USER->id);
    unset_user_preference('theme_celene4boost_word', $USER->id);
    unset_user_preference('theme_celene4boost_line', $USER->id);

    redirect(new moodle_url('/local/celeneaccessibility/index.php'));

}elseif ($data = $messageform->get_data()) {
    $dark = required_param('dark', PARAM_TEXT);
    $ls = required_param('letterspacing', PARAM_TEXT);
    $ws = required_param('wordspacing', PARAM_TEXT);
    $linesp = required_param('linespacing', PARAM_TEXT);
    $dys = required_param('dys', PARAM_TEXT);
    $parkinson = required_param('parkinson', PARAM_TEXT);

    if (isset($dark) && !empty($dark)) {
        set_user_preference('theme_celene4boost_mode', 'dark', $USER->id);
    }else{
        unset_user_preference('theme_celene4boost_mode', $USER->id);
    }

    if (isset($dys) && !empty($dys)) {
        set_user_preference('theme_celene4boost_dys', 'dys', $USER->id);
    }else{
        unset_user_preference('theme_celene4boost_dys', $USER->id);
    }

    if (isset($parkinson) && !empty($parkinson)) {
        set_user_preference('theme_celene4boost_parkinson', 'parkinson', $USER->id);
    }else{
        unset_user_preference('theme_celene4boost_parkinson', $USER->id);
    }

    if(isset($ls) && !empty($ls)){
        if($ls >= 1){
          set_user_preference('theme_celene4boost_letter', $ls, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_letter', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_letter', $USER->id);
    }

    if(isset($ws) && !empty($ws)){
        if($ws >= 1){
          set_user_preference('theme_celene4boost_word', $ws, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_word', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_word', $USER->id);
    }

    if(isset($linesp) && !empty($linesp)){
        if($linesp >= 1){
          set_user_preference('theme_celene4boost_line', $linesp, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_line', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_line', $USER->id);
    }
}

echo $OUTPUT->header();

if(isloggedin() && !isguestuser()){
    $messageform->display();
}

echo $OUTPUT->footer();