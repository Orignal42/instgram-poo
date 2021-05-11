<?php
Class Likers{
protected $id;
protected $id_user;
protected $id_photo;
protected $counter;

    /* CONSTRUCT */

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    /* HYDRATE */

    public function hydrate($donnees)
    {
        foreach ($donnees as $key =>$value) {
        
            $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
        }
    }
    public function getId (){
        return $this->id;
    }  
    public function setId ($id){
        $this->id = $id;
    }

    public function setId_user ($id_user){
        $this->id_user = $id_user;
    }
    public function getId_user (){
        return $this->id_user;
    }  
    public function setId_photo ($id_photo){
        $this->id_photo = $id_photo;
    }
    public function getId_photo (){
        return $this->id_photo;
    }  
  
    public function setCounter ($counter){
        $this->counter = $counter;
    }
    public function getCounter (){
        return $this->counter;
    }  
  

}