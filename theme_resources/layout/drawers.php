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

$bgnavbar = 'bg-white';

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


$templatecontext = [
    'theme_mode' => $mode,
    'bgnavbar' => $bgnavbar,
    'guiding' => $guiding,
];

echo $OUTPUT->render_from_template('yourtheme/drawers', $templatecontext);
