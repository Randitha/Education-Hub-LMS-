<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Databse connection

    $con= new mysqli("localhost","root","","ins_registration");
    if($con->connect_error){
        die("Failed to connect : " . $con->connect_error);
    }else{
        $stmt = $con->prepare("select * from ins_registration where username = ?");
        $stmt->blind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password) {
                echo "<h2>Login Successfully</h2>";
            }else{
                echo "<h2>Invalid Username or Password</h2>";
            }
        }else{
            echo "<h2>Invalid Username or Password</h2>";
        }
    }
?>