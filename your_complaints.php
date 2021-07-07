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
            <h3 class="text-primary">Your Complaints</h3>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">ref#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Message</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 


$sql = "SELECT * FROM complaints WHERE user_id = {$_SESSION['user_id']}";
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
                        <td><a href="open.php?open=<?php echo $complaint_id ?>" class="btn btn-dark btn-sm">open</a></td>
                    </tr>
                    <?php }
                            } else {
                              echo "<p class='alert alert-danger'>You have no complaints yet</p>";
                            }
                    ?>
                </tbody>
            </table>
              
            </div>
        </div>
    </section>
  

    <?php include('includes/footer.php') ?>