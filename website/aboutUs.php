<!DOCTYPE html>
<html>

<head>
	<!-- Apply website universal header -->
	<?php
    require_once "./php/header.php";
    ?>
    <title>About us</title>
    
    <!-- Page specific stylesheet -->
	<link rel="stylesheet" type="text/css" href="" />

<body>

   
    <!--Nav bar-->
  <?php
  require "./php/nav_outer.php"
    ?>

    <!--Company Intro-->
    <div class="company-intro container">
        <div class="left-box">
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
        <div class="right-box">
            <img src="./img/Accounting-index.jpg" alt="accounting" />
        </div>
    </div>

    <!--Services-->
    <div class="service title-with-3-columns">
        <div class="up-box">
            <h2>Why Expense Tracker Pro</h2>
        </div>
        <div class="down-box">
            <div>
                <div class="pic">
                    <img src="./img/control-costs.png" alt="Control costs">

                </div>
                <div class="topic">
                    <h3>Control Costs</h3>
                </div>
                <div class="content">
                    <p>By tracking your expenses daily, you can control costs, and see what you're spending your money
                        on and
                        how much you're spending. </p>

                </div>
            </div>
            <div>
                <div class="pic">
                    <img src="./img/bad-spending-habits.png" alt="Bad spending habits">
                </div>
                <div class="topic">
                    <h3>Find bad spending habits</h3>
                </div>
                <div class="content">
                    <p>
                        The benefits of tracking your expenses include finding and eliminating bad spending habits,
                        preventing
                        overspending.
                    </p>

                </div>
            </div>
            <div>
                <div class="pic">
                    <img src="./img/success financial management.png" alt="Success financial management">
                </div>
                <div class="topic h3">
                    <h3>Success financial management</h3>
                </div>
                <div class="content">
                    <p>Expenses tracking is essential in successful financial management. By knowing where your money
                        goes, you
                        can effectively sort out your financial situation and make decisions.</p>
                </div>
            </div>
        </div>
    </div>

    <!--Testimonials-->
    <div class="testimonials title-with-3-columns">
        <div class="up-box">
            <h2>Testimonials</h2>
        </div>
        <div class="down-box">
            <div>
                <div class="pic">
                    <img src="./img/profile1.jpg" alt="Profile picture">

                </div>
                <div class="topic">
                    <h3>Birdie Reid, Client</h3>
                </div>
                <div class="content">
                    <p>"I just learned about Expense Tracker Pro this morning and now they have a new customer."</p>
                </div>
            </div>
            <div>
                <div class="pic">
                    <img src="./img/profile2.jpg" alt="Profile picture">
                </div>
                <div class="topic">
                    <h3>Olivia-Rose Lucas, Client</h3>
                </div>
                <div class="content">
                    <p>"I will be using this service and recommend to others. Y'all are literally the best thing I have
                        found
                        for tracking my expenses."</p>
                </div>
            </div>
            <div>
                <div class="pic">
                    <img src="./img/profile3.jpg" alt="Success financial management">
                </div>
                <div class="topic h3">
                    <h3>Naima Frank, Client
                    </h3>
                </div>
                <div class="content">
                    <p>"Works like a charm. I love the ease of using their services."</p>
                </div>
            </div>
        </div>
    </div>
     <!-- footer -->
  <?php
  require "./php/footer_outer.php"
    ?>
   
</body>

</html>