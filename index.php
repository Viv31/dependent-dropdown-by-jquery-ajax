<?php 
require_once('config/config.php');


$select_country="SELECT * FROM country ORDER BY country_name ASC";
$res=mysqli_query($conn,$select_country);
$rowCount = mysqli_num_rows($res);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dependent Dropdown by AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  	body{
  		background-image: url('img/pic8.jpg');
  		background-size: cover;
  		background-repeat: no-repeat;

  	}
  	#form_box{
  		background-color: rgba(0,0,0,0.7);
  		padding: 15px;
  		margin-top: 100px;
  		border-radius: 10px;
  		box-shadow: 5px 5px 10px 10px white;
  		color: white;
  	}
  </style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" id="form_box">
        <div class="form-group">
          <label>Country:</label>
          <select class="form-control" id="country" name="country"> 
            <option value="">---SELECT COUNTRY---</option>
            <?php
if($rowCount > 0){
        while($row = mysqli_fetch_array($res)){ 
            echo '<option value="'.$row['id'].'">'.$row['country_name'].'</option>';
        }
    }else{
        echo '<option value="">Category not available</option>';
    }
?>

          </select>
        </div>

        <div class="form-group">
          <label>State:</label>
          <select class="form-control" id="state" name="country"> 
            <option value="">---SELECT COUNTRY FIRST---</option>
            

          </select>
        </div>

        <div class="form-group">
          <label>City:</label>
          <select class="form-control" id="city" name="country"> 
            <option value="">---SELECT City---</option>
            
          </select>
        </div>
        
      </div>
      <div class="col-md-4"></div>
      
    </div>  
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'fetch_country.php',
                data:'id='+countryID,
                success:function(html){
                    $('#state').html(html);
                   
                }
            }); 
        }else{
            $('#state').html('<option value="">Select category first</option>');
            
        }
    });
    
    
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#state').on('change',function(){
      
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'fetch_city.php',
                data:'id='+stateID,
                success:function(html){
                    $('#city').html(html);
                   
                }
            }); 
        }else{
            $('#city').html('<option value="">Select State first</option>');
            
        }
    });
    
    
});
  
</script>

</body>
</html>