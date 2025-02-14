<?php
    $hostname = "localhost:3307";
    $username = "root";
    $password = NULL;
    $database = "1rf22cs082";
    $connection = mysqli_connect($hostname,$username,$password,$database);
    if($connection->connect_error)
    {
        die("Connection to mysql failed").$connection->connect_error;
    }
    if(isset($_POST['add']))
    {
        $item= $_POST['item'];
        if(!empty($item)){
            $query = "INSERT INTO todo (name) VALUES ('$item') ";
            if(mysqli_query($connection,$query)){
                echo '
                <center>
                    <div class="alert alert-success" role="alert">
                        Item Added Successfully!!!
                    </div>
                </center>';
            }
        }
    }
    if(isset($_GET['action']))
    {
        $itemID= $_GET['item'];
        if(($_GET['action']== 'done')){
            $query = "UPDATE todo SET STATUS=1 WHERE ID='$itemID'";
            if(mysqli_query($connection,$query)){
                echo '
                <center>
                     <div class="alert alert-info" role="alert">
                        Item Marked as Done!!!
                    </div>
                </center>';
            }
        }
    }
    if(isset($_GET['action']))
    {
        $itemID= $_GET['item'];
    if($_GET['action']=='delete')
    {
        $query = "DELETE FROM todo WHERE ID = '$itemID'";
        if(mysqli_query($connection,$query))
        {
            echo '
            <center>
                <div class="alert alert-danger" role="alert">
                    Item Deleted Successfully!!!
                </div>
            </center>';
        }
        else{
            echo mysqli_error($connection);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST APPLICATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .done{
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <main>
        <div class="container pt-5">
            <div class="row">
            <div class="col-sm-12 col-md-3"></div>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <p>Todo List</p>  
                    </div>
                    <div class="card-body">
                    <form method="post" action="<?= $_SERVER['PHP_SELF']?>">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="item" placeholder="Add a todo item">
                        </div>
                        <input type="submit" class ="btn btn-dark" name="add" value="Add Item">
                    </form>
                    <div class="mt-5 mb-5"> 
                        <?php
                            $query="SELECT * FROM todo";
                            $result = mysqli_query($connection,$query);
                            if($result->num_rows>0)
                            {
                                $i=1;
                                while($row=$result->fetch_assoc()){
                                    $done = $row['STATUS'] ==1?"done" : "";
                                    echo '
                                    <div class="row mt-4" >
                                        <div class="col-sm-12 col-md-1"><h5>'.$i.'</h5></div>
                                        <div class="col-sm-12 col-md-5"><h5 class="'.$done.'">'.$row['NAME'].'</h5></div>
                                        <div class="col-sm-12 col-md-5">
                                            <a href="?action=done&item='.$row['ID'].'" class="btn btn-outline-dark">Mark as done</a>
                                            <a href="?action=delete&item='.$row['ID'].'" class="btn btn-outline-danger">Delete</a>
                                        </div>
                                    </div>
                                    ';
                                    $i++;
                                }
                            }
                            else
                            {
                                echo '
                                <center>
                            <img src = "image.png" width ="50px" alt="Empty List"><br><span>The list is empty</span>
                        </center> 
                        ';
                            }
                        ?>   
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.alert').fadeTo(3000,300).slideUp(300,function(){
                $('.alert').slideUp(300);
            })
        })
    </script>
</body>
</html>