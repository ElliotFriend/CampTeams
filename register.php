<?php
    require_once('includes/connectvars.php');
    include('includes/header.php');

    $greeting = "<p>Register as a contact for a college, so that others can request a Camp Team from you</p><p><em>All fields are required</em></p>";

    if (isset($_POST['submit'])) {
        // Empty the alert message, to start fresh
        $alert = '';
        $phone_regexp = '/^\(?[2-9]\d{2}\)?[-\s\.]?\d{3}[-\s\.]?\d{4}$/';
        $phone_replace_regexp = '/[\(\)\-\s\.]/';
        $email_regexp = '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/';
        $state_regexp = '/^(?:A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])*$/';
        $zip_regexp = '/^([0-9]{5}(?:-[0-9]{4})?)*$/';

        // Check to make sure that all fields are filled out, assign variables if everything looks good
        if (!empty($_POST['firstname'])) {
            $first_name = $_POST['firstname'];
        } elseif (empty($alert)) {
            $alert = "Please enter your first name";
        }

        if (!empty($_POST['lastname'])) {
            $last_name = $_POST['lastname'];
        } elseif (empty($alert)) {
            $alert = "Please enter your first name";
        }

        if (preg_match($phone_regexp, $_POST['phone'])) {
            $phone = $_POST['phone'];
            $new_phone = preg_replace($phone_replace_regexp, '', $phone);
        } elseif (empty($alert)) {
            $alert = "Please enter a valid phone number";
        }

        if (preg_match($email_regexp, $_POST['email'])) {
            $domain = preg_replace($email_regexp, '', $_POST['email']);
            if (!checkdnsrr($domain)) {
                $alert = "Please enter a valid email address";
            } else {
                $email = $_POST['email'];
            }
        } elseif (empty($alert)) {
            $alert = "Please enter a valid email address";
        }

        if (!empty($_POST['collegename'])) {
            $college_name = $_POST['collegename'];
        } elseif (empty($alert)) {
            $alert = "Please enter which college you represent";
        }

        if (checkdnsrr($_POST['collegeweb'])) {
            $college_web = $_POST['collegeweb'];
        } elseif (empty($alert)) {
            $alert = "Please enter a valid college website";
        }

        if (!empty($_POST['collegeaddress'])) {
            $college_address = $_POST['collegeaddress'];
        } elseif (empty($alert)) {
            $alert = "Please enter your college address";
        }

        if (!empty($_POST['collegecity'])) {
            $college_city = $_POST['collegecity'];
        } elseif (empty($alert)) {
            $alert = "Please enter your college city";
        }

        if (preg_match($state_regexp, $_POST['collegestate'])) {
            $college_state = $_POST['collegestate'];
        } elseif (empty($alert)) {
            $alert = "Please enter your college state (as a two-letter abbreviation)";
        }

        if (preg_match($zip_regexp, $_POST['collegezip'])) {
            $college_zip = $_POST['collegezip'];
        } elseif (empty($alert)) {
            $alert = "Please enter your college zip code";
        }
        
        // If there are no alerts, go ahead and insert the college into the database
        if (empty($alert)) {
            // Create a database connection
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
            // Insert the college data into the database and get the college_id back from it
            $college_query = "INSERT INTO ct_colleges (college_name,college_web,college_address,college_city,college_state,college_zip)
                              VALUES ('$college_name','$college_web','$college_address','$college_city','$college_state','$college_zip')";
            $college_insert = mysqli_query($dbc, $college_query);
            $college_id = mysqli_insert_id($dbc);
            $alert = mysql_error();
            
            // If the college insert was successful, then the college doesn't already exist in our database
            if (!empty($college_insert)) {
                // Insert the contact data into the database
                $contact_query = "INSERT INTO ct_college_contacts (cc_college_id,cc_first,cc_last,cc_phone,cc_email)
                                  VALUES ('$college_id','$first_name','$last_name','$new_phone','$email')";
                $contact_insert = mysqli_query($dbc, $contact_query);
                $alert = mysql_error();
                if (!empty($contact_insert)) {
                    $confirmation = "Thank you for registering your college with us";
                }
            }
            else {
                // Give the message that neither inserts occured
                $alert = "<p>Looks like that college already has a contact on record" . mysql_error() . "</p>";
            }
        }
        if (!empty($alert)) {
            echo $greeting;
            echo '<p style="color:red;">' . $alert . '</p>';
            include('includes/register_form.php');
        }
    }
    else {
        echo $greeting;
        include('includes/register_form.php');
    }

    mysqli_close($dbc);
    echo '<p style="color:green;">' . $confirmation . '</p>';
    include('includes/footer.php');
?>
