<?php
require_once './db.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($database_connection, "SELECT * FROM states WHERE country_id = $id");

    while($row = mysqli_fetch_array($query)){
        $id =$row['id'];
        $state = $row['name'];
        
        echo "<option value='$id'>$state</option>";
    }
    
}
?>