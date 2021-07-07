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
                    <th scope="col">Reports By</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Status</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Proof of work</th>
                    <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php 


$sql = "SELECT * FROM complaints JOIN users ON complaints.user_id = users.user_id ORDER BY complaint_id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $complaint_id = $row["complaint_id"];
      $user_id = $row["user_id"];
      $user_namess = $row['user_names'];
      $topic = $row["topic"];
      $message = $row["message"];
      $feedback= $row["feedback"];
      $complaint_image = $row["complaint_image"];
      $complaint_status = $row["complaint_status"];
      $complaint_date = $row["complaint_date"];
  
?>
                    <tr>
                        <th scope="row">GWR00<?php echo $complaint_id ?></th>
                        <td><?php echo $user_namess ?></td>
                        <td><?php echo $topic ?></td>
                        <td><?php echo $complaint_status ?></td>
                        <td><?php echo $feedback ?></td>
                        <td><?php echo $complaint_image ?></td>
                        <td><?php echo $complaint_date ?></td>
                    </tr>
                    <?php }
                            } else {
                              echo "<p class='py-5 mt-5 alert alert-info'>No Compaints</p>";
                            }
                    ?>
                </tbody>
            </table>
              
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




