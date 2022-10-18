<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class local_celeneaccessibility_options_form extends moodleform{
    private $darkidarko = null;
        //define form
    public function definition(){
        $checkDark = $this->darkidarko ? 0 : get_user_preferences('theme_celene4boost_mode') === "dark" ? 1 : 0; //test for reset, doesn't work
        $checkDys = get_user_preferences('theme_celene4boost_dys') ? 1 : 0;
        $checkParkinson = get_user_preferences('theme_celene4boost_parkinson') && get_user_preferences('theme_celene4boost_parkinson') === "parkinson" ? 1 : 0;
        $checkLetterSpacing = null;

        if(get_user_preferences('theme_celene4boost_letter') && get_user_preferences('theme_celene4boost_letter') === "1"){
            $checkLetterSpacing = "1";
        }elseif(get_user_preferences('theme_celene4boost_letter') && get_user_preferences('theme_celene4boost_letter') === "2"){
            $checkLetterSpacing = "2";
        }

        $checkWordSpacing = null;
        if(get_user_preferences('theme_celene4boost_word') && get_user_preferences('theme_celene4boost_word') === "1"){
            $checkWordSpacing = "1";
        }elseif(get_user_preferences('theme_celene4boost_word') && get_user_preferences('theme_celene4boost_word') === "2"){
            $checkWordSpacing = "2";
        }

        $checkLineHeight = null;
        if(get_user_preferences('theme_celene4boost_line') && get_user_preferences('theme_celene4boost_line') === "1"){
            $checkLineHeight = "1";
        }elseif(get_user_preferences('theme_celene4boost_line') && get_user_preferences('theme_celene4boost_line') === "2"){
            $checkLineHeight = "2";
        }

        $mform = $this->_form; //underscore à ne pas oublier !!
        // Checkbox for darkmode option

        $mform->addElement('advcheckbox', 'dark', get_string('defaultdark', 'local_celeneaccessibility'), '');
        $mform->setType('dark', PARAM_BOOL);
        $mform->setDefault('dark', $checkDark);


        //police dys

        $mform->addElement('advcheckbox', 'dys', get_string('defaultdys', 'local_celeneaccessibility'), '');
        $mform->setDefault('dys', $checkDys);
        $mform->setType('dys', PARAM_BOOL);

        //gestes imprécis

        $mform->addElement('advcheckbox', 'parkinson', get_string('defaultparkinson', 'local_celeneaccessibility'), '');
        $mform->addHelpButton('parkinson', 'letterspacing', 'local_celeneaccessibility');
        $mform->setDefault('parkinson', $checkParkinson);
        $mform->setType('parkinson', PARAM_BOOL);

        // letter spacing option
        $letterSpacing = array(
            '0'=>"normal",
            '1'=>"large",
            '2'=>"larger",
        );

        // select for letter spacing
        $selectLetter = $mform->addElement('select', 'letterspacing', get_string('letter-spacing', 'local_celeneaccessibility'), $letterSpacing);
        $mform->addHelpButton('letterspacing', 'letterspacing', 'local_celeneaccessibility');
        $selectLetter->setSelected($checkLetterSpacing);

        //word spacing now
        $wordSpacing = array(
            'normal',
            'large',
            'larger'
        );
        $selectWord = $mform->addElement('select', 'wordspacing', get_string('word-spacing', 'local_celeneaccessibility'), $wordSpacing);
        $mform->addHelpButton('wordspacing', 'letterspacing', 'local_celeneaccessibility');
        $selectWord->setSelected($checkWordSpacing);

        //line spacing (height)
        $lineSpacing = array(
            'normal',
            'large',
            'larger'
        );
        $selectLine = $mform->addElement('select', 'linespacing', get_string('line-spacing', 'local_celeneaccessibility'), $lineSpacing);
        $mform->addHelpButton('linespacing', 'letterspacing', 'local_celeneaccessibility');
        $selectLine->setSelected($checkLineHeight);

        $submitlabel = get_string('submit', 'local_celeneaccessibility');
        $mform->addElement('submit', 'submitmessage', $submitlabel);

        $resetlabel = get_string('reset', 'local_celeneaccessibility');

        $mform->addElement('cancel', 'cancelbutton', $resetlabel);
        $mform->addHelpButton('cancelbutton', 'letterspacing', 'local_celeneaccessibility');

        $mform->addElement('html', '<br />  <div class="card text-center w-50 mx-auto"><span class="h3">Zone de test</span>Ceci est un texte d\'exemple <br /> sur plusieurs lignes <br /> vous permettant de mieux voir la différence une fois que vous aurez <br /> validez votre choix </div>');
        // utilisation du form->html
    }

    public function reset() {
        $this->darkidarko = true;
        $checkDys = 0;
        $checkParkinson = 0;
        $checkLetterSpacing = null;

        $this->_form->updateSubmission(null, null);
    }
}