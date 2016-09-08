<?php 
/** KONEKSI KE DATABASE **/
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ezpz";

  $connection = mysqli_connect(
                $servername,
                $username,
                $password,
                $dbname
                );

    if(!$connection){
    die("connection failed : ".mysqli_conect_error());
  }

  $query = mysqli_query($connection, "SELECT * FROM configuration");

  $row = mysqli_fetch_object($query);

   ?>