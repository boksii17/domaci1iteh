<?php
class TipSmestaja{
    public $idtip;   
    public $nazivtipa;   
      
     
    
    public function __construct($idtip=null, $nazivtipa=null)
    {
        $this->idtip = $idtip;
        $this->nazivtipa = $nazivtipa;
        
    }

    #funkcija prikazi sve getAll

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM tipSmestaja";
        return $conn->query($query);
    }

}
?>