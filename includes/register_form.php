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