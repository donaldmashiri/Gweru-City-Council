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
 
  <!-- NEWSLETTER -->
  <section id="newsletter" class="bg-secondary text-white py-5">
        <div class="container">
        <h4 class="">
                ONLINE COMPLAINT REGISTRATION AND MANAGEMENT SYSTEM
            </h4>
            <div class="row">
                <div class="col-md-4">
                    <a href="users.php" class="btn btn-primary btn-sm btn-block">
                        <i class="fas fa-user"></i> users
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="home.php" class="btn btn-warning btn-sm btn-block">
                        <i class="fas fa-bell"></i> Complaints
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="reports.php" class="btn btn-danger btn-sm btn-block">
                        <i class="fas fa-circle"></i> Reports
                    </a>
                </div>

            </div>
        </div>
    </section>

     <!-- BOXES -->
     <section id="boxes" class="py-5">
        <div class="container">
            <div class="row">
            <h3 class="text-primary">Complaints Remainder</h3>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">ref#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 

                $id = $_GET['view'];


$sql = "SELECT * FROM complaints WHERE complaint_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $complaint_id = $row["complaint_id"];
      $user_id = $row["user_id"];
      $topic = $row["topic"];
      $message = $row["message"];
      $complaint_image = $row["complaint_image"];
      $complaint_status = $row["complaint_status"];
      $complaint_date = $row["complaint_date"];

    }
} else {
  echo "0 results";
}
  
?>
                    <tr>
                        <th scope="row">GWR00<?php echo $complaint_id ?></th>
                        <td><?php echo $topic ?></td>
                        <td><?php echo $message ?></td>
                        <td><?php
                        if($complaint_status === "not updated"){
                           echo "<p style='color:indigo'>$complaint_status </p>";
                        }else{
                            echo "<p style='color:purple'>$complaint_status </p>";
                        } ?></td>
                        <td><?php echo $complaint_date ?></td>
                       
                    </tr>
                  
                </tbody>
            </table>
            <form action="" method="post">
            <input type="submit" value="We are working on it" name="work" class="btn btn-primary btn-lg">
            </form>

            <?php

if (isset($_POST['work'])) {

    $reply = "We are working on it";   

        $query = "UPDATE complaints SET ";
        $query .= "complaint_status  = '{$reply}' ";
        $query .= "WHERE complaint_id = $id ";
    
        $update_query = mysqli_query($conn, $query);
        header("Location: view.php?view=".$id );
    
        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }
    
    }

    ?>


            </div>
        </div>
    </section>


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

        $proof_image = $_FILES['image']['name'];
        $proof_image_temp = $_FILES['image']['tmp_name'];

      $dd =  move_uploaded_file($proof_image_temp, "$proof_image");

        echo $dd;
        // echo $id;

        $query = "UPDATE complaints SET ";
        $query .= "complaint_image  = '{$proof_image}' ";
        $query .= "WHERE complaint_id = $id ";

        $update_query = mysqli_query($conn, $query);
        // header("Location: view.php?view=".$id );

        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }

    }

?>

                     
                     <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="fas fa-cloud"></i>
                                </span>
                            </div>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <input type="submit" value="Upload" name="upload" class="btn btn-secondary btn-block btn-lg">
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




