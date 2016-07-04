<?php
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

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_probasket', get_string('pluginname', 'local_probasket'));
    $ADMIN->add('localplugins', $settings);

    $name = 'local_probasket/otr1_email_subject';
    $default = get_string('default_otr1_email_subject', 'local_probasket');
    $title = get_string('otr1_email_subject', 'local_probasket');
    $description = get_string('otr1_email_subject_desc', 'local_probasket');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    $name = 'local_probasket/otr1_email_message';
    $default = get_string('default_otr1_email_message', 'local_probasket');
    $title = get_string('otr1_email_message', 'local_probasket');
    $description = get_string('otr1_email_message_desc', 'local_probasket');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);
}