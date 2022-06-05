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
                <h1>Assignment 2: Form Processing by <?= htmlentities(DEVELOPER_NAME) ?>-- <?= htmlentities(DEVELOPER_ID) ?></h1>
            </header>
            <section class="main">
            <?php
        }


        // This static function close all the HTML tags at the bottom of the document
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
                        <input type="text" name="fullName" id="fullName" placeholder="First and last name" value="<?php echo htmlspecialchars($valid_status['fullName']) ?>">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="someone@here.ca">
                    </div>
                    <div>
                        <label for="studentID">Student ID</label>
                        <input type="text" name="studentID" id="studentID" placeholder="XXXXXXX">
                    </div>
                    <div>
                        <label for="international">International Student?</label>
                        <span>
                            <input type="radio" name="international" id="internationalYes" value="yes"> Yes
                            <input type="radio" name="international" id="internationalNo" value="no"> No
                        </span>
                    </div>
                    <div>
                        <label for="program">Program</label>
                        <select name="program">
                            <option value="Select...">Please select one option</option>
                            <option value="Emerging Technology">Emerging Technology</option>
                            <option value="Data Analytic">Data Analytic</option>
                            <option value="Mobile Computing">Mobile Computing</option>
                        </select>
                    </div>
                    <div>
                        <label for="years">Number of Years at Douglas</label>
                        <input type="text" name="years" id="years" placeholder="number of years less than 7">
                    </div>
                    <div>
                        <label for="courses">Number of Courses Taken</label>
                        <input type="text" name="courses" id="courses" placeholder="number of courses taken">
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
                    <li><?php echo htmlspecialchars($valid_status['name']) ?></li>
                    <li><?php echo htmlspecialchars($valid_status['email']) ?></li>
                    <li><?php echo htmlspecialchars($valid_status['option']) ?></li>
                    <li><?php echo htmlspecialchars($valid_status['program']) ?></li>
                    <li><?php echo htmlspecialchars($valid_status['years']) ?></li>
                    <li><?php echo htmlspecialchars($valid_status['courses']) ?></li>
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
                        <td><?= htmlentities($_POST['fullName']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlentities($_POST['email']) ?></td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td><?= htmlentities($_POST['studentID']) ?></td>
                    </tr>
                    <tr>
                        <th>International Student Status</th>
                        <td><?= htmlentities($_POST['international']) ?></td>
                    </tr>
                    <tr>
                        <th>Program</th>
                        <td><?= htmlentities($_POST['program']) ?></td>
                    </tr>
                    <tr>
                        <th>Number of Years</th>
                        <td><?= htmlentities($_POST['years']) ?></td>
                    </tr>
                    <tr>
                        <th>Number of Courses</th>
                        <td><?= htmlentities($_POST['courses']) ?></td>
                    </tr>
                </table>
            </div>
        </section>

<?php
        }
    }

?>