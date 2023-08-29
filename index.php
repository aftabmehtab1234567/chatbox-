<!DOCTYPE html>
<html lang="en">
    <?php session_start();
     $_SESSION['id'];
    include "config.php";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
    <title>Document</title>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 side-left pt-4">
                <span class="line-dashboard"></span><h4 class="text-center ">CRUD OPERATIONS</h4>
                <div class="user-img mt-4">
                    <img src=<?php echo $_SESSION['image']?> >
                    <h5 class="text-center mt-4"><?php echo $_SESSION['email']?> </h5>
                    <p class="text-center mt-4" style="color:#FEAF00">Admin</p>
                </div>
                <nav>
                    <div class="navbar">
                        <ul>
                            <li><a href="index.html"><span class="fa fa-home"></span>&nbsp;&nbsp;&nbsp;Home</a></li>
                           
                            <li><a href="#"><span class="far fa-bookmark"></span>&nbsp;&nbsp;&nbsp;Inbox</a></li>
                           
                            <li><a href="#"><span class="fa fa-cogs"></span>&nbsp;&nbsp;&nbsp;Setting</a></li>
                            <li><a href="logout.php"><span class="fa fa-cogs"></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-10 dashboard-main">
                <div class="nav-bar mb-3">
                    <nav class="navbar navbar-light ">
                        <div class="container-fluid">
                          <!-- <a class="navbar-brand">Navbar</a> -->
                          <a href="http://"><i class="fa fa-play-circle fs-3"></i></a>
                          <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                            <span class="fa fa-bell mt-2 ps-3"></span>
                          </form>
                        </div>
                      </nav>
                </div>
                <div class="card-page">
                    <div class="row">
                        <div class="col lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="d-student">
                                        <span class=" fa fa-graduation-cap"></span>
                                        <p>Query</p>
                                        <h4>243</h4>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="d-user">
                                        <span class=" fa fa-user"></span>
                                        <p>User</p>
                                        <h4>3</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

                <div class="container-fluid border border-warning border-rounded msg-border rounded">
                    <div class="row mt-5">
                        <div class="col-sm-5 col-md-6 ">
                            <div class="person-card">
                            <?php
// Assuming $_SESSION['id'] contains the current user's ID

// Prevent SQL injection by properly escaping the session ID


$currentUserId = mysqli_real_escape_string($conn, $_SESSION['id']);

// Construct the SQL query to exclude the current user
$query = "SELECT * FROM `signup` WHERE id != '$currentUserId'";
$res = mysqli_query($conn, $query);

if (mysqli_num_rows($res) > 0) {
    while ($data = mysqli_fetch_array($res)) {
?>
        <div class="row bg-light">
            <div class="col text-center">
                <img src="<?= $data['image'] ?>" alt="Profile Image" class="rounded-circle" height="80px" width="100px">
            </div>
            <div class="col">
                <div class="name"><?= $data['firstname'] ?></div>
                <div class="name"><?= $data['email'] ?></div>
                <div class="d-flex">
                <button class="btn btn-success rounded-pill btn-show-message" data-user-id="<?= $data['id'] ?>" onclick="myFunction(<?= $data['id'] ?>)">showMessage</button>



                    <!-- <button id="" class="btn btn-success rounded-pill" onclick="hideMessage()">hideMessage</button> -->
                </div>
            </div>
        </div><br>
<?php
    }
}


  ?>
        </div>
    </div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 text-center"> 
        <div class="border border-primary rounded messageArea" id="myDIV">
            <div class="message-area">
               
            <div class="message user-message bg-warning text-white rounded-pill message-area">
    <!-- Messages will be displayed here -->
</div>

             <?php
                $sql = "SELECT id FROM `signup`";
                $result = $conn->query($sql);
                ?>

          </div>
            <div class="mt-5">
            <form class="user-form" method="post">
       <input type="text" class="rounded-pill userInput" placeholder="Type your message..." name="message" autocomplete="off">
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   ?>
<button class="btn btn-success rounded-pill sendMessage" type="button" data-receiver="<?php echo $row['id']; ?>">Send</button>

<?php     
    }
} 
?>
</form>
</div>
    </div>
    </div>
<script src="script.js"></script>

</div>
                            </div>
                      </div>
                    </div>
</div>
        </div>
    </div>
    
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>