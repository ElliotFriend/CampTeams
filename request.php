<?php
    require_once('includes/connectvars.php');
    include('includes/header.php');
    // Make a connection to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['submit'])) {
        // set alert to empty, just in case one already exists
        $alert = '';

    }

    $greeting = "<p>Request a Camp Team from any of the colleges below</p><p>* Required</p>";

    echo $greeting;
    include('includes/request_form.html');
    include('includes/footer.php');
?>
