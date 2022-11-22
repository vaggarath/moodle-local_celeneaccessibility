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
 * A drawer based layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2021 Bas Brands
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');

// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
user_preference_allow_ajax_update('drawer-open-index', PARAM_BOOL);
user_preference_allow_ajax_update('drawer-open-block', PARAM_BOOL);
user_preference_allow_ajax_update('theme_yourthemename_mode', PARAM_ALPHA);

$bgnavbar = 'bg-white';

if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
    $mode = get_user_preferences('theme_yourthemename_mode');

    if ($mode == 'dark') {
        $bgnavbar = 'bg-dark';
    }
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
    $mode = '';
}

//letter spacing
$letterspacing = null;
if(get_user_preferences('theme_yourthemename_letter')){
    $pref = get_user_preferences('theme_yourthemename_letter');
    $letterspacing = "ls".$pref;
    $mode .= ' '.$letterspacing;
}

if (defined('BEHAT_SITE_RUNNING')) {
    $blockdraweropen = true;
}

$extraclasses = ['uses-drawers'];
if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

if ($mode == 'dark') {
    $extraclasses[] = 'dark';
}

$letter = get_user_preferences('theme_yourthemename_letter') && get_user_preferences('theme_yourthemename_letter') ? "ls".get_user_preferences('theme_yourthemename_letter') : '';
if($letter){
    $extraclasses[] =$letter;
}

$word = get_user_preferences('theme_yourthemename_word') && get_user_preferences('theme_yourthemename_word') ? "ws".get_user_preferences('theme_yourthemename_word') : '';
if($word){
    $extraclasses[] =$word;
}

$line = get_user_preferences('theme_yourthemename_line') && get_user_preferences('theme_yourthemename_line') ? "linesp".get_user_preferences('theme_yourthemename_line') : '';
if($line){
    $extraclasses[] =$line;
}

$rate = get_user_preferences('theme_yourthemename_rate') && get_user_preferences('theme_yourthemename_rate') ? "rate".get_user_preferences('theme_yourthemename_rate') : '';
if($rate){
    $extraclasses[] =$rate;
}

$pitch = get_user_preferences('theme_yourthemename_pitch') && get_user_preferences('theme_yourthemename_pitch') ? "pitch".get_user_preferences('theme_yourthemename_pitch') : '';
if($pitch){
    $extraclasses[] =$pitch;
}

$font = get_user_preferences('theme_yourthemename_fontsize') && get_user_preferences('theme_yourthemename_fontsize') ? "fsa".get_user_preferences('theme_yourthemename_fontsize') : '';
if($font){
    $extraclasses[] =$font;
}

$dys = get_user_preferences('theme_yourthemename_dys') ? "dys" : '';
if($dys){
    $extraclasses[] =$dys;
}

$guiding = get_user_preferences('theme_yourthemename_guiding') ? true : false;
if($guiding){
    $extraclasses[] = "guiding";
}

$lowsat = get_user_preferences('theme_yourthemename_lowsat') ? "lowsat".get_user_preferences('theme_yourthemename_lowsat') : '';
if($lowsat){
    $extraclasses[] =$lowsat;
}

$font = get_user_preferences('theme_yourthemename_font') ? get_user_preferences('theme_yourthemename_font') : '';
if($font){
    $extraclasses[] =$font;
}

$parkinson = get_user_preferences('theme_yourthemename_parkinson') ? "parkinson" : '';
if($parkinson){
    $extraclasses[] =$parkinson;
}

$texttransform = get_user_preferences('theme_yourthemename_texttransform');
if($texttransform){
    switch($texttransform){
        case "0" :
            $extraclasses[] ="";
            break;
        case "1" :
            $extraclasses[] ="majuscule";
            break;
        case "2" :
            $extraclasses[] ="minuscule";
            break;
        case "3" :
            $extraclasses[] ="capitale";
            break;
        default: $extraclasses[] = "";
    }

}

$tts = get_user_preferences('theme_yourthemename_tts') ? "tts" : '';
if($tts){
    $extraclasses[] =$tts;
}



$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if (!$hasblocks) {
    $blockdraweropen = false;
}
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
    'theme_mode' => $mode,
    'bgnavbar' => $bgnavbar,
    'guiding' => $guiding,
];

echo $OUTPUT->render_from_template('yourtheme/drawers', $templatecontext);
