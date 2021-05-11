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
    public function getListPhotos()
    {
      $listPhoto = [];
      $q = $this->db->prepare('SELECT * FROM photos');
           
      $q->execute();
      $photoArray = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($photoArray as $photo) {
        array_push( $listPhoto, new Photos($photo));
      }
      return $listPhoto;
    }


    
    public function getListPhotosByUsers()
    {
      $listPhotos = [];
      $q = $this->db->prepare('SELECT * FROM photos  WHERE id_user=id');
           
      $q->execute();
      $photosArray = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($photosArray as $photo) {
        array_push( $listPhotos, new Photos($photo));
      }
      return $listPhotos;
    }


    public function getPhotosbyUsers(Photos $photos)
    {
  
      $q = $this->db->prepare('SELECT * FROM users WHERE id=?');
        
      
      $q->execute([$photos->getId_user()]);
      $photoid = $q->fetch(PDO::FETCH_ASSOC);
      $test = new Users($photoid);
  
      return $test;
    }
  
}
