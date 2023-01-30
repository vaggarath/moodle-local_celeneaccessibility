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

/**
 * Inside your child theme (or in your boost theme if you're so crude to touche core code) you need to add these to your template context
 */

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'bodyattributes' => $OUTPUT->body_attributes(\theme_YOUR_THEME_NAME\extraclasses::getExtraClasses()),
    'theme_mode' => \theme_YOUR_THEME_NAME\extraclasses::darkMode() ? 'dark' : null,
    'bgnavbar' => \theme_YOUR_THEME_NAME\extraclasses::darkMode() ? 'bg-dark' : null,
    'guiding' => \theme_YOUR_THEME_NAME\extraclasses::helper(),
];

echo $OUTPUT->render_from_template('theme_YOUR_THEME_NAME/drawers', $templatecontext);
