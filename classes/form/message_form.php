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
 * Plugin version and other meta-data are defined here.
 *
 * @package     block_greetings
 * @copyright   2024 Nithin kumar <nithin54@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_greetings\form;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class message_form extends \moodleform {
    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('textarea', 'message', get_string('yourmessage', 'block_greetings')); // Add elements to your form.
        $mform->setType('message', PARAM_TEXT); // Set type of element.

        // If editing the form, load data from db.
        if (isset($this->_customdata['message'])) {
            $message = $this->_customdata['message'];

            $mform->addElement('hidden', 'id', $message->id);
            $mform->setType('id', PARAM_INT); // Set type of element.

            $mform->setDefault('message', $message->message);
        }

        $submitlabel = get_string('submit');
        $mform->addElement('submit', 'submitmessage', $submitlabel);
    }
}
