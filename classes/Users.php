<?php
Class Users{
protected $id;
protected $user;
protected $created_at;
protected $avatar;
protected $description;


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

    public function getUser (){
        return $this->user;
    }

    public function setUser ($user){
        $this->user = $user;
    }

    public function getCreated_at (){
        return $this->created_at;
    }

    public function setCreated_at ($created_at){
        $this->created_at = $created_at;

    }
    public function getAvatar (){
        return $this->avatar;
    }

    public function setAvatar ($avatar){
        $this->avatar = $avatar;

    }
    public function getDescription (){
        return $this->description;
    }

    public function setDescription ($description){
        $this->description = $description;

    }
}