<?php

function db(){
    $connect = mysqli_connect("localhost","root","codelogicx101","test");
    return $connect;
}