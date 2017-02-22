<?php


$db = mysqli_connect("104.152.168.28", "itservic_basilio", "basiliodb123", "itservic_basilio");


echo $con = $db->connect();

var_dump(mysqli_connect_error());