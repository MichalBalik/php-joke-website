
<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 8.1.2019
 * Time: 0:56
 */

class uzivatel
{
    private $id;
    private $meno;
    private $heslo;
    private $krstneMeno;
    private $priezvisko;

    /**
     * Data constructor.
     * @param $id
     * @param $meno
     * @param $heslo
     * @param $krstneMeno
     * @param $priezvisko
     * @param $datum
     */
    public function __construct($meno, $heslo, $krstneMeno, $priezvisko)
    {
        $this->meno = $meno;
        $this->setHeslo($heslo);
        // $this->heslo = $heslo;
        $this->krstneMeno = $krstneMeno;
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return mixed
     */
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @return mixed
     */
    public function getHeslo()
    {
        return $this->heslo;
    }

    /**
     * @return mixed
     */
    public function getKrstneMeno()
    {
        return $this->krstneMeno;
    }

    /**
     * @return mixed
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }


    public function setHeslo($heslo) {
        $this->heslo = password_hash($heslo, PASSWORD_BCRYPT);
    }
}