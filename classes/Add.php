<?php

class Add{
    
    private $fields = [
        'name' ,
        'class',
        'section'
    ];
    private $fieldvalue = [];
    private $errors = [];

    public function checkSubmit(array $arg){
        foreach($this->fields as $field){
            if(empty($arg[$field])){
                $this->errors[] = $field." value is missing.";
            }
        }
        if(empty($this->errors)){
            foreach($this->fields as $field ){
                $this->fieldvalue[$field]=$arg[$field];
            }
            return true;
        }
        else{
            return false;
        }
    }

    public function output_errors(){
        $this->error_output($this->errors);
    }

    private function error_output(array $errors){
        $this->errors=$errors;
        foreach($this->errors as $error){
            echo $error.'<br>';
        }
    }
    

    private function db(){
        $connect = mysqli_connect("localhost","root","codelogicx101","test");
        return $connect;
    }

    public function addData(array $data){
        $connect = db();
        $fields = '"'.implode('","',$data).'"';
        $sql = "INSERT INTO `students` (`name`,`class`,`section`) VALUES ($fields)";
        $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    }
}