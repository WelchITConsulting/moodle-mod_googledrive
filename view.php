<?php
/**
 * Copyright (C) 2015 Welch IT Consulting
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once('../../config.php');
//require_once($CFG->libdir . '/)

$id = optional_param('id', null, PARAM_INT);
$a  = optional_param('a', null, PARAM_INT);

if ($id) {
  if (!$cm = get_coursemodule_from_id('googledrive', $id)) {
    print_error('invalidcoursemodule');
  }
  if (!$course = $DB->get_record('course', array('id' => $cm->course))) {
    print_error('coursemisconf');
  }
  if (!$googledrive = $DB->get_record('googledrive', array('id' => $cm->instance))) {
    print_error('invalidcoursemodule');
  }
} else {
  if (!$googledrive = $DB->get_record('googledrive', array('id' => $a))) {
    print_error('invalidcoursemodule');
  }
  if (!$course = $DB->get_record('course', array('id' => $googledrive->course))) {
    print_error('coursemisconf');
  }
  if (!$cm = get_coursemodule_from_instance('googledrive', $googledrive->id, $course->id)) {
    print_error('invalidcoursemodule');
  }
}

require_course_login($course, true, $cm);
$context = context_module::instance($cm->id);

$url = new moodle_url($CFG->wwwroot . '/mod/googledrive/view.php');
if (isset($id)) {
  $url->param('id', $id);
} else {
  $url->param('a', $a);
}

$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_title(format_string($googledrive->name));
$PAGE->set_heading(format_string($course->name));
echo $OUTPUT->header()
   . $OUTPUT->heading(format_text($googledrive->name))
   . ($googledrive->intro ? $OUTPUT->box(format_module_intro('googledrive', $googledrive, $cm->id), 'generalbox', 'intro')
                         : '')
   . $OUTPUT->box_start('generalbox boxaligncenter boxwidthwide');




echo $OUTPUT->box_end()
   . $OUTPUT->footer();
