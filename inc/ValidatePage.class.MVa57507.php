<?php

/**
 * Student Name:            Maria Vasquez
 * Student ID:              300357507
 * Assignment/File Name:    Assignment2
 * Section:                 002
 * 
 * Description: 
 *      This project is a Form Validation in PHP. Makes sure all requirements are met before sumbiting form.
 * 
 * References:
 *      In class exercise week 4 
 *      Demo class week 4   
 *      To correct validation of some inputs: https://www.youtube.com/watch?v=xqI2hdDn47k
 **/

class ValidatePage
{
    static $valid_result = array();

    static $errorMessage = array();

    // This static function returns an error array.
    static function validateInput()
    {
        $name = $_POST['fullName'];
        $email = $_POST['email'];
        $studentId = $_POST['studentID'];
        $international = $_POST['international'];
        $program = $_POST['program'];
        $years = $_POST['years'];
        $courses = $_POST['courses'];

        //Validate the name
        if (strlen($name < 1)) {
            array_push(self::$errorMessage, "Please enter a valid name");
        } else {
            self::$valid_result['name'] = $name;
        }

        // Validate the email address   
        if (empty($email)) {
            array_push(self::$errorMessage, "Please enter an email address");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push(self::$errorMessage, "Please enter a valid email address");
        } else {
            self::$valid_result['email'] = $email;
        }

        //Validate the student id
        if (empty($studentId)) {
            array_push(self::$errorMessage, "Please enter a student ID");
        } else if (!filter_var($studentId, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" =>  "/^\d{3}[\s]?\d{4}$/")))) {
            array_push(self::$errorMessage, "Please enter a valid 7 digits student ID");
        } else {
            self::$valid_result['studentId'] = $studentId;
        }

        // Ensure one of the international status options is checked
        if (!isset($international)) {
            array_push(self::$errorMessage, "Please choose the international status");
        } else {
            self::$valid_result['international'] = $international;
        }

        // Ensure the drop down was selected
        if (!isset(($program))) {
            array_push(self::$errorMessage, "Please select one of the computing sciences programs!");
        } else {
            self::$valid_result['program'] = $program;
        }

        // Validate the number of years
        if (empty($years)) {
            array_push(self::$errorMessage, "Please enter a number of years");
        } else if (!filter_var($years, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 6)))) {
            array_push(self::$errorMessage, "The number of years should be between 1 until 6");
        } else {
            self::$valid_result['years'] = $years;
        }

        // Validate the number of courses
        if (empty($courses)) {
            array_push(self::$errorMessage, "Please enter a number of courses");
        } else if (!filter_var($courses, FILTER_VALIDATE_INT)) {
            array_push(self::$errorMessage, "The number of courses should be integer");
        } else {
            self::$valid_result['courses'] = $courses;
        }

        // Error log
        if (self::$errorMessage) {
            error_log("Validation returns false");
        }
    }
}
?>