<?php


include("databazaVtipov.php");
include("controllerUzivatelov.php");
$storage = new databazaVtipov();

if (isset($_POST['funkcia']))
{
    switch ($_POST['funkcia']){

        case 'vloz':
            $idVtipu = $_POST['idVtipu'];
            $textKomentara = $_POST['textKomentara'];
            $menoAutora = $_SESSION['meno'];

            $dbresult =  $storage->vlozKoment($menoAutora,$idVtipu,$textKomentara);

            if($dbresult==1){
                echo     json_encode(array("statusCode" => 200));

            }
            else{
                echo    json_encode(array("statusCode" => 201));
            }

            return;
            break;

        case 'dajKomenty':
            $idVtipu = $_POST['idVtipu'];

            $dbresult =  $storage->DajKomentarePodlaVtipipu($idVtipu);

            echo "    <table class=\"table table-bordered\">

    <thead>
        <tr>
<th ><b>MenoAutora</b></th>
<td ><b>Text</b></td>
<td ><b>Datum</b></td></td>
            </tr>
      </thead>
<tbody>";
            while($data = mysqli_fetch_row($dbresult))
            {
                echo "<tr>";
                echo "<td align=center>$data[1]</td>";
                echo "<td align=center>$data[2]</td>";
                echo "<td align=center>$data[3]</td>";
                echo "</tr>";
            }
            echo "</tbody>";


            echo "</table>";






            return;
            break;






        default:
            echo "ajax: " . $_POST['ajax'];
            return;
    }
}
else
{
    ?>
    no POST detected
    <?php
}



?>


