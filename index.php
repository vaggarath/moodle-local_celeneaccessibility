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
/**
 * get_user_preferences($nom, $defaultValue, $userId)
 */

//check if settings exist or not. If not then tts & guiging shouldn't exists
$displayTTS = get_config('local_celeneaccessibility', 'showtts'); //settings pour montrer/cacher l'option TTS
$displayGuiding = get_config('local_celeneaccessibility', 'showguiding');

$customdata = array('options' => array(
    'dark' => get_user_preferences('theme_celene4boost_mode', null, $USER->id),
    'tts' => get_user_preferences('theme_celene4boost_tts', null, $USER->id),
    'guiding' => get_user_preferences('theme_celene4boost_guiding', null, $USER->id),
    'parkinson' => get_user_preferences('theme_celene4boost_parkinson', null, $USER->id),
    'letter' => get_user_preferences('theme_celene4boost_letter', null, $USER->id),
    'word' => get_user_preferences('theme_celene4boost_word', null, $USER->id),
    'line' => get_user_preferences('theme_celene4boost_line', null, $USER->id),
    'fontsize' => get_user_preferences('theme_celene4boost_fontsize', null, $USER->id),
    'lowsat' => get_user_preferences('theme_celene4boost_lowsat', null, $USER->id),
    'texttransform' => get_user_preferences('theme_celene4boost_texttransform', null, $USER->id),
    'fontchoice' => get_user_preferences('theme_celene4boost_font', null, $USER->id),
));

$messageform = new local_celeneaccessibility_options_form(null, $customdata);

if ($messageform->is_cancelled()){

    unset_user_preference('theme_celene4boost_mode', $USER->id);
    if($displayGuiding){
        unset_user_preference('theme_celene4boost_guiding', $USER->id);
    }
    unset_user_preference('theme_celene4boost_parkinson', $USER->id);
    unset_user_preference('theme_celene4boost_letter', $USER->id);
    unset_user_preference('theme_celene4boost_word', $USER->id);
    unset_user_preference('theme_celene4boost_line', $USER->id);
    if($displayTTS){
       unset_user_preference('theme_celene4boost_tts', $USER->id);
    }
    unset_user_preference('theme_celene4boost_fontsize', $USER->id);
    unset_user_preference('theme_celene4boost_lowsat', $USER->id);
    unset_user_preference('theme_celene4boost_texttransform', $USER->id);
    unset_user_preference('theme_celene4boost_font', $USER->id);

    redirect(new moodle_url('/local/celeneaccessibility/index.php'));

}elseif ($data = $messageform->get_data()) {
    $dark = required_param('dark', PARAM_TEXT);

    $tts = $displayTTS ? required_param('tts', PARAM_TEXT) : null;
    $ls = required_param('letterspacing', PARAM_TEXT);
    $ws = required_param('wordspacing', PARAM_TEXT);
    $linesp = required_param('linespacing', PARAM_TEXT);
    $guiding = $displayGuiding ? required_param('guiding', PARAM_TEXT) : null;
    $parkinson = required_param('parkinson', PARAM_TEXT);
    $fontsize = required_param('fontsizing', PARAM_TEXT);
    $lowsat = required_param('lowsaturizing', PARAM_TEXT);
    $textTransform = required_param('texttransform', PARAM_INT);
    $fontchoice = required_param('fontchoice', PARAM_TEXT);

    if (isset($dark) && !empty($dark)) {
        set_user_preference('theme_celene4boost_mode', 'dark', $USER->id);
    }else{
        unset_user_preference('theme_celene4boost_mode', $USER->id);
    }

    if (isset($tts) && !empty($tts) && $displayTTS) {
        set_user_preference('theme_celene4boost_tts', 'tts', $USER->id);
    }else{
        unset_user_preference('theme_celene4boost_tts', $USER->id);
    }

    // if (isset($dys) && !empty($dys)) {
    //     set_user_preference('theme_celene4boost_dys', 'dys', $USER->id);
    // }else{
    //     set_user_preference('theme_celene4boost_dys', '', $USER->id);
    // }

    if (isset($guiding) && !empty($guiding) && $displayGuiding) {
        set_user_preference('theme_celene4boost_guiding', 'guiding', $USER->id);
    }else{
        unset_user_preference('theme_celene4boost_guiding', $USER->id);
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

    if(isset($fontchoice) && !empty($fontchoice)){
        if($fontchoice !== "normal"){
          set_user_preference('theme_celene4boost_font', $fontchoice, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_font', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_font', $USER->id);
    }

    if(isset($fontsize) && !empty($fontsize)){
        if($fontsize >= 1){
          set_user_preference('theme_celene4boost_fontsize', $fontsize, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_fontsize', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_fontsize', $USER->id);
    }

    if(isset($lowsat) && !empty($lowsat)){
        if($lowsat >= 1){
          set_user_preference('theme_celene4boost_lowsat', $lowsat, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_lowsat', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_lowsat', $USER->id);
    }

    if(isset($textTransform) && !empty($textTransform)){
        if($textTransform !== "normal"){
          set_user_preference('theme_celene4boost_texttransform', $textTransform, $USER->id);
        }else{
            unset_user_preference('theme_celene4boost_texttransform', $USER->id);
        }
    }else{
        unset_user_preference('theme_celene4boost_texttransform', $USER->id);
    }

    redirect(new moodle_url('/local/celeneaccessibility/index.php'));
}

echo $OUTPUT->header();

if(isloggedin() && !isguestuser()){
    $messageform->display();
}

echo $OUTPUT->footer();