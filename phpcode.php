<!------------------------------------------ Registration Start ----------------------------------->
<?php 
include "config.php";
$showAlert1 = false;
$showAlert2 = false;
$showAlert = false;
if (isset($_POST['save'])) {

    $first = $_POST['firstname'];
    $last = $_POST['lastname '];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirmpassword'];
    $sql = "SELECT * FROM `signup` WHERE email ='$email'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    // matched confirm password and password//
    if (($pass != $confirm)) {
        $showAlert1 = true;
    }
    //    checking email already exist or not//
    elseif ($email == $row['email']) {
        $showAlert2 = true;
    } else {
        // insert query//
        $sql1 = "INSERT INTO `signup`(`firstname`, `lastname`, `email`, `password`) 
        VALUES ('$first','$last','$email','$pass') ";
        $res1 = mysqli_query($conn, $sql1);
        $_SESSION['email'] = $_POST['email'];
       
        if ($res1) {
            $showAlert = true;
            header("Location: signin.php");
        }
    }
}
if ($showAlert) {
    echo '<div class="alert alert-success" role="alert" >
        success
        </div>';
}
if ($showAlert1) {
    echo '<div class="alert alert-danger" role="alert" >
        Password not  matched </div>';
}
if ($showAlert2) {
    echo '<div class="alert alert-danger" role="alert" >
        User is already exists
        </div>';
}
// ---------------------------end registration-------------------------------------------------//
//-----------------------------start login ----------------------------------------------------//
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['email1']);
    $password = mysqli_real_escape_string($conn, $_POST['password1']);


    $query = "SELECT * FROM signup WHERE email='$username' AND password='$password' ";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) {
        $r = mysqli_fetch_array($results);
        session_start();
        $_SESSION['email'] = $r['email'];
        $_SESSION['image'] = $r['image'];
        $_SESSION['id'] = $r['id'];


        header("Location: index.php");
        exit;
    } else {
        // Handle incorrect login credentials (e.g., display an error message)
        echo "Invalid username or password.";
    }
}
// start login for admin//
if (isset($_POST['submit1'])) {
    $username = mysqli_real_escape_string($conn, $_POST['email2']);
    $password = mysqli_real_escape_string($conn, $_POST['password2']);


    $query = "SELECT * FROM admin WHERE email='$username' AND password='$password' ";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) {
        $r = mysqli_fetch_array($results);
        session_start();
        $_SESSION['email'] = $r['email'];
        $_SESSION['image'] = $r['image'];
        $_SESSION['id'] = $r['id'];
        header("Location: admin.php");
        exit;
    } else {
        // Handle incorrect login credentials (e.g., display an error message)
        echo "Invalid username or password.";
    }
}
//end login admin//

include "config.php";
$showAlert1 = false;
$showAlert2 = false;
$showAlert = false;
if (isset($_POST['save1'])) {

    $first = $_POST['firstname'];
    $last = $_POST['lastname '];
    $email = $_POST['email3'];
    $pass = $_POST['password3'];
    $confirm = $_POST['confirmpassword'];
    $sql = "SELECT * FROM `signup` WHERE email ='$email'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    // matched confirm password and password//
    if (($pass != $confirm)) {
        $showAlert1 = true;
    }
    //    checking email already exist or not//
    elseif ($email == $row['email']) {
        $showAlert2 = true;
    } else {
        // insert query//
        $sql1 = "INSERT INTO `admin`(`firstname`, `lastname`, `email`, `password`) 
        VALUES ('$first','$last','$email','$pass') ";
        $res1 = mysqli_query($conn, $sql1);
        $_SESSION['email'] = $_POST['email'];
       
        if ($res1) {
            $showAlert = true;
            header("Location: adminsignin.php");
        }
    }
}
if ($showAlert) {
    echo '<div class="alert alert-success" role="alert" >
        success
        </div>';
}
if ($showAlert1) {
    echo '<div class="alert alert-danger" role="alert" >
        Password not  matched </div>';
}
if ($showAlert2) {
    echo '<div class="alert alert-danger" role="alert" >
        User is already exists
        </div>';
}

//------------------------------------------------- ajax=--------------------------------//








session_start();// session_start();// Start session if not already started

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    // Assuming you have established a database connection ($conn)
    
    // Fetch sender ID from the current session
    $senderId = $_SESSION['id']; // Replace 'id' with the actual session variable storing the sender's ID
    
    // Fetch receiver ID from the AJAX request
    $receiverId = $_POST['userId']; // Make sure you're sending this value in your AJAX request
    
    $message = $_POST['message'];
    $sql = "INSERT INTO `messages` (sender_id, receiver_id, message_text, timestamp) VALUES ('$senderId', '$receiverId', '$message', NOW())";
    $conn->query($sql);


}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sessionId = $_SESSION['id']; // Get the current session's ID
    $receiverId = $_GET['receiverId']; // Get the receiver's ID from the URL parameter

    // Debugging statement to check the value of receiverId
    echo "Receiver ID: " . $receiverId;

    // Fetch messages exchanged between the session user and the specific receiver in a chat conversation
    $sql = "SELECT id, message_text, timestamp FROM `messages` WHERE 
    (sender_id = {$sessionId} AND receiver_id = {$receiverId}) OR
    (sender_id = {$sessionId} AND receiver_id = {$sessionId})
   
    ORDER BY timestamp ASC";

    $result = $conn->query($sql);
    
    while ($row = $result->fetch_assoc()) {
        $messageText = $row['message_text'];
        $timestamp = $row['timestamp'];
        echo '<div class="message user-message bg-warning text-white rounded-pill">';
        echo $messageText . ' (Sent at: ' . $timestamp . ')';
        echo '</div>';
    }
}



