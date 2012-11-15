<?php
    require_once('includes/connectvars.php');
    include('includes/header.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<p>Request a Camp Team from any of the colleges below</p>
<?php
    include('includes/request_form.php');
    include('includes/footer.php');
?>
