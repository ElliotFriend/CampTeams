<!DOCTYPE html>
<head>
    <title>Camp Teams - Saving Time for Camp Deans</title>
    <link rel="stylesheet" href="includes/style.css" />

    <script language="JavaScript">
        function showhidefield()
        {
            if (document.frm.whoisdean.checked)
            {
            document.getElementById("deansection").style.visibility = "visible";
            }
            else
            {
            document.getElementById("deansection").style.visibility = "hidden";
            }
        }
    </script>
</head>

<body>
    <!-- set up a Navigation Menu -->
    <ul id="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="register.php">Register a College</a></li>
        <li><a href="request.php">Request a Team</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
