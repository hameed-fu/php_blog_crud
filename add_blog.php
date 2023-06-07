<?php
include('layouts/header.php');
include('connection.php');

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO blogs(title,description) values('$title','$description')";
    if(mysqli_query($connection,$sql)){
        echo "blog added successfully";
    }else{
        echo "Something went wrong";
    }
}

?>


<div class="container">
    
    <h2>Add new blog</h2>
    <div class="card">
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description" ></textarea>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
     
</div>



</body>
</html>