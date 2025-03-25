
<?php
/**
 * Created by PhpStorm.
 * User: Michal
 * Date: 8.1.2019
 * Time: 0:56
 */

class vtip
{
    private $id;
    public $text;
    private $kategoria;
    private $datum;

    /**
     * Data constructor.
     * @param $nazov
     * @param $popis
     * @param $datum
     */
    public function __construct($id,$text, $kategoria, $datum)
    {
        $this->id = $id;
        $this->text = $text;
        $this->kategoria = $kategoria;
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getKategoria()
    {
        return $this->kategoria;
    }
    public function getid()
    {
        return $this->id;
    }
}