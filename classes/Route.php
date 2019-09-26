<?php

    class Route{
        private $pages = [];
        private $action;

        public function __construct($arg){
            $this->action = $arg['action'];
        }
        
        public function setPages(array $data){
            $this->pages = $data;
        }
        
        public function page(){
            if(in_array($this->action,$this->pages)){
                $page = 'includes/'.$this->action.".php";
            }else{
                $page = "includes/404.php";
            }
            require $page;
        }  
    }
