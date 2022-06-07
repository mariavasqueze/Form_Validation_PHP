<?php

/**
 * Student Name:            Maria Vasquez
 * Student ID:              300357407
 * Assignment/File Name:    Assignment2
 * Section:                 002
 * 
 * Description: 
 *      This project is a Form Validation in PHP. Makes sure all requirements are met before sumbiting form.
 * 
 * References:
 *      Please make sure you provide the appropriate url references
 *      or any comment for example if you referenced some help you
 *      received from your instructor or demo code provided in class 
 *      - In class exercise week 4    
 *      - To correct validation of some inputs: https://www.youtube.com/watch?v=xqI2hdDn47k
 **/

class ValidatePage
{

    static $valid_result = array();

    // static $valid_result = array(
    //     'name' => ''
    // );

    static $errorMessage = array();

    // This static function returns an error array. It is up to you on how to implement the 
    // error array. Make sure that you can use the array to display the error message 
    // and the validated post data
    // make sure to update the valid_result attribute everytime you validate an input.
    // all input are required

    static function validateInput()
    {
        $valid = true;
        $name = $_POST['fullName'];
        $email = $_POST['email'];
        $studentId = $_POST['studentID'];
        $international = $_POST['international'];
        $program = $_POST['program'];
        $years = $_POST['years'];
        $courses = $_POST['courses'];

        //Validate the name
        if (strlen($name < 1)) {
            array_push(self::$errorMessage, "Please enter a name");
            $valid = false;
        } else {
            array_push(self::$valid_result, $name);
            // array_push(self::$valid_result['name'], $name); or 
            // array_push(self::$valid_result, $valid_result["name"] = $name);
        }

        // Validate the email address, use filter_input    
        if (empty($email)) {
            array_push(self::$errorMessage, "Please enter an email address");
            $valid = false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push(self::$errorMessage, "Please enter a valid email address");
            $valid = false;
        } else {
            array_push(self::$valid_result, $email);
        }

        //Validate the student id, use filter_input with regexp
        if (empty($studentId)) {
            array_push(self::$errorMessage, "Please enter a student ID");
        } else if (!filter_var($studentId, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\s{0,}[0-9|]{0,}\s{0,}$/")))) {
            array_push(self::$errorMessage, "Please enter a valid student ID");
            $valid = false;
        } else {
            array_push(self::$valid_result, $studentId);
        }

        // Ensure one of the international status options is checked
        if (!isset($international)) {
            array_push(self::$errorMessage, "Please select one option");
            $valid = false;
        } else {
            array_push(self::$valid_result, $international);
        }

        // Ensure the drop down was selected
        if (!isset(($program))) {
            array_push(self::$errorMessage, "Please select one of the options from dropdown menu");
            $valid = false;
        } else {
            array_push(self::$valid_result, $program);
        }

        // Validate the number of years, use filter_input with minimum range (1) and maximum range (6)
        if (empty($years)) {
            array_push(self::$errorMessage, "Please enter a number of years");
            $valid = false;
        } else if (!filter_var($years, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 6)))) {
            array_push(self::$errorMessage, "Please enter a valid number of years (between 1 and 6)");
            $valid = false;
        } else {
            array_push(self::$valid_result, $years);
        }

        // Validate the number of courses, use filter_input to make sure it is integer
        if (empty($courses)) {
            array_push(self::$errorMessage, "Please enter a number of courses");
        } else if (!filter_var($courses, FILTER_VALIDATE_INT)) {
            array_push(self::$errorMessage, "Please enter a valid number of coures");
            $valid = false;
        } else {
            array_push(self::$valid_result, $courses);
        }

        // Error log
        if (!$valid) {
            error_log("Validation returns false");
        }

        return $valid;
    }
}
