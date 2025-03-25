<?php
include "vtip.php";
include "databazaVtipov.php";
include "menu.php";
// spustanie http://localhost/semestralkaVAII/index2.php
$databaza = new databazaVtipov();
$menu = new menu();

?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>INDEX</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$menu->generujHlavicku();
?>

<main>
    <div class="container">
        <div class="row">

            <?php

            foreach ($databaza->getAllData() as $vtip) {

                ?>
                <div class="card col-sm-4   text-center  ">
                    <h5 class="card-header "><?php echo $vtip->getKategoria() ?></h5>
                    <div class="card-body ">
                        <p class="card-text"><?php echo $vtip->getText() ?></p>
                        <a href="./zobraz.php?id=<?php echo $vtip->getid() ?>" class="btn btn-primary">Zobraz celý vtip</a>
                    </div>
                </div>
                <?php

            }
            ?>

            <div class="container">


                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                </ul>

            </div>

        </div>





    </div>
    <footer class="container-fluid text-center">
        <p>Vytvoril Michal Balik</p>
    </footer>
</main>


</body>
</html>