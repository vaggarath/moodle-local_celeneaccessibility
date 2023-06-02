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
 * (This is a one-line short description of the file).
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    local_inwitools
 * @copyright  2021 bcourtin@univ-tours.fr
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['menuitem'] = 'Options d\'accessibilité';
$string['pluginname'] = 'celeneaccessibility';
$string['tool_title'] = 'Vos options d\'accessibilité';
$string['title'] = 'Titre';
$string['preview'] = 'Prévisualisation';
$string['show'] = 'Voir';
$string['darkmode'] = 'Thème sombre';
$string['submit'] = 'Valider';
$string['defaultdark'] = 'Thème sombre';
$string['letter-spacing'] = 'Espacement entre les lettres';
$string['fontsizing'] = 'Agrandir le texte';
$string['lowsaturizing'] = 'Rendu des images';
$string['defaultguiding'] = 'Aide à la lecture';
$string['line-spacing'] = 'Interligne';
$string['normal'] = 'normal';
$string['larger'] = 'plus large';
$string['large'] = 'large';
$string['letterspacing_help'] = 'Cet élément peut avoir une incidence sur l\'affichage du site. <br> N\'a pas d\'incidence sur les fichiers externes tels que les PDF';
$string['letterspacing'] = '';
$string['defaultdys'] = 'Police d\'écriture OpenDys';
$string['defaultparkinson'] = 'Assistance à la sélection et au clic (agrandissement des éléments)';
$string['menuname'] = 'Accessibilité';
$string['reset'] = 'Réinitialiser';
$string['word-spacing'] = 'Espacement entre les mots';
$string['font'] = 'Polices d \'écriture';
$string['defaulttts'] = 'Option text to speech (voix de synthèse)';
$string['helptts_help'] = 'Cette option est encore en béta. Le résultat peut grandement varier selon votre système d\'exploitation';
$string['helptts_help'] .= "<br />";
$string['helptts_help'] .= "Cette option utilise votre système d'exploitation pour restituter le texte par voix de synthèse";
$string['helptts_help'] .= "<br />Cette option ne fait donc transiter aucune donnée";
$string['helptts'] = 'Cette option est encore en béta. Le résultat peut grandement varier selon votre système d\'exploitation';
$string['helptts'] .= "<br />";
$string['helptts'] .= "Cette option utilise votre système d'exploitation pour restituter le texte par voix de synthèse";
$string['helptts'] .= "<br />Cette option ne fait donc transiter aucune donnée";
$string['guidingwarning'] = "Cette option est encore en béta. Le résultat peut grandement varier selon votre matériel" . " \r\n ";
$string['guidingwarning'] .= " \r\n ";
$string['guidingwarning'] .= "Attention : Cette option vous empêchera d'utiliser le bouton ECHAP de votre clavier car il servira à activer / désactiver l'aide à la lecture.";
$string['guidingwarning'] .= "Une fois activée, cette option changera drastiquement le comportement attendu de votre page. À utiliser si besoin seulement.";
$string['guidingwarning'] .= "Une fois l'option activée, vous pourrez la désactiver temporairement sur votre page avec ECHAP et désactiver l'option en la décochant du formulaire de cette page.";
$string['guidingwarning_help'] = $string['guidingwarning'];
$string['casse'] = "Casse du texte";
$string['showtts'] = "Option TTS";
$string['showttsdesc'] = "Activer l'option TTS";
$string['showguiding'] = "Activer l'option de guide lecture";
$string['showguidingdesc'] = "Permet à l'utilisateur de voir l'option du guide de lecture";
$string['adminmessage'] = "Message d'information à l'attention des utilisateurs";
$string['countempty'] = "Nombre d'options vides en base";
$string['cleandb'] = "Nettoyage DB";
$string['bluelight'] = "Filtre pour diminuer l'effet de lumière bleue";
// settings choose language for tts
$string['chooselanguage'] = "Choisissez une langue de lecture";
$string['defaultlanguage'] = "La langue par défaut est le français";
$string['chooselanguagedescription'] = "Changer la langue de lecture en mode TTS";
$string['frenchlanguage'] = "Français";
$string['englishlanguage'] = "Anglais";
// completion marker
$string['ttsinformation'] = 'L\'option de lecture par voix de synthèse est activée sur le clic droit de la souris, sur le texte désiré';
$string['languagechooser'] = "Choisissez la voix de la langue";
$string['darkBtnOpt'] = "Bouton d'accès rapide à l'option dark mode dans la barre de navigation";
// privacy settings
$string['privacy:metadata:theme_celene4boost_darkbtn'] = 'Activation de l\'option "dark mode" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_parkinson'] = 'Activation de l\'option "elements enhancements" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_letter'] = 'Activation de l\'option "letter spacing" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_word'] = 'Activation de l\'option "word spacing" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_line'] = 'Activation de l\'option "line spacing" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_font'] = 'Activation de l\'option "font spacing" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_blue'] = 'Activation de l\'option "blue light reducer" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_fontsize'] = 'Activation de l\'option "font size" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_lowsat'] = 'Activation de l\'option "images color saturation/desaturation" par l\'utilisateur';
$string['privacy:metadata:theme_celene4boost_texttransform'] = 'Activation de l\'option "text transformation" par l\'utilisateur';
