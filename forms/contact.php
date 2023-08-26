<?php
    $conn = mysqli_connect("localhost", "root", "", "basedb");

    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $name = $_REQUEST['name'];
    $mobile = $_REQUEST['mobile'];
    $email = $_REQUEST['email'];
    $msg = $_REQUEST['message'];
    $dt = date('Y-m-d h:i:s');
    $id = 0000;

    $sql = "INSERT INTO feedback (id, fullname, mobile, email, message, time) VALUES ('$id', '$name', '$mobile', '$email', '$msg', '$dt')";

    $successDiv = <<<HTML
<div class="alert alert-success">
  <strong>Success!</strong> Your data has been stored successfully.
</div>
HTML;


    if(mysqli_query($conn, $sql)) {
       echo $successDiv;
      //  echo "<script>window.location='../index.html';</script>";
         
    } else {
        echo "ERROR: Hush! Sorry. " . mysqli_error($conn);
    }

    // if(mysqli_query($conn, $sql)) {
    //     // If the query is successful, show the success message and hide loading and error messages
    //     echo "<script>window.location='../index.html';</script>";
    //     echo "<script>
    //             document.querySelector('.sent-message').style.display = 'block';
    //         </script>";
    // } else {
    //     // If there's an error, show the error message and hide loading and success messages
    //     echo "<script>
    //             document.querySelector('.loading').style.display = 'none';
    //             document.querySelector('.sent-message').style.display = 'none';
    //             document.querySelector('.error-message').innerHTML = 'Error: " . mysqli_error($conn) . "';
    //             document.querySelector('.error-message').style.display = 'block';
    //         </script>";
    // }

    mysqli_close($conn);
?>



<!-- 

// Create a success message div
$successDiv = <<<HTML
<div class="alert alert-success">
  <strong>Success!</strong> Your data has been stored successfully.
</div>
HTML;

// Check if the data was stored successfully
if ($dataWasStoredSuccessfully) {
  // Show the success message
  echo $successDiv;
}


 -->