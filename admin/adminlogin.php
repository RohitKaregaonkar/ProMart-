<!-- PHP Code for Login Page Starts Here  -->

<?php 

    if(isset($_POST['login']))
	{
            $uid=trim(stripslashes(strip_tags($_POST['user'])));
            $pwd=trim(stripslashes(strip_tags($_POST['pwd'])));

            $conn = mysqli_connect("localhost", "root", "","basedb") or die(mysqli_error(). "Unable to connect Database");
            
            $res=mysqli_query($conn,"select * from admins where username='$uid' AND password='$pwd'");
            if(mysqli_num_rows($res)>0)
		{		
                    session_start();
                    $_SESSION['username']=$uid;
                    echo "<script>window.location='dashboard.php';</script>";
		}
            else
		{
                    $emsg="<b style='color:red;margin-top:10%'>Sorry! Incorrect Username or Password!</b>";
		}
            mysqli_close($conn);
	}

?>



<!-- PHP Code for Login Page Ends Here  -->