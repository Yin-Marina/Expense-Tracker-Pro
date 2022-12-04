<!DOCTYPE html>
<html>

<head>
    <!-- Apply website universal header -->
    <?php
    require_once "./php/header.php";
    ?>
    <title>About us</title>

    <!-- Page specific stylesheet -->
    <link rel="stylesheet" type="text/css" href="./css/about_us.css" />

<body>


    <!--Nav bar-->
    <?php
    require "./php/nav_outer.php"
        ?>

    <!--Company Intro-->
    <div class="company-intro containe d-flex flex-row">
        <div class="left-box p-2 align-self-center">
            <div class="company-intro-title h1">
                <div>About our</div>
                <div>company</div>
            </div>
            <div class="company-intro-content">
                A team comprised of board certified accountants, <strong>Expense Tracker Pro</strong>
                helps you keep track of your daily spending in the most accessible and
                convenient way.
            </div>
        </div>
        <img class="right-box p-2" src="./img/Accounting-index.jpg" alt="accounting" />
    </div>

    <!--Services-->
    <div class="service container text-center">
        <div class="row ">
            <h2 class="col gy-5">Why Expense Tracker Pro</h2>
        </div>
        <div class="row justify-content-around">
            <img class="col" src="./img/control-costs.png" alt="Control costs">
            <img class="col" src="./img/bad-spending-habits.png" alt="Bad spending habits">
            <img class="col" src="./img/success financial management.png" alt="Success financial management">
        </div>
        <div class="row gx-5 justify-content-around">
            <h3 class="col gy-5 ">Control Costs</h3>
            <h3 class="col gy-5">Find bad spending habits</h3>
            <h3 class="col gy-5">Success financial management</h3>
        </div>
        <div class="row gx-5 justify-content-around">
            <p class="col gy-5">By tracking your expenses daily, you can control costs, and see what you're spending
                your
                money
                on and
                how much you're spending. </p>
            <p class="col gy-5">
                The benefits of tracking your expenses include finding and eliminating bad spending habits,
                preventing
                overspending.
            <p class="col gy-5">
                Expenses tracking is essential in successful financial management. By knowing where your
                money goes, you
                can effectively sort out your financial situation and make decisions.</p>
            </p>
        </div>


    </div>

    <!--Testimonials-->
    <div class="testimonials container text-center gx-5 gy-5">
        <div class="row">
            <h2 class="col">Testimonials</h2>
        </div>
        <div class="row justify-content-around">

            <img class="col " src="./img/profile1.jpg" alt="Profile picture">
            <img class="col " src="./img/profile2.jpg" alt="Profile picture">
            <img class="col " src="./img/profile3.jpg" alt="Profile picture">
        </div>
        <div class="row  justify-content-around">
            <h3 class="col ">Birdie Reid, Client</h3>
            <h3 class="col ">Olivia-Rose Lucas, Client</h3>
            <h3 class="col ">Naima Frank, Client</h3>
        </div>
        <div class="row  justify-content-around">
            <p class="col ">"I just learned about Expense Tracker Pro this morning and now they have a new customer."
            </p>
            <p class="col ">"I will be using this service and recommend to others. Y'all are literally the best thing I
                have
                found for tracking my expenses."</p>
            <p class="col ">"Works like a charm. I love the ease of using their services."</p>
        </div>
    </div>
    <!-- footer -->
    <?php
    require "./php/footer_outer.php"
        ?>

</body>

</html>