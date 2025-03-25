<?php
include "vtip.php";
include "databazaVtipov.php";
//include "controllerUzivatelov.php";
include "menu.php";
$databaza = new databazaVtipov();
$menu = new menu();
if ( isset( $_POST['kategoria'] )&& !empty( $_POST['text'] ))
{
    $datum = date('c');

    $vtip = new vtip(100,$_POST['text'], $_POST['kategoria'], $datum);
    $databaza->store($vtip);
    header("Location: index2.php");
}
if(!isset($_SESSION["funkcia"])|| $_SESSION["funkcia"]<1)
{

    header( "refresh:3;url=index2.php" );
    exit("Nedostacujuca funkcia");


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>VlozVtip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$menu->generujHlavicku();
?>

<div class="row justify-content-md-center ">
    <div class="col-md-6" >

        <form  method="post"   onSubmit="return checkform()">


            <div class="form-group"   >
                <label for="exampleFormControlSelect1">Vyberte kategoriu vtipu</label>
                <select class="form-control" name="kategoria" id="exampleFormControlSelect1">
                    <option>Chuck Noris</option>
                    <option>Blondinky</option>
                    <option>Politika</option>
                    <option>Opilci</option>
                    <option>Pocitace</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Text vtipu</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" ></textarea>
            </div>


             <button type="submit"  id="uloz" value="Submit" class="btn btn-primary" >Submit</button>



         </form>


     </div>
 </div>


<script>
    function checkform(){
        var pole =  document.getElementById("exampleFormControlTextarea1").value;
        if(pole.length>0){
            return true;
        }
        alert("zadajte text")
        return false;

    }

</script>

 </body>
 </html>
