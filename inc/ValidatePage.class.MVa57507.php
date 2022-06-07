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
 **/

class ValidatePage
{

    static $valid_result = array();

    static $errorMessage = array();

    // This static function returns an error array. It is up to you on how to implement the 
    // error array. Make sure that you can use the array to display the error message 
    // and the validated post data
    // make sure to update the valid_result attribute everytime you validate an input.
    // all input are required

    static function validateInput()
    {
        $valid = true;

        //Validate the name
        if (strlen($_POST['fullName'] < 1)) {
            array_push(self::$errorMessage, "Please enter a name");
            $valid = false;
        } else {
            array_push(self::$valid_result['name'], 'fullName');
        }

        // Validate the email address, use filter_input    
        $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$filteredEmail) {
            array_push(self::$errorMessage, "Please enter a valid email address");
            $valid = false;
        } else {
            array_push(self::$valid_result['email'], 'email');
        }

        // //Validate the student id, use filter_input with regexp
        // $filteredId = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_REGEXP);
        // if (!$filteredId) {
        //     array_push(self::$errorMessage, "Please enter a valid student ID");
        //     $valid = false;
        // } else {
        //     array_push(self::$valid_result['studentId'], 'studentId');
        // }

        // //Ensure one of the international status options is checked
        if (empty($_POST['international'])) {
            array_push(self::$errorMessage, "Please select one option");
            $valid = false;
        } else {
            array_push(self::$valid_result['international'], 'international');
        }

        // //Ensure the drop down was selected
        if (isset($_POST['program'])) {
            array_push(self::$errorMessage, "Please select one of the options from dropdown menu");
            $valid = false;
        } else {
            array_push(self::$valid_result['program'], 'program');
        }

        // //Validate the number of years, use filter_input with minimum range (1) and maximum range (6)
        $validYears = array('years' => array("min_range" => 1, "max_range" => 6));
        $filteredYears = filter_input(INPUT_POST, 'term', FILTER_VALIDATE_INT, $validYears);
        if (!$filteredYears) {
            array_push(self::$errorMessage, "Please enter a valid number of years (between 1 and 6)");
            $valid = false;
        } else {
            array_push(self::$valid_result['years'], 'years');
        }

        // //Validate the number of courses, use filter_input to make sure it is integer
        $filteredCourses = filter_input(INPUT_POST, 'courses', FILTER_VALIDATE_INT);
        if (!$filteredCourses) {
            array_push(self::$errorMessage, "Please enter a valid number of coures");
            $valid = false;
        } else {
            array_push(self::$valid_result['courses'], 'courses');
        }

        if (!$valid) {
            error_log("Validation returns false");
        }

        return $valid;
    }
}
