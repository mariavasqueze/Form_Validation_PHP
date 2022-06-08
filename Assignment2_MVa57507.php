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
 *     In class exercise week 4     
 **/

    // Include all files
    require_once('inc/HTMLpage.class.MVa57507.php');
    require_once('inc/config.inc.php');
    require_once('inc/ValidatePage.class.MVa57507.php');


    //Show the header
    HTMLPage::displayHeader();

    // if the form was posted, validate the input and to update the valid status
    // If no errors display thank you message and data
    if (isset($_POST["submit"])) {
        ValidatePage::validateInput();
        if (!ValidatePage::$errorMessage) {
            HTMLPage::displayThanks();
            HTMLPage::displayData();
            // if errors, display form and error message 
        } else {
            HTMLPage::displayForm(ValidatePage::$valid_result);
            HTMLPage::displayErrorMessage(ValidatePage::$errorMessage);
        }
    }
    // Other than that, display the form
    else {
        HTMLPage::displayForm(ValidatePage::$valid_result);
    }

    // Show the footer
    HTMLPage::displayFooter();
?>