<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql="select * from `crud` where id=$id ";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row["name"];
$email=$row["email"];
$mobile=$row["mobile"];
$password=$row["password"];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];


    $sql = "update `crud` set id=$id, name='$name', 
    email='$email', mobile='$mobile',
    password='$password' where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:display.php');
      //  echo "Updated Successfully";
    } else {
        die(mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPeration</title>
    <!-- #region -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="from-group mb-3">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name;?> >
            </div>


            <div class="from-group  mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email;?>>
            </div>

            <div class="from-group mb-3">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your number" name="mobile"
                value=<?php echo $mobile;?>   autocomplete="off">
            </div>

            <div class="from-group mb-3">
                <label>Password</label>
                <input type="text" class="form-control" placeholder="Enter your password" name="password"
                value=<?php echo $password;?>  autocomplete="off">
            </div>

            <div class="from-group">
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
        </form>



    </div>
</body>

</html>
?>