<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 8.1.2019
 * Time: 2:00
 */

class databazaVtipov

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
    public function upravVtip($id,$text)
    {
        $datum = date("Y-m-d H:i:s");

        $stmt = $this->db->prepare("UPDATE vtip SET datum = ?,text= ? WHERE id = ?");
        $stmt->bind_param("ssi", $datum, $text,$id);
        $stmt->execute();
//        $stmt->close();
        $this->checkDBErrors();


    }

    /**
     * @param Data $data
     * @return mixed
     */
    public function store(vtip $data)
    {
        $datum = date("Y-m-d H:i:s");
        $text = $data->getText();
        $kategoria= $data->getKategoria();

        $stmt = $this->db->prepare("INSERT INTO vtip (text, kategoria, datum) VALUES (?,?, ?)");
        $stmt->bind_param("sss", $text, $kategoria, $datum);
        $stmt->execute();

        $this->checkDBErrors();



    }

    public function vlozKoment($menoAutora,$idVtipu,$textKomentara)
    {
        $datumPridania = date("Y-m-d H:i:s");

        $stmt = $this->db->prepare("INSERT INTO komentare (idAutora,idVtipu ,text, datumPridania) VALUES (?,?,?, ?)");
        $stmt->bind_param("siss", $menoAutora, $idVtipu,$textKomentara,$datumPridania);
        $podarene = $stmt->execute();
          $this->checkDBErrors();
        if ($podarene) {
            return 1;
        } else {
            return 0;
        }






    }
    public function DajKomentarePodlaVtipipu($id){
//        $stmt = $this->db->prepare("SELECT * FROM databaza.pouzivatelia WHERE meno = ?");
//        $stmt->bind_param("s", $id);
//
//        $stmt->execute();
//        $this->checkDBErrors();
//
//
//
//        //$sql = "SELECT * FROM databaza.pouzivatelia WHERE meno = '$meno'";
//         return $dbResult = $stmt->get_result() ;



        $result=mysqli_query($this->db,"select * from komentare where idVtipu =  $id");
        return $result;
}

    /**
     * @return Data[]
     */
    public function getAllData()
    {
        $result = [];
        $sql = "SELECT * FROM databaza.vtip";
        $dbResult = $this->db->query($sql);
        if ($dbResult->num_rows > 0) {
            while ($row = $dbResult->fetch_assoc()) {
                $result[] = new vtip($row['id'],$row['text'], $row['kategoria'], $row['datum']);
            }
        }
        return $result;
    }


    private function checkDBErrors() {
        if ($this->db->error) {
            echo "Chyba:". $this->db->error;

            die();
        }
    }



        public function zmazVtipPodlaID($id){

            $stmt = $this->db->prepare("DELETE FROM vtip WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $this->checkDBErrors();







}

}