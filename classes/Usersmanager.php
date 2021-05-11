<?php

class Usersmanager {

    
    protected $db;

    public function __construct($db)
    {
      $this->db = $db;
    }
    public function addUser(Users $user)
    {
   
      $q = $this->db->prepare('INSERT INTO users (user, avatar, description) VALUES(:user, :avatar, :description)');
      
      $q->bindValue(':user', $user->getUser());
      $q->bindValue(':avatar', $user->getAvatar());
      $q->bindValue(':description', $user->getDescription());
    
  
      
      $q->execute();
    }

    public function connect(Users $user)
    {
   
      $q = $this->db->prepare('SELECT * FROM users WHERE user = :user ');
      
 
      $q->bindValue(':user', $user->getUser());
     

      
      $q->execute();
      $userArray = $q->fetch(PDO::FETCH_ASSOC);
      
      $user->hydrate([
        'id' => $userArray['id']
      ]);
    }


    public function getList()
    {
      $users = [];
      
      $q = $this->db->prepare('SELECT * FROM users');
      $q->execute();
      
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
        echo '<br>';
        array_push($users, new Users ($donnees));
      }
      
      return $users;
    }



}


