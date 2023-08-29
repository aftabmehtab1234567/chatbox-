<!DOCTYPE html>
<html lang="en">
<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="style.css">
    <title>Crud Operation</title>
</head>
<?php
include 'config.php';
?>
<body>
    <div class="container-fluid form-container">
        <div class="row">
            <div class="col-lg-3 m-auto main-form">
                <form action="phpcode.php" method="post">
                    <span class="line"></span>
                    <h1 class="text-center fw-bold">CRUD OPERATIONS</h1>
                    <h3 class="text-center mt-3">SIGN IN</h3>
                    <p class="text-center mt-3">Enter your credentials to access your account</p>
                    <div class="mb-3 mt-5">
                        <label for="exampleInputEmail1" class="form-label">First  Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your First Name" name="firstname" required="">
                    </div>
                    <div class="mb-3 mt-5">
                        <label for="exampleInputEmail1" class="form-label">Last  Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Last Name" name="lastname"required="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter your Email" name="email3" required="">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="password3"required="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">confirm password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your Confirm password" name="confirmpassword"required="">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="SIGN IN" class="form-control mt-4 sign-btn" name="save1" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 link-reset">
                        <p class="text-center">Forgot your password? <a href="#">Reset Password</a></p>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">SIGN IN</button> -->
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>