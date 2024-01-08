
<?php
session_start();

    require 'config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, ($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, ($_POST['confirm-password']));
        $usertype = $_POST['user_type'];
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='$email'")) > 0 && mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE name='$name'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address and - {$name} - username have been already exists.</div>";
        } else {
            if(isset($password)  && (strlen($password) <8) ){
                $msg = "<div class='alert alert-danger'>Your password and confirm password should be at least 8 characters.</div>";
            }
            else if ($password === $confirm_password) {
                $pass = md5($password);
                $sql = "INSERT INTO users (name, email, password,user_type) VALUES ('$name', '$email', '$pass','$usertype')";
                $result = mysqli_query($conn, $sql);
                $msg = "<div class='alert alert-success'>You have successfully register in</div>";
                
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
    }
                ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Sign In Form</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images-20230424T110100Z-001\images\Authentication_Outline.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <p>Join us and be in our family.</p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="password" id="pass" onclick="ShowandHide()" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" id="cpass" onclick="ShowandHide()" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <select name="user_type" id="user_type">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <br><br>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="login.php">Login</a>.</p>
                        </div>
                        <div class="dropdown">
                            
                        </div>
                    </div>
                </div>
            </div>
            <style>
                            #user_type{
                        
                        width: 100%;
                        font-size: 16px;
                        font-weight: 400;
                        text-align: center;
                        border-radius: 6px;
                        padding: 10px;
                        border: 2 dashed;
                        outline-color: #0171d3;
                            }
                        </style>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
 <script defer>
        function ShowandHide(){
            var pass = document.getElementById("pass");
            var cpass = document.getElementById("cpass");
            if(pass.type === "password" && cpass.type === "password"){
                pass.type = "text";
                cpass.type = "text";
        }
        else{
            pass.type = "password";
            cpass.type = "password";

        }
    }
    </script>
</body>

</html>