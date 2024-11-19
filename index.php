<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
       if(isset($_GET['loginbtn'])){
        // DB CONNECTION OPEN
        $conn = mysqli_connect('localhost','root','','ecomm_db') or die("Could not connect to Database");
        // Build the query

        // Always filter the data which are comming from the userend
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $password = mysqli_real_escape_string($conn, $_POST['Password']);
        // Get the salt from the user table
       // $sql = "SELECT salt FROM user_tbl WHERE email = '$email'";
    //    $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
        $sql = "SELECT * FROM  user_tbl WHERE email='$email' AND password='$password'";
        // Execute the query

        // DBCONNECTION CLOSE
        mysqli_close($conn);
       }
    ?>
    <form class="w-50 offset-3 mt-3" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1 class="text-center">Login Form</h1>
        <input type="hidden" name="action" id="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="Password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" name="loginbtn">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>