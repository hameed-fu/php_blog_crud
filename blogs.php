<?php
include('layouts/header.php');
include('connection.php');

$sql = "SELECT * FROM blogs";

$result = mysqli_query($connection, $sql);
 
?>
<div class="container">
    <h2>Blogs</h2>
    <a href="add_blog.php" class='btn btn-primary mb-2'>Add new</a>
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
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>
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