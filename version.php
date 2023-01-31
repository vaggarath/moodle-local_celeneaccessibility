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

defined('MOODLE_INTERNAL') || die();

$plugin->version = '2022101103';
$plugin->requires = 2020110900;
//$plugin->supported = [310];
$plugin->component = 'local_celeneaccessibility';
$plugin->maturity = MATURITY_ALPHA;
$plugin->release = '0.1';
