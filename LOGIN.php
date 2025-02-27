<?php

    session_start();
    include 'connect.php';
    // When form submitted, check and create user session.
    if (isset($_POST['UserName'])) {
        $UserName = stripslashes($_REQUEST['UserName']);    // removes backslashes
        $UserName = mysqli_real_escape_string($conn, $UserName);
        $Password = stripslashes($_REQUEST['Password']);
        $Password = mysqli_real_escape_string($conn, $Password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `doctor` WHERE username='$UserName'
                     AND Password= "."'" . $Password . "'";
        
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $_SESSION['UserName'] = $UserName;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
        echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  </div>";}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="50">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styling.css">
    </head>

    <body>
   
        <div class="container">

        <h1 class="text-center" style="color:rgb(35, 122, 243); font-family:Verdana;"> ECRI_CARE</h1>

            <form class="needs-validation" method="POST">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" id="text" name="UserName" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>

                <div class="form-group ">
                    <label class="form-label">Enter Password</label>
                    <input class="form-control" type="password" id="password" name="Password" required>
                    <div class="invalid-feedback">
                        Enter your password
                    </div>
                </div>

                <div class="form-group form-check">
                    <input class=" form-check-input" type="checkbox" id="check">
                    <label class=" form-check-label" for="check">Remember me</label>
                </div>

                <div class="col-md-12 text-center">
                    <input class="btn btn-success btn-lg" type="submit" value="LOGIN">
                    <a href="Register.html">
                    <input class="btn btn-primary btn-lg" type="button" value="Create Account"></a>
                </div>
                
                <h4><a href="#">Forgot Password?</a></h4>
                

                
            </form>
    </body>

</html>