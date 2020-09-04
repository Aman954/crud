<?php

require_once("inc/connection.php");

$sql= "create table cruding(
          id int AUTO_INCREMENT,
          name varchar(100),
          course varchar(70),
          mail varchar(100),
          primary key(id)
       
       )";
       
$tab=$conn->query($sql);

if($tab)
{
  echo "table created sucessfully";
}       

else
{
  echo "something wrong";
}


?>