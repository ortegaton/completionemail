<?php
// This file is part of the Local welcome plugin
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
 * @package    local
 * @subpackage probasket
 * @copyright 2016 Marcelo Ortega <marcetega@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Local probasket';
$string['otr1_email_message'] = 'Email message for OTR1 completion';
$string['otr1_email_message_desc'] = 'Message sent to team when course OTR1 is completed';
$string['otr1_email_subject'] = 'Email subject for OTR1 completion';
$string['otr1_email_subject_desc'] = 'Subject for email sent to team when course OTR1 is completed';
$string['default_otr1_email_subject'] = 'OTR1 - [[firstname]] [[lastname]] hat den Test erfolgreich bestanden'; 
$string['default_otr1_email_message'] = 
'Liebe Vereinsverantwortliche<br>
<br>
Ihr Mitglie [[firstname]] [[lastname]], hat den OTR1 Test am [[date]] erfolgreich bestanden.<br>
Test grade: [[grade]]
<br>
Freundliche Grüsse,<br>
Administrator ProBasket Lernplattform';