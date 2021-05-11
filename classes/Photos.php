<?php
Class Photos{
protected $id;
protected $photo;
protected $id_user;
protected $created_at;
protected $comments;


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
        public function getPhoto (){
            return $this->photo;
        }  
    
        public function setPhoto ($photo){
            $this->photo = $photo;
        }
        public function getCreated_at (){
            return $this->created;
        }  
    
        public function setCreated_at ($created_at){
            $this->created = $created_at;
        }
     
        public function getComments (){
            return $this->comments;
        }  
        public function setComments ($comments){
            $this->comments = $comments;
        }
    
        public function setId_user ($id_user){
            $this->id_user = $id_user;
        }
            public function getId_user (){
                return $this->id_user;
            }  
        
         
        }
