<?php
    session_start();
    error_reporting(0);

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        // if ($_SESSION["user_type"] == "admin") {
        //     header("location: pages/admin/index.php");
        //     exit;
        // } 
        if ($_SESSION["user_type"] != "admin") {
            header("location: ../pages/user/index.php");
            exit;
        } 
    }
    require_once "../include/config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_SESSION['logid'];
        $emailnum = $_SESSION['num'];
        $verifynum = $_POST['inputcode'];

        if (empty(trim($verifynum))) 
        {
            $code_error = "Please enter the code";
        }
        else
        {
            if (!is_numeric($verifynum))
            {
                $code_error = "Please enter only numbers";
            }
            else
            {
                if (strlen($verifynum) != 6)
                {
                    $code_error = "Code must have 6 numbers";
                }
                else
                {
                    if ($emailnum == $verifynum)
                    {
                        $sql = "SELECT * FROM grave_user WHERE user_id = '$id'";
                        $query = mysqli_query($mysqli,$sql);
                        while ($rows = mysqli_fetch_array($query))
                        {
                            $login_id = $rows['user_id'];
                            $login_level = $rows['user_type'];
                            $login_email = $rows['user_email'];
                            $login_username = $rows['user_name'];
                            $joined = $rows['creation_date'];
                        }
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $login_id;
                        $_SESSION["user_type"] = $login_level;
                        $_SESSION["email"] = $login_email;
                        $_SESSION["name"] = $login_username;
                        $_SESSION["joined"] = $joined;
                        header("location: ../pages/admin/index.php");
                    }
                    else
                    {
                        $code_error = "Invalid Code";
                    }
                }
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Himlayang Pilipino Memorial Park</title>
    
    <!-- Bootstrap and other cdn declaration -->
    <link rel="stylesheet" href="../pages/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../pages/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../pages/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../pages/assets/fonts/fontawesome5-overrides.min.css">

    <!-- Style Declaration -->
    <link rel="stylesheet" href="../pages/assets/css/login.css">

</head>
<body>

    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="text-center mb-4">
            <h3 class="mb-5">Himlayang Pilipino Memorial Park</h3>
            <?php 
                if(!empty($login_error)){
                    echo '<div class="alert alert-danger">' . $login_error . '</div>';
                }        
            ?>
        </div>
        <div class="form-label-group">
            <input type="number" id="inputcode" class="form-control form-control-lg <?php echo (!empty($code_error)) ? 'is-invalid' : ''; ?>" name="inputcode" placeholder="">
            <label for="inputCode">Verification Code</label>
            <span class="error-feedback text-danger" <?php if(empty($code_error)) { echo 'hidden';} ?>><?php echo $code_error ."<br>" ?></span>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-lg btn-secondary btn-block mr-2" name="btn-sign-in">Verify</button>
            <a href="index.php" class="back-btn text-decoration-none"><input type="button" class="btn btn-lg btn-outline-secondary btn-block" name="btn-back" value="Back"></input></a>
        </div>
        
        <div class="registration">
            <p class="mt-2">Haven't received a code yet? <a href="emailverifylogin.php">Resend Code</a></p>
            <ul>
                <li class="text-center my-auto">
                <h6 style="font-size: 14px; text-align: left;">Please check if the address that you entered is correct.</h6>
                </li>
                <li class="text-center my-auto">
                <h6 style="font-size: 14px; text-align: left;">Please check the spam folder.</h6>
                </li>
            </ul>
            <!-- <p class="mt-1"><a href="../index.php" class="text-secondary"><span class="fas fa-angle-left"></span> Back</a></p> -->
        </div>
        
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Himlayang Pilipino Memorial Park 2022</span></div>
            </div>
        </footer>
        

    </form>

    <!-- JS Declaration -->
    <script src="../pages/assets/js/jquery.min.js"></script>
    <script src="../pages/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/chart.min.js"></script>
    <script src="../pages/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../pages/assets/js/theme.js"></script>

    <!--This javascript prevent the resubmission of form when refresh or button(f5) is click-->
    <script>
        if (window.history.replaceState) {
          window.history.replaceState (null, null, window.location.href);
        }
    </script>

</body>
</html>