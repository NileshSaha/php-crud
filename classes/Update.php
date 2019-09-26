<?php

class Update{

    private $id;
    private $fields = [
        'name' ,
        'class',
        'section'
    ];
    private $fieldvalue = [];
    private $errors = [];
    
    public function __construct($id){
        $this->id=$id;
    }

    public function selectRow(){
        $connect = db();
        $sql = "SELECT `name`,`class`,`section` FROM `students` WHERE `id`='{$this->id}'";
        $query = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($query);
        $this->fieldvalue = $row;
        return ($this->fieldvalue);
    }

    private function db(){
        $connect = mysqli_connect("localhost","root","codelogicx101","test");
        return $connect;
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

    public function updateInDB(array $data){
        $connect = db();
        $sql = "UPDATE `students` SET `name`='{$data['name']}',`section`='{$data['section']}',`class`='{$data['class']}' WHERE `id`='{$this->id}'";
        $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    }

}