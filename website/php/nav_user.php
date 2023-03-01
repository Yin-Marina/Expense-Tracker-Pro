<?php


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}


require "./php/connection.php";

// Query the Database for user information that need to be displayed in the navbar.
$stmt0 = $con->prepare('SELECT firstName, lastName, password, email FROM users WHERE id = ?');
$stmt0->bind_param('i', $_SESSION['id']);
$stmt0->execute();
$stmt0->bind_result($firstName, $lastName, $password, $email);
$stmt0->fetch();
$stmt0->close();

?>



<nav class="navbar navbar-expand-lg navbarScroll navbar-dark nav-pills nav-fill">
    <div class="container">
        <a class="navbar-brand" href="#"><span class="h2 text-light">Welcome back, <strong>
                    <?= $firstName, " ", $lastName ?>
                </strong></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./welcome.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./report.php">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./insert.php">New spending</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>

        </div>
    </div>

</nav>