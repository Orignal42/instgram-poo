<?php

class Likersmanager {

    
    protected $db;

    public function __construct($db)
    {
      $this->db = $db;
    }
  
    public function counter(Likers $likers)
    {
   
      $q = $this->db->prepare('SELECT * FROM likers WHERE counter = :counter');
      
      $q->bindValue(':count', $likers->getCounter());
      

      
      $q->execute();
      $likersArray = $q->fetch(PDO::FETCH_ASSOC);
      
      $likers->hydrate([
        'id' => $likersArray['id']
      ]);
    }
}
