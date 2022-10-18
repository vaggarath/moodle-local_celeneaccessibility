<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class local_celeneaccessibility_options_form extends moodleform{
    // using constructor parameters for testing purpose
    protected $_customdata;
        //define form
    public function definition(){
        $checkDark = $this->_customdata['options']['dark'] === "dark" ? 1 : 0;
        $checkDys = $this->_customdata['options']['dys'] === "dys" ? 1 : 0;
        $checkParkinson = $this->_customdata['options']['parkinson'] === "parkinson" ? 1 : 0;
        $letter = $this->_customdata['options']['letter'];
        $word = $this->_customdata['options']['word'];
        $line = $this->_customdata['options']['line'];

        $mform = $this->_form; //underscore à ne pas oublier !!

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
        $selectLetter->setSelected($letter);

        //word spacing now
        $wordSpacing = array(
            'normal',
            'large',
            'larger'
        );
        $selectWord = $mform->addElement('select', 'wordspacing', get_string('word-spacing', 'local_celeneaccessibility'), $wordSpacing);
        $mform->addHelpButton('wordspacing', 'letterspacing', 'local_celeneaccessibility');
        $selectWord->setSelected($word);

        //line spacing (height)
        $lineSpacing = array(
            'normal',
            'large',
            'larger'
        );
        $selectLine = $mform->addElement('select', 'linespacing', get_string('line-spacing', 'local_celeneaccessibility'), $lineSpacing);
        $mform->addHelpButton('linespacing', 'letterspacing', 'local_celeneaccessibility');
        $selectLine->setSelected($line);

        $submitlabel = get_string('submit', 'local_celeneaccessibility');
        $mform->addElement('submit', 'submitmessage', $submitlabel);

        $resetlabel = get_string('reset', 'local_celeneaccessibility');
        $mform->addElement('cancel', 'cancelbutton', $resetlabel);
        // $mform->addHelpButton('cancelbutton', 'letterspacing', 'local_celeneaccessibility'); //helpbutton seems unavailable for cancel button

        $mform->addElement('html', '<br />  <div class="card text-center w-50 mx-auto"><span class="h3">Zone de test</span>Ceci est un texte d\'exemple <br /> sur plusieurs lignes <br /> vous permettant de mieux voir la différence une fois que vous aurez <br /> validez votre choix </div>');
    }
}