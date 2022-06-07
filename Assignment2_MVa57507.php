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

// Make sure to call all your include files
require_once('inc/HTMLpage.class.MVa57507.php');
require_once('inc/config.inc.php');
require_once('inc/ValidatePage.class.MVa57507.php');


// if the form was posted, validate the input and to update the valid status

//Show the header
HTMLPage::displayHeader();

// If there was post data and there were errors
// display the error messages and the form
// Note that the correct entry needs to be printed in the form's inputs
//     // If there was post data and there were no errors...
//     // Display thank you message
//     // Display the data
if (isset($_POST["submit"])) {
    if (!ValidatePage::validateInput()) {
        HTMLPage::displayForm(ValidatePage::$valid_result);
        HTMLPage::displayErrorMessage(ValidatePage::$errorMessage);
    }
    else {
        //Not showing !
        HTMLPage::displayThanks();
        HTMLPage::displayData();
    }
}
// Other than that, display the form
else {
    HTMLPage::displayForm(ValidatePage::$valid_result);
}

// Show the footer
HTMLPage::displayFooter();
