<?php
if(!isset($_GET["id"])){
    header("Location: index2.php");
}
$idVtipu = $_GET["id"];
include "menu.php";
$menu = new menu();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Zobraz vtip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <div class="jumbotron">




            <label for="id">ID Vtipu</label>
            <label for="id"></label><textarea class="form-control" name="id" id="id" readonly rows="1"><?php echo $_GET["id"]?></textarea>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Text vtipu</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" readonly rows="3"></textarea>
            </div>

            <!--            <button type="submit"  value="Submit" class="btn btn-primary">Uloz</button>-->






        </div>
    </div>
</div>
<?php

if(isset($_SESSION["meno"])){
    echo '<div class="row justify-content-md-center ">
    <div class="col-md-6" >
        <div class="jumbotron">
            <form  method="get">
                <div class="form-group">
                    <label for="textKomentara">Komentare</label>
                    <input type="text"  name="textKomentara" class="form-control" id="textKomentara" aria-describedby="emailHelp" placeholder="Zadajte Text komentara">
                    <small id="emailHelp" class="form-text text-muted">a</small>

                		<input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave">

                </div>
            </form>
        </div>
        
    </div>
</div>';

}



?>
<div class="row justify-content-md-center ">
    <div class="col-md-6" >
        <div class="jumbotron">
                <div class="form-group">

                    <button  onclick="getKomenty()" class="btn btn-primary">Aktualizuj komentare</button>
                    <div class="table-responsive" id="responsecontainer" >


                </div>
<!--            </form>-->
        </div>
    </div>
</div>
</div>


<script>


    $(document).ready(function() {
        getKomenty();
        $('#butsave').on('click', function() {
            var idVtipu = $('#id').val();
            var textKomentara = $('#textKomentara').val();
            var funkcia = 'vloz';

            if(idVtipu!="" && textKomentara!="" ){
                $("#butsave").attr("disabled", "disabled");


                $.ajax({
                    url: "post_request.php",
                    type: "POST",
                    data: {
                        idVtipu: idVtipu,
                        textKomentara: textKomentara,
                        funkcia: funkcia
                    },
                    cache: false,
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);

                        if(dataResult.statusCode==200){
                            $("#butsave").removeAttr("disabled");


                        }
                        else if(dataResult.statusCode==201){
                            alert("Nastala chyba");
                        }

                    }
                });
                getKomenty();

            }
            else{
                alert('Zadajte udaje !');
            }
        });
    });

    function getKomenty() {

        var idVtipu = $('#id').val();
        var funkcia = 'dajKomenty';

        $.ajax({
            type: "POST",
            url: "post_request.php",
            data: {
                idVtipu: idVtipu,
                funkcia: funkcia
            },
            dataType: "html",
            success: function (response) {
                $("#responsecontainer").html(response);

            }

        });
    }
</script>

</body>
</html>