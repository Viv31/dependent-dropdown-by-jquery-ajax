<?php
include('config/config.php');
if(!empty($_POST["id"])){

$select_category="SELECT * FROM state WHERE country_id='".$_POST['id']."'";

$res=mysqli_query($conn,$select_category);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
        echo '<option value="">Select State</option>';

        while($row =mysqli_fetch_array($res)){ 
		
            echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
        }
    }
    else{
        echo '<option value="">not available</option>';
    }


}

?>