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
            <?php 
$sql = "SELECT * FROM complaints JOIN users ON complaints.user_id = users.user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $complaint_id = $row["complaint_id"];
      $user_id = $row["user_id"];
      $user_namess = $row['user_names'];
      $topic = $row["topic"];
      $message = $row["message"];
      $complaint_image = $row["complaint_image"];
      $complaint_status = $row["complaint_status"];
      $complaint_date = $row["complaint_date"];
  
?>
                <div class="col-md-4">
                    <div class="card text-center border-primary mb-resp">
                        <div class="card-body">
                            <h3 class="text-primary"><?php echo $topic; ?></h3>
                            <p class="text-muted"><?php echo $message; ?>.</p>
                            <hr>
                            <p class="text-secondary">Status : <?php echo $complaint_status; ?>.</p>
                            <p class="text-dark font-weight-bold">Reported by : <?php echo $user_namess; ?>.</p>
                        </div>
                    </div>
                </div>  
                <?php }
                            } else {
                              echo "0 results";
                            }
                            ?>


            </div>
        </div>
    </section>




    <!-- CONTACT -->
  

    <?php include('includes/footer.php') ?>