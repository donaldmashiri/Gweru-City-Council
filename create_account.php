<?php include('includes/header.php'); ?>

    <!-- NEWSLETTER -->
    <section id="newsletter" class="bg-dark text-white py-5">
        <div class="container">
            <h2 class="">
                ONLINE COMPLAINT REGISTRATION AND MANAGEMENT SYSTEM
            </h2>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h3>Create Account</h3>

                    <?php
                      if(isset($_POST['signup'])){

                      $user_names = $_POST['user_names'];
                      $user_email = $_POST['user_email'];
                      $user_phone = $_POST['user_phone'];
                      $user_password = $_POST['user_password'];
                      $user_password1 = $_POST['user_password1'];                      
                     
                        if($user_password === $user_password1){
                            $sql = "INSERT INTO users (user_names, user_email, user_phone, user_password)
                            VALUES ('{$user_names}', '{$user_email}', '{$user_phone}','{$user_password}')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='alert alert-success text-center'>Account successfully created Please login</p>";
                              } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                              } 
                        }else{
                            echo "<p class='alert alert-danger text-center'>Passoword didnt match</p>";
                        }
                    }
        ?>


                    <form action="" method="post">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                   <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text" name="user_names" class="form-control" placeholder="Name">
                        </div>

                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="text" name="user_email" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="number" name="user_phone" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="user_password" class="form-control" placeholder="Password">
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="user_password1" class="form-control" placeholder="Confirrm Password">
                        </div>

                        <input type="submit" value="Create Account" name="signup" class="btn btn-primary btn-block btn-lg">
                    </form>
                </div>

                <div class="col-lg-4 float-lg-right">
                    <h3>Login</h3>
                    <?php 
if(isset($_POST['login'])){

    $email = $_POST['email1'];
    $password = $_POST['password1'];

    $query = "select * from users where user_email = '$email' and user_password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['user_id'] = $row['user_id'];
          header("Location: index.php" );
                        //    echo   $_SESSION['user_id'];
    } else {
        echo "<a class='bg-light nav-link text-danger'>Invalid email and password</a>";
    }

}
?>
                    <div class="card card-body">
                    <form action="" method="post">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="text" name="email1" class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                            </span>
                            </div>
                            <input type="password"  name="password1"  class="form-control" placeholder="Enter Password">
                        </div>

                        <input type="submit" value="Login" name="login" class="btn btn-primary btn-block btn-lg">
                    </form>
                    </div>
                </div>

       
            </div>
        </div>
    </section>

    <?php include('includes/footer.php') ?>