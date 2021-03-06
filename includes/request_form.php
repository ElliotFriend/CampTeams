<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <h3>Tell us a bit about the camp</h3>
    <label for="campdate">Dates of Camp *</label>
    <input type="text" id="campdate" name="campdate" value="<?php echo $_POST['campdate']; ?>"><br />
    <label for="campstart">Camp Start Day and Time *</label>
    <input type="text" id="campstart" name="campstart" value="<?php echo $_POST['campstart']; ?>"><br />
    <label for="campend">Camp End Day and Time *</label>
    <input type="text" id="campend" name="campend" value="<?php echo $_POST['campend']; ?>"><br />
    <label for="campage">Age Range of Campers *</label>
    <select>
        <option value=""></option>
        <?php 
            $data = mysqli_query($dbc, "SELECT * FROM ct_ages ORDER BY age_id ASC");
            while ($age_group = mysqli_fetch_array($data)) {
                echo "<option value=" . $age_group['age_id'] . ">" . $age_group['age_name'] . "</option>";
            }
        ?>
    </select><br />
    <label for="campnumbers">Approximate Number of Campers *</label>
    <input type="text" id="campnumbers" name="campnumbers" value="<?php echo $_POST['campnumbers']; ?>"><br />
    <h4>Select a camp that we already have, or create your own</h4>
    <!-- query and dropdown box of camps -->
    <label for="campname">Camp Name *</label>
    <input type="text" id="campname" name="campname" value="<?php echo $_POST['campname']; ?>"><br />
    <label for="campaddress">Camp Address *</label>
    <input type="text" id="campaddress" name="campaddress" value="<?php echo $_POST['campaddress']; ?>"><br />
    <label for="campcity">Camp City *</label>
    <input type="text" id="campcity" name="campcity" value="<?php echo $_POST['campcity']; ?>"><br />
    <label for="campstate">Camp State *</label>
    <input type="text" id="campstate" name="campstate" value="<?php echo $_POST['campstate']; ?>"><br />
    <label for="campzip">Camp Zip Code *</label>
    <input type="text" id="campzip" name="campzip" value="<?php echo $_POST['campzip']; ?>"><br />
    <label for="campphone">Camp Phone *</label>
    <input type="text" id="campphone" name="campphone" value="<?php echo $_POST['campphone']; ?>"><br />
    <label for="campweb">Camp Website </label>
    <input type="text" id="campweb" name="campweb" value="<?php echo $_POST['campweb']; ?>"><br />

    <h3>Tell us a bit about yourself</h3>
    <label for="contactfirstname">First Name *</label>
    <input type="text" id="contactfirstname" name="contactfirstname" value="<?php echo $_POST['contactfirstname']; ?>"><br />
    <label for="contactlastname">Last Name *</label>
    <input type="text" id="contactlastname" name="contactlastname" value="<?php echo $_POST['contactlastname']; ?>"><br />
    <label for="contactphone">Phone Number *</label>
    <input type="text" id="contactphone" name="contactphone" value="<?php echo $_POST['contactphone']; ?>"><br />
    <label for="contactemail">Email *</label>
    <input type="text" id="contactemail" name="contactemail" value="<?php echo $_POST['contactemail']; ?>"><br />
    <label for="contactfacebook">Are you on Facebook? </label>
    <input type="radio" id="contactfacebook" name="contactfacebook" checked="checked" value="yes">Yes&nbsp;
    <input type="radio" id="contactfacebook" name="contactfacebook" value="no">No<br />
    <label for="contactfacebook">What is your Facebook address? </label>
    <input type="text" id="contactfacebookaddress" name="contactfacebookaddress" value="<?php echo $_POST['contactfacebookaddress']; ?>"><br />
    <label for="whoisdean">Are you the Dean? *</label>
    <input type="radio" id="whoisdean" name="whoisdean" checked="checked" onclick="
    if (this.checked) {
        document.getElementById('deansection').style.display='none';
    }
    ">Yes
    <input type="radio" id="whoisdean" name="whoisdean" onclick="
    if (this.checked) {
        document.getElementById('deansection').style.display='block';
    }
    ">No

    <div id="deansection" style="display:none;">
        <h3>Tell us a bit about the dean</h3>
        <label for="deanfirstname">Dean First Name </label>
        <input type="text" id="deanfirstname" name="deanfirstname" value="<?php echo $_POST['deanfirstname']; ?>"><br />
        <label for="deanlastname">Dean Last Name </label>
        <input type="text" id="deanlastname" name="deanlastname" value="<?php echo $_POST['deanlastname']; ?>"><br />
        <label for="deanphone">Dean Phone Number </label>
        <input type="text" id="deanphone" name="deanphone" value="<?php echo $_POST['deanphone']; ?>"><br />
        <label for="deanemail">Dean Email </label>
        <input type="text" id="deanemail" name="deanemail" value="<?php echo $_POST['deanemail']; ?>"><br />
        <label for="deanfacebook">Is the dean on Facebook? </label>
        <input type="radio" id="deanfacebook" name="deanfacebook" checked="checked" value="yes">Yes&nbsp;
        <input type="radio" id="deanfacebook" name="deanfacebook" value="no">No<br />
        <label for="deanfacebook">What is the dean's Facebook address? </label>
        <input type="text" id="deanfacebookaddress" name="deanfacebookaddress" value="<?php echo $_POST['deanfacebookaddress']; ?>"><br />
    </div>

    <h3>Tell us which colleges you would like to contact</h3>
    <?php
        // Query for all the information of all the colleges
        $colleges = mysqli_query($dbc, "SELECT * FROM ct_colleges ORDER BY college_name ASC");
        while ($row = mysqli_fetch_array($colleges)) {
            echo '<input type="checkbox" id="collegeselection" name="collegeselection" value="' .
                $row['college_id'] . '" />' . $row['college_name'] . ' - <em>' . $row['college_city'] .
                ', ' . $row['college_state'] . '</em><br />';
        }
    ?>
    <br />

    <input type="submit" value="Request Camp Teams" name="submit" />
</form>