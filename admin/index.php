<?php include('../includes/db.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gweru Council</title>
</head>

<body id="home" data-spy="scroll" data-target="#main-nav">
    <nav class="navbar navbar-expand-md navbar-light fixed-top py-4" id="main-nav">
        <div class="container">
            <a href="#home" class="navbar-brand">
                <img src="../img/mlogo.png" width="50" height="50" alt="">
                <h3 class="d-inline align-middle"> Gweru City Council</h3>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Adminstration - Logout</a>
                    </li>
                   
                  
                </ul>
            </div>
        </div>
    </nav>
 

        <!-- ABOUT / WHY SECTION -->
        <section id="about" class="py-5 text-center bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="info-header mb-5">
                        <h6 class="text-primary pb-3">
                            Proof of Work
                        </h6>

                        <?php

    if(isset($_POST['upload'])){

        $ppin = $_POST['pin'];
        
        // header("Location: view.php?view=".$id );

        if ($ppin === "12345") {
           header("Location: home.php");
        }else{
            echo "<p class='alert alert-danger'>Invalid PINCODE</p>";
        }

    }

?>

                     
                     <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="pin" class="form-control" placeholder="Enter PIN">
                        </div>

                        <input type="submit" value="Signin" name="upload" class="btn btn-secondary btn-block btn-lg">
                    </form>
                  

                    </div>
                </div>
            </div>
        </div>
    </section>














       <!-- FOOTER -->
   <footer id="main-footer" class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12 ml-auto">
                    <p class="lead">
                    Gweru City Council Online Complaint Registration And Management System Copyright &copy;
                        <span id="year"></span>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->

    <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear());

        // Init Scrollspy
        $('body').scrollspy({
            target: '#main-nav'
        });

        // Smooth Scrolling
        $("#main-nav a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();

                const hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    window.location.hash = hash;
                });
            }
        });
    </script>
</body>

</html>




