<?php
session_start();
include("connection.php");




      ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/my-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="js/cards.js" defer></script>
</head>

<body>
    <!--header area start-->
    <header>
        <div class="left_area">
            <h3>Food4<span>Thought</span></h3>
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <section>
        <div class="sidebar">
            <center>
                <img src="img/FPvkGPgXsAogrsG.jpg" class="profile_image" alt="">
                <h4>
                <?php 
				  echo "Welcome, ". $_SESSION['name']."!";
                  ?>
				</h4>
                
            </center>
            <a href="profile.php"><i class="fas fa-sliders-h"></i><span>Profile</span></a>
            <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="request.php"><i class="fas fa-cogs"></i><span>Create Request</span></a>
            <a href="javascript:gclick()"><i class="fas fa-table"></i><span>Create Card</span></a>
            <!-- <a href="#"><i class="fas fa-th"></i><span>ABC</span></a> -->
            <a href="#"><i class="fas fa-info-circle"></i><span>Tracking</span></a>
            
        </div>
        <!--sidebar end-->
    </section>

   



    <div id="box1" class="container-1">
    
    <h2>Donation Form</h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="foodtype">Food type</label>
                                <input id="foodtype" type="foodtype" name="foodtype">

                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input id="location" type="location" name="location">
                            </div>



                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

        </div>


</body>

</html>