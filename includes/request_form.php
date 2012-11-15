<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h3>Tell us a bit about yourself</h3>
    <label for="firstname">Contact First Name:</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname']; ?>">
    <h3>Tell us a bit about the dean, if it's someone other than you</h3>
    <h3>Tell us a bit about the camp</h3>
</form>