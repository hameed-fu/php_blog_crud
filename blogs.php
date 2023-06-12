<?php
session_start();
include('layouts/header.php');
include('connection.php');

$sql = "SELECT * FROM blogs";

$result = mysqli_query($connection, $sql);


if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql1 = "DELETE FROM blogs WHERE id=$id";
    $result1 = mysqli_query($connection, $sql1);
    header("Location: blogs.php");
}   


 
?>
<div class="container">
    <h2>Blogs</h2>
    <a href="add_blog.php" class='btn btn-primary mb-2'>Add new</a>
     <?php
        if (isset($_SESSION['success'])) { ?>
           <div class="alert alert-primary"><?php  echo $_SESSION['success']; ?></div>
    <?php
            unset($_SESSION['success']);
        }
     ?>
    <div class="row">
        <table class="table table-hover">
            <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
            </tr>
            <?php
            $sno = 0 ;
             while($row = mysqli_fetch_assoc($result)){
            $sno++;
            ?>
            <tr>
                <td><?php echo $sno ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a onclick="return confirm('are you sure?')" href="?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>

            <?php 
            }
             ?>
        </table>
        
    </div>
</div>



</body>
</html>