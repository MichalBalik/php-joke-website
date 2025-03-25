<?php
include "uzivatel.php";
include "databazaUzivatelov.php";
include "menu.php";
$controller = new controllerUzivatelov();
$menu = new menu();
if (isset($_POST))
{

$redirect = $controller->registrovat($_POST);
header("Location: $redirect");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Registrácia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

    <?php
    $menu->generujHlavicku();
?>





<main>
    <div class="container">
        <div class="row">


            <div class="col-sm-12">


                <form method="post" action="./registracia.php">

                    <div class="form-group">
                        <label for="krstneMeno">Krstne meno</label>
                        <input type="text" class="form-control" id="krstneMeno" name="krstneMeno" placeholder="Krstne meno" >
                    </div>
                    <div class="form-group">
                        <label for="heslo">Priezvisko</label>
                        <input type="text" class="form-control" id="priezvisko" name="priezvisko" placeholder="Priezvisko" >
                    </div>
                    <div class="form-group">
                        <label for="meno">Uzivatelske meno</label>
                        <input type="text" class="form-control" id="meno" name="meno" placeholder="Uzivatelske meno" >
                    </div>
                    <div class="form-group">
                        <label for="heslo">Heslo</label>
                        <input type="password" class="form-control" id="heslo" name="heslo" placeholder="Heslo">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrovat</button>
                    <button onclick="over()" type="button" class="btn btn-primary">Skontroluj udaje</button>

                </form>
            </div>

        </div>





    </div>
    <div class="row justify-content-md-center ">
        <div class="col-md-4" >
        <p class="text-center error" id="err1"></p>
        <p class="text-center error" id="err2"></p>
            <p class="text-center error" id="err3"></p>
            <p class="text-center error" id="err4"></p>
            <p class="text-center error" id="err5"></p>


        </div>
    </div>
</main>
<script>
function over(){

    document.getElementById("err1").innerHTML = "";
    document.getElementById("err2").innerHTML = "";
    document.getElementById("err3").innerHTML = "";
    document.getElementById("err4").innerHTML = "";
    document.getElementById("err5").innerHTML = "";



   var meno =  document.getElementById("krstneMeno").value;
   var priezvisko = document.getElementById("priezvisko").value;
   var uzivMeno = document.getElementById("meno").value;
    var heslo = document.getElementById("heslo").value;
    document.getElementById("krstneMeno").classList.remove("invalid");
    document.getElementById("priezvisko").classList.remove("invalid");
    document.getElementById("heslo").classList.remove("invalid");

    if(meno.length<=1 ){
        var element = document.getElementById("krstneMeno");
        element.classList.add("invalid");

        document.getElementById("err1").innerHTML = "Zadajte udaj meno";
        }
    if(meno.length>30 ){


        document.getElementById("err2").innerHTML = "Meno musi mat max 30 znakov";
         element = document.getElementById("krstneMeno");
        element.classList.add("invalid");

    }
    if(priezvisko.length<=1 || priezvisko.length>30){

        element = document.getElementById("priezvisko");
        element.classList.add("invalid");
        document.getElementById("err3").innerHTML = "Skontrolujte ci ste zadaly prizvisko  max 30 znakov";
    }
    if(meno.localeCompare(priezvisko)===0){


        document.getElementById("err4").innerHTML = "Meno a prizvisko by sa nemali zhodovat";
    }
    if(heslo<=1)
    {

        document.getElementById("err5").innerHTML = "Zadajte heslo";
        element = document.getElementById("heslo");
        element.classList.add("invalid");
    }



}





</script>


</body>
</html>