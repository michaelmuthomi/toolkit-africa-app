<?php
$conn=new mysqli("localhost","root","","chemolex_db");
if(!$conn){
    echo 'Failed to establish connection';
}