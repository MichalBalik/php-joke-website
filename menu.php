<?php
include "controllerUzivatelov.php";
class menu
{

    public function __construct()
    {


    }

    public function __destruct()
    {
    }


    public function generujHlavicku()
    {
    echo"<nav class=\"navbar navbar-style navbar-expand-md\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#micon\">&#x2630;</button> <!-- aby sa menu zmrstilo do 3 ciar*/-->

            <a href=\"./index2.php\"><img class=\"logo\" src=\"https://tse1.mm.bing.net/th?id=OIP.Yf5NReY3d_9_PCt-wq4RmwAAAA&pid=Api\" alt=\"logo\"></a>
        </div>
        <div class=\"collapse navbar-collapse\" id=\"micon\">
            <ul class=\"nav navbar-nav ml-auto \">

                <li class=\"nav-item\"><a href=\"./vlozVtip.php\" class=\"nav-link\">VlozVtip</a>
                </li>
                <li class=\"nav-item\"><a href=\"./administracia.php\" class=\"nav-link\">Adminsiistracia</a>
                </li>";

        if(!isset($_SESSION["meno"])&&!isset($_SESSION["funkcia"])){
            echo '<li class="nav-item"><a href="./login.php" class="nav-link">Login</a>
                    </li>';
        }
        else{
            echo '<li class="nav-item"><a href="./logout.php" class="nav-link">Logout </a>
                    </li>';
        }

echo "            </ul>
        </div>
    </div>


</nav>";

    }



}







