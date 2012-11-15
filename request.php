<?php
    require_once('includes/connectvars.php');
    include('includes/header.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<p>Request a Camp Team from any of the colleges below</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="contactfirst">Contact First Name:</label>
    <input type="text" id="contactfirst" name="contactfirst" /><br />
    <label for="contactlast">Contact Last Name:</label>
    <input type="text" id="contactlast" name="contactlast" /><br />
    <label for="contactfirst">Contact First Name:</label>
    <input type="text" id="contactfirst" name="contactlast" /><br />
</form>



<?php
    include('includes/footer.php');
?>
