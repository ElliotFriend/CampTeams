<?php
    require_once('includes/connectvars.php');
    include('includes/header.php');
    
    if (isset($_POST['submit'])) {
        // Create a database connection
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        // Grab the form data from POST
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $college_name = $_POST['collegename'];
        $college_address = $_POST['collegeaddress'];
        $college_city = $_POST['collegecity'];
        $college_state = $_POST['collegestate'];
        $college_zip = $_POST['collegezip'];
        
        if (!empty($first_name) && !empty($last_name) && !empty($phone) &&
            !empty($email) && !empty($college_name) && !empty($college_address) &&
            !empty($college_city) && !empty($college_state) &&
            !empty($college_zip)) {
            
            // Insert the college data into the database and get the college_id back from it
            $college_query = "INSERT INTO ct_colleges (college_name,college_address,college_city,college_state,college_zip)
                              VALUES ('$college_name','$college_address','$college_city','$college_state','$college_zip')";
            $college_insert = mysqli_query($dbc, $college_query);
            $college_id = mysqli_insert_id($dbc);
            $alert = mysql_error();
            
            if (!empty($college_insert)) {
                // Insert the contact data into the database
                $contact_query = "INSERT INTO ct_college_contacts (cc_college_id,cc_first,cc_last,cc_phone,cc_email)
                                  VALUES ('$college_id','$first_name','$last_name','$phone','$email')";
                $contact_insert = mysqli_query($dbc, $contact_query);
                $alert = mysql_error();
            }
            else {
                // Give the message that neither inserts occured
                $alert = "Looks like that college already has a contact on record";
            }
        }
        else {
            $alert="There was an error, please email info@campteams.org with this information" . mysql_error();
        }
    }
    echo $alert;
?>

<p>Register as a contact for a college, so that others can request a Camp Team from you</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="firstname">Contact First Name:</label>
    <input type="text" id="firstname" name="firstname" /><br />
    <label for="lastname">Contact Last Name:</label>
    <input type="text" id="lastname" name="lastname" /><br />
    <label for="phone">Contact Phone Number:</label>
    <input type="text" id="phone" name="phone" /><br />
    <label for="email">Contact Email Address:</label>
    <input type="text" id="email" name="email" /><br />
    <label for="collegename">College Name:</label>
    <input type="text" id="collegename" name="collegename" /><br />
    <label for="collegeaddress">College Address:</label>
    <input type="text" id="collegeaddress" name="collegeaddress" /><br />
    <label for="collegecity">College City:</label>
    <input type="text" id="collegecity" name="collegecity" /><br />
    <label for="collegestate">College State (MO):</label>
    <input type="text" id="collegestate" name="collegestate" /><br />
    <label for="collegezip">College Zip Code:</label>
    <input type="text" id="collegezip" name="collegezip" /><br />
    <input type="submit" value="Register College Contact" name="submit" />
</form>


<?php
    mysqli_close($dbc);
    include('includes/footer.php');
?>
