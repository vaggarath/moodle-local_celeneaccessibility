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
namespace local_celeneaccessibility;

defined('MOODLE_INTERNAL') || die();

class extraclasses{
    /**
     * more simple you die : Each time we check if user has each preference
     * and either return a value / boolean / ect. Couldn't be more straightforward
     */
    protected $classes = array();

    /**
     * getExtraClasses
     *
     * @return array
     */
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
            $letterspacing = "celenels".$pref;
            $mode .= ' '.$letterspacing;
        }

        $letter = get_user_preferences('theme_celene4boost_letter') && get_user_preferences('theme_celene4boost_letter') ? "celenels".get_user_preferences('theme_celene4boost_letter') : '';
        if($letter){
            $eclasses[] =$letter;
        }

        $word = get_user_preferences('theme_celene4boost_word') && get_user_preferences('theme_celene4boost_word') ? "celenews".get_user_preferences('theme_celene4boost_word') : '';
        if($word){
            $eclasses[] =$word;
        }

        $line = get_user_preferences('theme_celene4boost_line') && get_user_preferences('theme_celene4boost_line') ? "celenelinesp".get_user_preferences('theme_celene4boost_line') : '';
        if($line){
            $eclasses[] =$line;
        }

        $dys = get_user_preferences('theme_celene4boost_dys') ? "celenedys" : '';
        if($dys){
            $eclasses[] =$dys;
        }

        $parkinson = get_user_preferences('theme_celene4boost_parkinson') ? "celeneparkinson" : '';
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
                    $eclasses[] ="celenemajuscule";
                    break;
                case "2" :
                    $eclasses[] ="celeneminuscule";
                    break;
                case "3" :
                    $eclasses[] ="celenecapitale";
                    break;
                default: $eclasses[] = "";
            }
        }

        $fontsize = get_user_preferences('theme_celene4boost_fontsize') && get_user_preferences('theme_celene4boost_fontsize') ? "celenefsa".get_user_preferences('theme_celene4boost_fontsize') : '';
        if($fontsize){
            $eclasses[] =$fontsize;
        }


        $font = get_user_preferences('theme_celene4boost_font') ? get_user_preferences('theme_celene4boost_font') : '';
        if($font){
            $eclasses[] =$font;
        }

        $guiding = get_user_preferences('theme_celene4boost_guiding') ? true : false;
        if($guiding){
            $eclasses[] = "celeneguiding";
        }

        $lowsat = get_user_preferences('theme_celene4boost_lowsat') ? "celenelowsat".get_user_preferences('theme_celene4boost_lowsat') : '';
        if($lowsat){
            $eclasses[] =$lowsat;
        }

        $intensity = get_user_preferences('theme_celene4boost_blue') ? "celeneblue-filter-strong" : '';
        if($intensity){
            $eclasses[] = $intensity;
        }

        $lastPlay = isset($eclasses) && !empty($eclasses) ? $eclasses : [];

        return $lastPlay;
    }

    /**
     * darkMode
     *
     * @return bool
     */
    public static function darkMode() : bool {
        $mode = get_user_preferences('theme_celene4boost_mode');
        if ($mode == 'dark') {
            return true;
        }else{
            return false;
        }
    }

    /**
     * helper
     *
     * @return bool
     */
    public static function helper() : bool {
        return get_user_preferences('theme_celene4boost_guiding') ? true : false;
    }

    /**
     * getLanguage
     *
     * @return string
     */
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