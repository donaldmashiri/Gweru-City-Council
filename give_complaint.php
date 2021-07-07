<?php include('includes/header.php'); ?>

    <!-- NEWSLETTER -->
    <section id="newsletter" class="bg-dark text-white py-5">
        <div class="container">
            <h2 class="">
                ONLINE COMPLAINT REGISTRATION AND MANAGEMENT SYSTEM
            </h2>
            <div class="row">
            <?php include('includes/nav.php'); ?>
            </div>
        </div>
    </section>

    <!-- BOXES -->
    <section id="boxes" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center border-primary mb-resp">
                        <div class="card-body">
                            <h3 class="text-primary">Contact us on</h3>
                            <p class="text-muted">Email : gweru@gmail.com </p>
                            <p class="text-muted">Phone : +263779400263 </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card text-center border-primary mb-resp">
                        <div class="card-body">
                            <h3 class="text-primary">Give a Complaint</h3>
                    <?php
                      if(isset($_POST['signup'])){

                      $topic = $_POST['topic'];
                      $message = $_POST['message'];
                      $complaint_date =date("Y-m-d h:i:sa");
                                   
                            $sql = "INSERT INTO complaints (user_id, topic, message, complaint_date)
                            VALUES ('{$_SESSION['user_id']}','{$topic}', '{$message}', '{$complaint_date}')";
                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='alert alert-success text-center'>Complaint successfully submitted</p>";
                              } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                              } 
                       
                    }
        ?>
                            <form action="" method="post">
                        <div class="input-group input-group-lg mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                   <i class="fas fa-bell"></i>
                                </span>
                            </div>
                            <input type="text" name="topic" class="form-control" placeholder="Topic">
                        </div>

                        <div class="input-group input-group-lg mb-3">
                            <textarea class="form-control" name="message" id="" cols="15" rows="5" placeholder="Message"></textarea>
                        </div>
                        

                        <input type="submit" value="Submit" name="signup" class="btn btn-primary btn-block btn-lg">

                    </form>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>

    <!-- ABOUT / WHY SECTION -->
    <!-- <section id="about" class="py-5 text-center bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="info-header mb-5">
                        <h1 class="text-primary pb-3">
                            Comment
                        </h1>
                        <p class="lead pb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus obcaecati alias rerum dolore fugiat debitis?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <!-- CONTACT -->
  

    <?php include('includes/footer.php') ?>