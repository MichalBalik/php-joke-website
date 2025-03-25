<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 8.1.2019
 * Time: 2:00
 */

class databazaUzivatelov
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "databaza");

        $this->checkDBErrors();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    /**
     * @param Data $data
     * @return mixed
     */
    public function store(uzivatel $data)
    {
        $meno = $data->getMeno();
        $heslo = $data->getHeslo();
        $krstneMeno = $data->getKrstneMeno();
        $priezvisko = $data->getPriezvisko();

        $stmt = $this->db->prepare("INSERT INTO databaza.pouzivatelia (meno, heslo, krstneMeno, priezvisko) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $meno, $heslo, $krstneMeno, $priezvisko);

        $stmt->execute();
        if($this->db->error){
            return -1;
        }
        $this->checkDBErrors();

        return $this->db->insert_id;
    }



    public function overHeslo($meno, $heslo){
        $stmt = $this->db->prepare("SELECT * FROM databaza.pouzivatelia WHERE meno = ?");
        $stmt->bind_param("s", $meno);

        $stmt->execute();


        $dbResult = $stmt->get_result();
        if ($dbResult->num_rows == 1) {

           $row = $dbResult->fetch_assoc();
            $hesloOtestovat = $row['heslo'];
            if(password_verify($heslo,$hesloOtestovat)){
                return $row['funkcia'];

            }

        }

        $this->checkDBErrors();
        return -1;

    }

    private function checkDBErrors() {
        if ($this->db->error) {
            echo "Chyba:". $this->db->error;

            die();
        }
    }





}