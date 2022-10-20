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
        $checktts = $this->_customdata['options']['tts'] === "tts" ? 1 : 0;
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

        $mform->addElement('advcheckbox', 'tts', get_string('defaulttts', 'local_celeneaccessibility'), '');
        $mform->addHelpButton('tts', 'helptts', 'local_celeneaccessibility');
        $mform->setDefault('tts', $checktts);
        $mform->setType('tts', PARAM_BOOL);

        $mform->addElement('html', '<div class="card bg-secondary w-50 mx-auto p-2 d-flex flex-row">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle mr-2" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
        <em>L\'option de lecture par voix de synthèse est activée sur le clic droit de la souris, sur le texte désiré</em></div><br />');

        // letter spacing option
        $letterSpacing = array(
            '0'=>"normal",
            '1'=>"large",
            '2'=>"plus large",
        );

        // select for letter spacing
        $selectLetter = $mform->addElement('select', 'letterspacing', get_string('letter-spacing', 'local_celeneaccessibility'), $letterSpacing);
        $mform->addHelpButton('letterspacing', 'letterspacing', 'local_celeneaccessibility');
        $selectLetter->setSelected($letter);

        //word spacing now
        $wordSpacing = array(
            'normal',
            'large',
            'plus large'
        );
        $selectWord = $mform->addElement('select', 'wordspacing', get_string('word-spacing', 'local_celeneaccessibility'), $wordSpacing);
        $mform->addHelpButton('wordspacing', 'letterspacing', 'local_celeneaccessibility');
        $selectWord->setSelected($word);

        //line spacing (height)
        $lineSpacing = array(
            'normal',
            'large',
            'plus large'
        );
        $selectLine = $mform->addElement('select', 'linespacing', get_string('line-spacing', 'local_celeneaccessibility'), $lineSpacing);
        $mform->addHelpButton('linespacing', 'letterspacing', 'local_celeneaccessibility');
        $selectLine->setSelected($line);

        $mform->addElement('html', '<div class="d-flex justify-content-center">');
        $submitlabel = get_string('submit', 'local_celeneaccessibility');
        $mform->addElement('submit', 'submitmessage', $submitlabel);

        if(
            $checkDark ||
            $checkDys ||
            $checkParkinson ||
            $letter ||
            $word ||
            $line ||
            $checktts
        ){
            $resetlabel = get_string('reset', 'local_celeneaccessibility');
            $mform->addElement('cancel', 'cancelbutton', $resetlabel);
        }

        $mform->addElement('html', '</div>');

        $mform->addElement('html', '<br />  <div class="card text-center w-50 mx-auto"><span class="h3">Zone de test</span>Ceci est un texte d\'exemple <br /> sur plusieures lignes <br /> vous permettant de mieux voir la différence une fois que vous aurez <br /> validé votre choix </div>');
    }
}