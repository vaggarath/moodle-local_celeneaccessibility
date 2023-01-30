<?php

namespace theme_YOUR_THEME_NAME;

defined('MOODLE_INTERNAL') || die();

class extraclasses{
    protected $classes = array();

    public static function getExtraClasses() : array {
        global $CFG;
        /**
         * the follow values are all the options developped. You're free to remove the unwanted ones. You're even free to add more
         */
        $mode = get_user_preferences('theme_YOUR_THEME_NAME_mode');
        if ($mode == 'dark') {
            $eclasses[] = 'bg-dark';
        }

        //letter spacing
        $letterspacing = null;
        if(get_user_preferences('theme_YOUR_THEME_NAME_letter')){
            $pref = get_user_preferences('theme_YOUR_THEME_NAME_letter');
            $letterspacing = "ls".$pref;
            $mode .= ' '.$letterspacing;
        }

        $letter = get_user_preferences('theme_YOUR_THEME_NAME_letter') && get_user_preferences('theme_YOUR_THEME_NAME_letter') ? "ls".get_user_preferences('theme_YOUR_THEME_NAME_letter') : '';
        if($letter){
            $eclasses[] =$letter;
        }

        $word = get_user_preferences('theme_YOUR_THEME_NAME_word') && get_user_preferences('theme_YOUR_THEME_NAME_word') ? "ws".get_user_preferences('theme_YOUR_THEME_NAME_word') : '';
        if($word){
            $eclasses[] =$word;
        }

        $line = get_user_preferences('theme_YOUR_THEME_NAME_line') && get_user_preferences('theme_YOUR_THEME_NAME_line') ? "linesp".get_user_preferences('theme_YOUR_THEME_NAME_line') : '';
        if($line){
            $eclasses[] =$line;
        }

        $dys = get_user_preferences('theme_YOUR_THEME_NAME_dys') ? "dys" : '';
        if($dys){
            $eclasses[] =$dys;
        }

        $parkinson = get_user_preferences('theme_YOUR_THEME_NAME_parkinson') ? "parkinson" : '';
        if($parkinson){
            $eclasses[] =$parkinson;
        }

        $tts = get_user_preferences('theme_YOUR_THEME_NAME_tts') ? "tts" : '';
        if($tts){
            $eclasses[] =$tts;
        }

        return $eclasses;
    }
}