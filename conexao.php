<?php

    $server = "localhost";
    $user = "root";
    $pass = "root";
    $bd = "sistemacss";

   $conn = mysqli_connect($server,$user,$pass,$bd);

   function msg($texto, $tipo){
       echo "<div class='alert alert-$tipo' role='alert'>
               $texto;
             </div>";
   }

?>