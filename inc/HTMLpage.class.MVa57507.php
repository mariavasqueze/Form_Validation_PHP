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
 *     How to keep buttons checked: Taken from https://stackoverflow.com/questions/50098744/keep-radio-checked-after-submit    
 *      
 **/

class HTMLPage
{
    static private $title = "FORM VALIDATION";

    // This static function set the HTML header including the title and display the student name and ID
    static function displayHeader()
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="author" content="">
            <title></title>
            <link href="css/styles.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <h1>Assignment 2: Form Processing by <?= DEVELOPER_NAME ?> -- <?= DEVELOPER_ID ?></h1>
            </header>
            <section class="main">
            <?php
    }


    // This static function closes all the HTML tags at the bottom of the document
    static function displayFooter()
    {
            ?>
        </body>

        </html>
    <?php
    }

    // This static function display the form. It gets the information of the valid input 
    // that can be part of the $errors array variable returned by the validateForm() static function
    // Note: The correct post data will be displayed within the HTML input object
    static function displayForm($valid_status)
    {
    ?>
        <div class="form">
            <form action="" method="post">
                <fieldset id="form">
                    <legend>Douglas Student Info Page</legend>
                    <div>
                        <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" id="fullName" placeholder="First and last name" value="<?= htmlspecialchars($valid_status['name']) ?>">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="someone@here.ca" value="<?= htmlspecialchars($valid_status['email']) ?>">
                    </div>
                    <div>
                        <label for="studentID">Student ID</label>
                        <input type="text" name="studentID" id="studentID" placeholder="XXXXXXX" value="<?= htmlspecialchars($valid_status['studentId']) ?>">
                    </div>
                    <div>
                        <label for="international">International Student?</label>
                        <span>
                            <input type="radio" name="international" id="internationalYes" value="yes" <?php if (isset($valid_status['international']) && $valid_status['international'] == "yes") {
                                                                                                            echo "checked";
                                                                                                        } ?>> Yes
                            <input type="radio" name="international" id="internationalNo" value="no" <?php if (isset($valid_status['international']) && $valid_status['international'] == "no") {
                                                                                                            echo "checked";
                                                                                                        } ?>> No
                        </span>
                    </div>
                    <div>
                        <label for="program">Program</label>
                        <select name="program">
                            <option disabled selected value>Please select one option</option>
                            <option value="Emerging Technology" <?php if (isset($valid_status['program'])) {
                                                                    if ($valid_status['program'] == "Emerging Technology") {
                                                                        echo 'selected';
                                                                    }
                                                                } ?>>Emerging Technology</option>
                            <option value="Data Analytics" <?php if (isset($valid_status['program'])) {
                                                                if ($valid_status['program'] == "Data Analytics") {
                                                                    echo 'selected';
                                                                }
                                                            } ?>>Data Analytic</option>
                            <option value="Mobile Computing" <?php if (isset($valid_status['program'])) {
                                                                    if ($valid_status['program'] == "Mobile Computing") {
                                                                        echo 'selected';
                                                                    }
                                                                } ?>>Mobile Computing</option>
                        </select>
                    </div>
                    <div>
                        <label for="years">Number of Years at Douglas</label>
                        <input type="text" name="years" id="years" placeholder="number of years less than 7" value="<?= htmlspecialchars($valid_status['years']) ?>">
                    </div>
                    <div>
                        <label for=" courses">Number of Courses Taken</label>
                        <input type="text" name="courses" id="courses" placeholder="number of courses taken" value="<?= htmlspecialchars($valid_status['courses']) ?>">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit Information">
                        <input type="reset" name="reset" value="Clear Data">
                    </div>
                </fieldset>
            </form>
        </div>
        </section>
    <?php
    }

    // This static function read the $errors variable returned by the validateForm() static function
    // and display the error messages
    static function displayErrorMessage($valid_status)
    {
    ?>
        <section class="sidebar">
            <div class="highlight">
                <p>Please fix the following errors:</p>
                <ul>
                    <?php
                    foreach ($valid_status as $status) {
                        echo "<li>$status</li>" . "\n";
                    }
                    ?>
                </ul>
            </div>
        <?php
    }

    // This static function display the thank you message
    static function displayThanks()
    {
        ?>
            <div class="highlight">
                <h3>Thank your for your input.<br></h3>
            </div>
        <?php
    }

    // This static function display the submitted data
    static function displayData()
    {
        ?>
            <div class="data">
                <b>Entered data is:</b>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?= $_POST['fullName'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $_POST['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td><?= $_POST['studentID'] ?></td>
                    </tr>
                    <tr>
                        <th>International Student Status</th>
                        <td><?= $_POST['international'] ?></td>
                    </tr>
                    <tr>
                        <th>Program</th>
                        <td><?= $_POST['program'] ?></td>
                    </tr>
                    <tr>
                        <th>Number of Years</th>
                        <td><?= $_POST['years'] ?></td>
                    </tr>
                    <tr>
                        <th>Number of Courses</th>
                        <td><?= $_POST['courses'] ?></td>
                    </tr>
                </table>
            </div>
        </section>

<?php 
    }
}

?>