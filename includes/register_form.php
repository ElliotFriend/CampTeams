<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="firstname">Contact First Name:</label>
    <input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname']; ?>" /><br />
    <label for="lastname">Contact Last Name:</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo $_POST['lastname']; ?>" /><br />
    <label for="phone">Contact Phone Number:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $_POST['phone']; ?>" /><br />
    <label for="email">Contact Email Address:</label>
    <input type="text" id="email" name="email" value="<?php echo $_POST['email']; ?>" /><br />
    <label for="collegename">College Name:</label>
    <input type="text" id="collegename" name="collegename" value="<?php echo $_POST['collegename']; ?>" /><br />
    <label for="collegeweb">College Website: http://www.</label>
    <input type="text" id="collegeweb" name="collegeweb" value="<?php echo $_POST['collegeweb']; ?>" /><br />
    <label for="collegeaddress">College Address:</label>
    <input type="text" id="collegeaddress" name="collegeaddress" value="<?php echo $_POST['collegeaddress']; ?>" /><br />
    <label for="collegecity">College City:</label>
    <input type="text" id="collegecity" name="collegecity" value="<?php echo $_POST['collegecity']; ?>" /><br />
    <label for="collegestate">College State (MO):</label>
    <input type="text" id="collegestate" name="collegestate" value="<?php echo $_POST['collegestate']; ?>" /><br />
    <label for="collegezip">College Zip Code:</label>
    <input type="text" id="collegezip" name="collegezip" value="<?php echo $_POST['collegezip']; ?>" /><br />
    <input type="submit" value="Register College Contact" name="submit" />
</form>