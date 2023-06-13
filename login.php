<?php
session_start();
include('layouts/header.php');
include('connection.php');
 
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($connection,$sql);
    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_assoc($query);
         
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        header('Location: blogs.php');
    }else{
        $_SESSION['error'] =  'Incorrect email or password';
    }
}
 
?>
<div class="container">
    
    <h2 class='mt-3'>Login</h2>
    <?php
        if (isset($_SESSION['error'])) { 
            ?>
        <div class="alert alert-danger"><?php  echo $_SESSION['error']; ?></div>
        <?php
        unset($_SESSION['error']);
        
    }
    ?>
    <div class="row mt-5">
     <div class="col-md-8">
     <div class="card">
        <div class="card-body">
            <form action="" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                </div>
                <input type="submit" value="Login" name="login" class='btn btn-primary'>
                </div>
            </form>
       </div>
        
     </div>
    </div>
</div>



</body>
</html>