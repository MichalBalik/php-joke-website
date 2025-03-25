<?php

include "menu.php";



$controller = new controllerUzivatelov();
$menu = new menu();


   if(isset($_POST)){

       $redirect = $controller->overHeslo($_POST);
       header("Location: $redirect");


   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$menu->generujHlavicku();
?>

<div class="row justify-content-md-center ">
    <div class="col-md-6" >

        <form  method="post" onSubmit="return checkform()">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text"  name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter login">
                <small id="emailHelp" class="form-text text-muted">VASE HESLO NASA STAROSTLIVOST</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>



            <div class=" row justify-content-center">

                <a href="./registracia.php" >Ak este nemas ucet - klikni sem</a>


            </div>
            <div class=" row justify-content-center">
            <button type="submit"  value="Submit" class="btn btn-primary" >Login</button>
            </div>

        </form>


    </div>


</div>


<script>
    function checkform(){
        var pole =  document.getElementById("exampleInputEmail1").value;
        var pole2 =  document.getElementById("exampleInputPassword1").value;

        if(pole.length>0 && pole2.length>0){
            return true;
        }
        alert("zadajte udaje");
        return false;

    }

</script>

</body>
</html>