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
      $q->bindValue(':id_user', $likers->getId_user());
      $q->bindValue(':id_photo', $likers->getId_photo());
      $q->bindValue(':count', $likers->getCounter());

      
      $q->execute();
      $likersArray = $q->fetch(PDO::FETCH_ASSOC);
      
      $likers->hydrate([
        'id' => $likersArray['id']
      ]);
    }




    
}
