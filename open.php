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
            <h3 class="text-primary">Your Complaints Progress</h3>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">ref#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Message</th>
                    <th scope="col">Progress</th>
                    <th scope="col">your feedback</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

$id = $_GET['open'];

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
      $feedback = $row["feedback"];
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
                        <td><?php
                         if($feedback === "I am not satified"){
                            echo "<p style='color:red'>$feedback </p>";
                         }elseif($feedback === "It is better"){
                            echo "<p style='color:blue'>$feedback </p>";
                         }else{
                             echo "<p style='color:green'>$feedback </p>";
                         }
                        
                         ?></td>
                    
                    </tr>
                   
                </tbody>
            </table>
              
            </div>
        </div>
    </section>

    <section id="newsletter" class="bg-light text-white py-5">
        <div class="container">
        <form action="" method="post">
            <div class="row">
                 <div class="col-md-4">
                    <button type="submit" name="no" class="btn btn-danger btn-lg btn-block">
                        <i class="fas fa-envelope-open-o"></i>  I am not satified?.
                    </but>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="better" class="btn btn-info btn-lg btn-block">
                        <i class="fas fa-envelope-open-o"></i> Its Better
                    </button>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="yes" class="btn btn-success btn-lg btn-block">
                        <i class="fas fa-envelope-open-o"></i> I am satified?.
                    </button>
                </div>
            </div>
            </form>
        </div>
    </section>


    <?php
if (isset($_POST['no'])) {
    $feed = "I am not satified";   
        $query = "UPDATE complaints SET ";
        $query .= "feedback  = '{$feed}' ";
        $query .= "WHERE complaint_id = $id ";
        $update_query = mysqli_query($conn, $query);
        header("Location: open.php?open=".$id );
        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }
    }
    ?>

<?php
if (isset($_POST['better'])) {
    $feed = "It is better";   
        $query = "UPDATE complaints SET ";
        $query .= "feedback  = '{$feed}' ";
        $query .= "WHERE complaint_id = $id ";
        $update_query = mysqli_query($conn, $query);
        header("Location: open.php?open=".$id );
        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }
    }
?>

<?php
if (isset($_POST['yes'])) {
    $feed = "I am satified";   
        $query = "UPDATE complaints SET ";
        $query .= "feedback  = '{$feed}' ";
        $query .= "WHERE complaint_id = $id ";
        $update_query = mysqli_query($conn, $query);
        header("Location: open.php?open=".$id );
        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }
    }
?>



  

    <?php include('includes/footer.php') ?>