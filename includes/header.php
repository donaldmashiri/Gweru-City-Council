<?php include('includes/db.php'); ?>


<?php
$query = "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'";
$select_customer = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_customer)) {
    $user_id = $row['user_id'];
    $user_names = $row['user_names'];

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Gweru Council</title>
</head>

<body id="home" data-spy="scroll" data-target="#main-nav">
    <nav class="navbar navbar-expand-md navbar-light fixed-top py-4" id="main-nav">
        <div class="container">
            <a href="#home" class="navbar-brand">
                <img src="img/mlogo.png" width="50" height="50" alt="">
                <h3 class="d-inline align-middle"> Gweru City Council</h3>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin" target="_blank" class="nav-link">Adminstration</a>
                    </li>
                   
                    <li class="nav-item">
                        <?php
                        if(isset($_SESSION['user_id'])){
                        echo "<a href='index.php' class='nav-link'><strong>$user_names</strong> </a>";
                        }else{
                         echo "<a href='create_account.php' class='nav-link'>SignUP or Login </a>";
                        }
                ?>
                    </li>

                    <li class="nav-item">
                        <?php
                        if(isset($_SESSION['user_id'])){
                        echo "<a href='create_account.php?destroy' class='nav-link text-info'>Logout</a>";
                        }

                        if(isset($_GET['destroy'])){
                            unset($_SESSION['user_id']);
                            header("Location: create_account.php");}

                ?>
                    </li>

                   

                    <!-- <li class="nav-item">
                        <a href="create_account.php" class="nav-link">Logout</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
