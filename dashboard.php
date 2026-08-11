<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="logout.css">
<script type="text/javascript" src="index.js"></script>

</head>

<body>
    <div class="success-overlay">

    <div class="success-box">


        <h1> Welcome,

        <?php echo $_SESSION["username"]; ?>
        &#128523;

        </h1>

        <p>
           The dashboard is still under construction &#128524; &#128524;
        </p>

        <button class="butt">

        <a href="index.php" class="success-button">
            Logout
        </a>

</button>

    </div>

</div>

<!-- <h1>

Welcome,

<?php echo $_SESSION["fullname"]; ?>

</h1>

<a href="logout.php">Logout</a> -->

</body>

</html>