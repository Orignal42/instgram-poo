<?php

class Photosmanager {

    
    protected $db;

    public function __construct($db)
    {
      $this->db = $db;
    }
  
    public function addPhoto(Photos $photo, Users $user )
    {
   
      $q = $this->db->prepare('INSERT INTO photos( photo,  id_user, comments) VALUES(:photo, :id_user, :comments)');
      
      $q->bindValue(':photo', $photo->getPhoto());
      $q->bindValue(':id_user', $user->getId());
      $q->bindValue(':comments', $photo->getComments());
      $q->execute();
    }
    public function getListPhotos(Photos $photo)
    {
   
      $q = $this->db->prepare('SELECT * FROM photos ');
      
 
      $q->bindValue(':photo', $photo->getPhoto());
      $q->bindValue(':comments', $photo->getComments());
      $q->bindValue(':id_user', $photo->getId_user());
      
      $q->execute();
      $photoArray = $q->fetch(PDO::FETCH_ASSOC);
      
      $photo->hydrate([
        'id' => $photoArray['id']
      ]);
    }

  
}
