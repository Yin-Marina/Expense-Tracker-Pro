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

<nav class="navbar navbar-expand-md bg-info">
    <div class="container">

        <a class="navbar-brand" href="#">
            <span class="h2 text-light">Welcome back, <?= $firstName, " ", $lastName ?></span>
        </a>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#n_bar"
            aria-controls="navbarNavAltMarkup" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-info px-5 py-5
          justify-content-end" id="n_bar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-light " href="./welcome.php">Dashboard</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light " href="./profile.php">Profile</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light " href="./report.php">View Report</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light " href="./insert.php">New Spending</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light " href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>