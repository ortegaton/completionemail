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

defined('MOODLE_INTERNAL') || die;

/**
 * Generate a user info object based on provided parameters.
 * @param $string $email plain text email address.
 * @param $string $name plain text real name (optional).
 * @return object user info.
 */
function local_probasket_generate_email_user($email, $name='') {
    $emailuser = new stdClass();
    $emailuser->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailuser->email = '';
    }
    $name = format_text($name, FORMAT_HTML, array('trusted' => false, 'noclean' => false));
    $emailuser->firstname = trim(filter_var($name, FILTER_SANITIZE_STRING));
    $emailuser->lastname = '';
    $emailuser->maildisplay = true;
    $emailuser->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML emails.
    $emailuser->id = -99;
    $emailuser->firstnamephonetic = '';
    $emailuser->lastnamephonetic = '';
    $emailuser->middlename = '';
    $emailuser->alternatename = '';
    return $emailuser;
}

/*
 * Replaces variable's values on message
 * @param array($string) $values nameVariable=>valueVariable
 * @param $string $message message on which variables are going to be replaced
 * @return object user info.
 */
function local_probasket_replace_values($values, $message) {
    foreach ($values as $name=>$value) {
        $message =  str_replace('[['.$name.']]', $value, $message);
    }
    return $message;
}