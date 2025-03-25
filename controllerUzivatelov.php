<?php
session_start();
include_once "databazaUzivatelov.php";
class controllerUzivatelov
{
    private $databazaUzivatelov;

    public function __construct()
    {
        $this->databazaUzivatelov = new databazaUzivatelov();
    }

    public function registrovat($parametre)
    {

        if (isset($parametre['meno']) && isset($parametre['heslo']) && isset($parametre['krstneMeno']) && isset($parametre['priezvisko'])) {
            $uzivatel = new uzivatel($parametre['meno'], $parametre['heslo'], $parametre['krstneMeno'], $parametre['priezvisko']);
               $id = $this->databazaUzivatelov->store($uzivatel);

            //echo $id;
            $uzivatel->setId($id);


            $_SESSION["meno"] = $parametre['meno'];
            $_SESSION["funkcia"] = 1;

           if($id!=-1){
                return 'index2.php';
           }
        }
    }
    public function overHeslo($parametre){
        if (isset($parametre['username']) && isset($parametre['password']) &&($parametre['username']!="")&&($parametre['username']!="")){
            $zhoda = $this->databazaUzivatelov->overHeslo($parametre['username'],$parametre['password']);

            if($zhoda >0){
            $_SESSION["meno"] = $parametre['username'];
            $_SESSION["funkcia"] = $zhoda;
            return 'index2.php';}
        }


    }
}