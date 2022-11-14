<?php
class Smestaj{
    public $smestajid;   
    public $kapacitet;   
    public $cena;   
    public $idtip;   
    
    public function __construct($smestajid=null, $kapacitet=null, $cena=null, $idtip=null)
    {
        $this->smestajid = $smestajid;
        $this->kapacitet = $kapacitet;
        $this->cena = $cena;
        $this->idtip = $idtip;
    }

    #funkcija prikazi sve getAll

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM smestaj";
        return $conn->query($query);
    }
}
?>