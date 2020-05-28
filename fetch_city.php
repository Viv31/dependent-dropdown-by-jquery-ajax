<?php
include('config/config.php');
if(!empty($_POST["id"])){

$select_category="SELECT * FROM city WHERE state_id='".$_POST['id']."'";

$res=mysqli_query($conn,$select_category);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
        echo '<option value="">Select City</option>';

        while($row =mysqli_fetch_array($res)){ 
		
            echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
        }
    }
    else{
        echo '<option value="">DATA NOT AVAILABLE</option>';
    }


}

?>