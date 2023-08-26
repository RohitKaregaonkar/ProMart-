<!-- ******************* This is a second part of Change Admin Password page used to store data in database For Admin ************ -->

<!DOCTYPE html>
<html>

<head>
	<title>Change Password</title>
</head>

<body>
	<center>
		<?php
                
                $conn = mysqli_connect("localhost", "root", "","basedb") or die(mysqli_error(). "Unable to connect Database");
                
                    #Taking data from forget-password.php form
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['currentpassword'];
                    $newpassword = $_REQUEST['newpassword'];
                    $confirmpassword = $_REQUEST['confirmpassword'];
                    
                    if ($newpassword == $confirmpassword)
                    {
                        #Searching for username
                        $sql = "SELECT * FROM admins WHERE username='$username'";
                        
                        #Checking whether user is found or not
                        if(!$sql)
                        {
                            echo "The username you entered does not exist";
                        }
                        
                        #Updating Password with new password
                        $sql = "UPDATE admins SET password='$newpassword' where username='$username'";
                        
                        // Create a success message div
                        $successDiv = <<<HTML
                        <div class="alert alert-success">
                        <strong>Success!</strong> Password Has Been Changed Successfully.<br>
                        <a href="dashboard.php">Home</a>
                        </div>
                        HTML;
                        
                        if(mysqli_query($conn, $sql))
                        {

                            echo $successDiv;                           
                            // echo "<script>window.location='dashboard.php';</script>";
                            
                        }
                        else
                        {
                            echo "ERROR: Sorry! Password not Changed.\n </br> ";
                        }
                        
                        
                        
                    }
                    else
                    {
                        echo "ERROR: Sorry! Password & Confirm Password does not Match.\n </br> ";
                        echo "Retry Again...!";
                    }
                    
                    #Closing Connection
                    mysqli_close($conn);
                                      
                ?>
	</center>
</body>

</html>
