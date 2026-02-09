<?php
$con=new mysqli("localhost","root","","chemolex_db");
if(!$con){
    echo 'Failed to establish connection';
}