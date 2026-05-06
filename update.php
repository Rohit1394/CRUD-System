<?php
    include("connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
                body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }

        input:focus {
            border-color: #4facfe;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4facfe;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #00c6ff;
        }
    </style>
  </head>
  <body>
      



    <div class="form-container">
        <h2>Sign Up</h2>
<?php 
if(isset($_GET['upid'])){
    $uid=$_GET['upid'];
    $row=mysqli_query($con,"select * from register where id=$uid");
    $col=mysqli_fetch_array($row);

}

?>
        <form method="POST">
            <input type="text" name="uname" value="<?php echo $col[1]?>" placeholder="Enter your name" required>
            <input type="email" name="uemail" value="<?php echo $col[2]?>" placeholder="Enter your email" required>
            <input type="text" name="upass" value="<?php echo $col[3]?>" placeholder="Enter your password" required>
            <button type="submit" name="btn-update">update Account</button>
        </form>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  
</html>

<?php 
if(isset($_POST['btn-update'])){
   $uname= $_POST['uname'];
   $uemail= $_POST['uemail'];
   $upass= $_POST['upass'];
   $update=mysqli_query($con,"UPDATE `register` SET `name`=' $uname',`email`='$uemail',`pass`='$upass' WHERE id=$uid");
   if($update){
     echo "<script>
                alert('profile updated')
                location.assign('viewdata.php')
            </script>";
   }
}


?>