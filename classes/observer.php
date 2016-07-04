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


$pluginname = 'probasket';
require_once($CFG->dirroot.'/user/profile/lib.php');
require_once($CFG->dirroot.'/local/'.$pluginname.'/locallib.php');

defined('MOODLE_INTERNAL') || die();
define('COURSE_OTR1_ID', '5');
define('COURSE_OTR1_TEST_ID', '6');

class local_probasket_observer {
    public static function local_course_completed(\core\event\course_completed $event) {
        global $DB;
        mtrace('running plugin');
        if ($event->courseid==COURSE_OTR1_ID || $event->courseid == COURSE_OTR1_TEST_ID) {
            mtrace('enter here');
            $user = $DB->get_record('user', array('id' => $event->relateduserid));
            profile_load_data($user);
            mtrace('mail es ' . $user->profile_field_ClubCode);
            $team_email = $user->profile_field_ClubCode;
            if (filter_var($team_email,FILTER_VALIDATE_EMAIL)) {
                if (debugging()) {
                    mtrace('Sending OTR1 completion mail to user ' . $user->id);
                }
                $toUser = local_probasket_generate_email_user($team_email);
                $fromUser = $user;
                $eventdata = $event->get_record_snapshot('course_completions', $event->objectid);
                $completeddate = userdate($eventdata->timecompleted, get_string('strftimedatetimeshort', 'langconfig'));
                mtrace('enter3');
                $coursegrades = grade_get_course_grades(COURSE_OTR1_ID, $user->id);
                $grade = number_format($coursegrades->grades[$user->id]->grade, 0) .'%';
                $config = get_config('local_probasket');                
                $variables = array(
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'date' => $completeddate,
                    'grade' => $grade
                );
                $subjectOTR1 = local_probasket_replace_values($variables,$config->otr1_email_subject);                
                $messageOTR1 = local_probasket_replace_values($variables,$config->otr1_email_message);
                mtrace('enter4');
                $emailsent = email_to_user($toUser, $fromUser, $subjectOTR1, html_to_text($messageOTR1), $messageOTR1, ", ", true);
                if (debugging()) {
                    if ($emailsent) {
                        mtrace('Email send correctly');
                    } else {
                        mtrace('Email failed');
                    }
                }
            }
        }
    }
}
