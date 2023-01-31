<?php

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
        if(get_config('local_celeneaccessibility', 'showguiding')){
            return get_config('local_celeneaccessibility', 'chooselanguage');
        }else{
            return "french";
        }
    }
}