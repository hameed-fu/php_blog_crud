<?php
session_start();
include('layouts/header.php');
include('connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM blogs where id = '$id'";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE blogs SET title = '$title', description = '$description' WHERE id = '$id'";
    mysqli_query($connection,$sql);
    $_SESSION['success'] = 'Blog updated successfully!';
    
    header('location: blogs.php');
}

?>


<div class="container">
    
    <h2>Update Blog</h2>
    <div class="card">
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" value="<?php echo $row['title'] ?>" class="form-control" name="title" placeholder="Title">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description" ><?php echo $row['description'] ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
     
</div>



</body>
</html>