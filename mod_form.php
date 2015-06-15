<?php
/*
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
 *
 * Filename : mod_form
 * Author   : John Welch <jwelch@welchitconsulting.co.uk>
 * Created  : 05 Jun 2015
 */

require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_googledrive_mod_form extends moodleform_mod
{
    function definition()
    {
        $mform =& $this->_form;

        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name', 'googledrive'), array('size' => 64));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        $this->add_intro_editor(true, get_string('gdintro', 'googledrive'));
        $mform->addHelpButton('intro', get_string('intro', 'googledrive'));

        $mform->addElement('header', 'googledrive', get_string('googledrive', 'googledrive'));

        $mform->addElement('text', 'clientid', get_string('clientid', 'googledrive'), array('size' => 64));
        $mform->setType('clientid', PARAM_TEXT);
        $mform->addRule('clientid', null, 'required', null, 'client');
        $mform->addRule('clientid', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        $mform->addElement('text', 'clientsecret', get_string('clientsecret', 'googledrive'), array('size' => 64));
        $mform->setType('clientsecret', PARAM_TEXT);
        $mform->addRule('clientsecret', null, 'required', null, 'client');
        $mform->addRule('clientsecret', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        $mform->addElement('text', 'clientid', get_string('username', 'googledrive'), array('size' => 64));
        $mform->setType('username', PARAM_TEXT);
        $mform->addRule('username', null, 'required', null, 'client');
        $mform->addRule('username', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

        $mform->addElement('text', 'userpwd', get_string('userpwd', 'googledrive'), array('size' => 64));
        $mform->setType('userpwd', PARAM_TEXT);
        $mform->addRule('userpwd', null, 'required', null, 'client');
        $mform->addRule('userpwd', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');

//        $mform->addElement('header', '', get_string('', 'googledrive'));








        $this->standard_coursemodule_elements();
        $this->add_action_buttons();
    }
}
