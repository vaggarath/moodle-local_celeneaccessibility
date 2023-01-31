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

namespace theme_celene4boost;

defined('MOODLE_INTERNAL') || die();

class extraclasses{
    protected $classes = array();

    public static function getExtraClasses() : array {

        /**
         * the follow values are all the options developped. You're free to remove the unwanted ones. You're even free to add more
         */

        $mode = get_user_preferences('theme_celene4boost_mode');
        if ($mode == 'dark') {
            $eclasses[] = 'bg-dark';
        }

        //letter spacing
        $letterspacing = null;
        if(get_user_preferences('theme_celene4boost_letter')){
            $pref = get_user_preferences('theme_celene4boost_letter');
            $letterspacing = "ls".$pref;
            $mode .= ' '.$letterspacing;
        }

        $letter = get_user_preferences('theme_celene4boost_letter') && get_user_preferences('theme_celene4boost_letter') ? "ls".get_user_preferences('theme_celene4boost_letter') : '';
        if($letter){
            $eclasses[] =$letter;
        }

        $word = get_user_preferences('theme_celene4boost_word') && get_user_preferences('theme_celene4boost_word') ? "ws".get_user_preferences('theme_celene4boost_word') : '';
        if($word){
            $eclasses[] =$word;
        }

        $line = get_user_preferences('theme_celene4boost_line') && get_user_preferences('theme_celene4boost_line') ? "linesp".get_user_preferences('theme_celene4boost_line') : '';
        if($line){
            $eclasses[] =$line;
        }

        $dys = get_user_preferences('theme_celene4boost_dys') ? "dys" : '';
        if($dys){
            $eclasses[] =$dys;
        }

        $parkinson = get_user_preferences('theme_celene4boost_parkinson') ? "parkinson" : '';
        if($parkinson){
            $eclasses[] =$parkinson;
        }

        $tts = get_user_preferences('theme_celene4boost_tts') ? "tts" : '';
        if($tts){
            $eclasses[] =$tts;
        }

        $texttransform = get_user_preferences('theme_celene4boost_texttransform');
        if($texttransform){
            switch($texttransform){
                case "0" :
                    $eclasses[] ="";
                    break;
                case "1" :
                    $eclasses[] ="majuscule";
                    break;
                case "2" :
                    $eclasses[] ="minuscule";
                    break;
                case "3" :
                    $eclasses[] ="capitale";
                    break;
                default: $eclasses[] = "";
            }
        }

        $font = get_user_preferences('theme_celene4boost_font') ? get_user_preferences('theme_celene4boost_font') : '';
        if($font){
            $eclasses[] =$font;
        }

        $guiding = get_user_preferences('theme_celene4boost_guiding') ? true : false;
        if($guiding){
            $eclasses[] = "guiding";
        }

        $lowsat = get_user_preferences('theme_celene4boost_lowsat') ? "lowsat".get_user_preferences('theme_celene4boost_lowsat') : '';
        if($lowsat){
            $eclasses[] =$lowsat;
        }

        $intensity = get_user_preferences('theme_celene4boost_blue') ? "blue-filter-strong" : '';
        if($intensity){
            $eclasses[] = $intensity;
        }

        $lastPlay = isset($eclasses) && !empty($eclasses) ? $eclasses : [];

        return $lastPlay;
    }

    public static function darkMode() : bool {
        $mode = get_user_preferences('theme_celene4boost_mode');
        if ($mode == 'dark') {
            return true;
        }else{
            return false;
        }
    }

    public static function helper() : bool {
        return get_user_preferences('theme_celene4boost_guiding') ? true : false;
    }

    public static function getLanguage() : string{
        if(get_user_preferences('theme_celene4boost_language')){
            return strtolower(get_user_preferences('theme_celene4boost_language'));
        }elseif(get_config('local_celeneaccessibility', 'showguiding')){
            return strtolower(get_config('local_celeneaccessibility', 'chooselanguage'));
        }else{
            return "french";
        }
    }
}