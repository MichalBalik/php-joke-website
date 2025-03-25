<?php
include "vtip.php";
include "menu.php";
include "databazaVtipov.php";

$databaza = new databazaVtipov();
$menu = new menu();


if(!isset($_SESSION["funkcia"])|| $_SESSION["funkcia"]<2)
{
    header( "refresh:5;url=index2.php" );
    exit("Nedostacujuca funkcia");
}


if ( !empty( $_POST['id'] )&& !empty( $_POST['text'] )){
    $databaza->upravVtip($_POST['id'],$_POST['text']);

}
if (isset($_GET['id'])) {
    $databaza->zmazVtipPodlaID($_GET['id']);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administracia</title>
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

        <form  method="post">

            <div class="form-group">
                <label for="exampleFormControlTextarea12">ID upravovaneho vtipu</label>
                <textarea class="form-control" name="id" id="exampleFormControlTextarea12" readonly rows="1"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Text vtipu</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1"  rows="3"></textarea>
            </div>

            <button type="submit"  id="uloz" value="Submit" class="btn btn-primary" >Uloz</button>



        </form>



    </div>
</div>

<div class="table responsive">
    <table class="table table-striped" id="tabulka">

        <thead>
        <tr>
            <th>#</th>
            <th>Kategoria</th>
            <th>Text</th>
            <th>Datum</th>
            <th>Zmaz</th>
            <th>Uprav</th>

        </tr>
        </thead>
        <tbody>
        <?php


        $result = $databaza->getAllData();




        foreach ($result as $vtip) {



            echo '<tr>
                                 <td>'. $vtip->getid().'</td>

                  <td>'. $vtip->getKategoria().'</td>
                  <td> '. $vtip->getText().'</td>
                  <td> '.$vtip->getDatum().'</td>
                  <td><a href=" ?id='. $vtip->getid() .'">X</a></td>
                   <td><button class="btnSelect">Select</button></td>

                

                  
                </tr>';
        }

        ?>

        </tbody>
</table>
</div>


<script>
    $(document).ready(function(){
        $("#tabulka").on('click', '.btnSelect', function() {
            var currentRow = $(this).closest("tr");
            $(this).attr("href");

            var col1 = currentRow.find("td:eq(0)").html();
            var col2 = currentRow.find("td:eq(1)").html();
            var col3 = currentRow.find("td:eq(2)").html();


            $(exampleFormControlTextarea12).html(col1);

            $(exampleFormControlTextarea1).html(col3);
        });

    });


</script>

</body>
</html>