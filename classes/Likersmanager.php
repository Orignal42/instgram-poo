<?php

class Likersmanager {

    
    protected $db;

    public function __construct($db)
    {
      $this->db = $db;
    }

    public function addLikers(Photos $photo, Users $user )
    {
   
      $q = $this->db->prepare('INSERT INTO likers( id_user, id_photo) VALUES( :id_user,:id_photo)');
      
      $q->bindValue(':id_photo', $photo->getId());
      $q->bindValue(':id_user', $user->getId());
      $q->execute();
    }
  

      

    
    }






    

