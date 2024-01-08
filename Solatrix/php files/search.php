<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "stylesheet_1.css"/>
    <link rel="stylesheet" href = "index.css"/>
    <link rel="stylesheet" href = "products.css"/>
    <title>search</title>
</head>
<body>
    <?php
    session_start();
    require 'header.php';
    
    require "config.php";
 ?>
 <div id="inv_containers" class="product">
     <?php
        $search = $_POST['search'];
         $sql = "SELECT * FROM solar_inverters Where Manufacturer Like '%$search%' OR Model like '%$search%' OR Description like '%$search%' OR Type like '%$search%' OR Power like '%$search%'";
         $inverters = $conn->query($sql);
         
         if($inverters->num_rows>0){
             while($row = $inverters->fetch_assoc()){
                $pid = $row['ID'];
                 echo '<div class="sub_pd">
                 <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="Solar Inverter"/>
                 <ul class="pd_description">
                     <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                     <li>Power Capacity: '.$row["Power"].'</li>
                     <li>DC Input: '.$row["DC"].'</li>
                     <li>AC Output: '.$row["AC"].'</li>
                     <li>MPPT Voltage Range: '.$row["MPPT"].'</li>
                 </ul>
                 <form action="details.php" method="post" class="pd_details">
                     <input type="hidden" name="table" value="solar_inverters"/>
                     <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                     <input type="submit" value="More Details" class="pd_btn"/>
                 </form>
             </div>';
             }
         }
     ?>
 </div>
 <div id="pv_containers" class="product">
     <?php 
         $sql_pv = "SELECT * FROM pv_panels Where Manufacturer Like '%$search%' OR Model LIKE '%$search%' OR Material LIKE '%$search%'";
         $pv_panels = $conn->query($sql_pv);
         if($pv_panels->num_rows>0){
             while($row = $pv_panels->fetch_assoc()){
                $pid = $row['ID'];
                 echo '<div class="sub_pd">
                 <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="PV Panel"/>
                 <ul class="pd_description">
                     <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                     <li>Peak Power: '.$row["Pmp"].'</li>
                     <li>Voc: '.$row["Voc"].'</li>
                     <li>Isc: '.$row["Isc"].'</li>
                     <li>Efficiecny: '.$row["Efficiency"].'</li>
                 </ul>
                 <form action="details.php" method="post" class="pd_details">
                     <input type="hidden" name="table" value="pv_panels"/>
                     <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                     <input type="submit" value="More Details" class="pd_btn"/>
                 </form>
             </div>';  
             }
         }
     ?>
 </div>
 <div id="heat_containers" class="product">
     <?php
         $sql_heat = "SELECT * FROM ht_panels Where Manufacturer Like '%$search%' OR Model LIKE '%$search%'";
         $heat_panels = $conn->query($sql_heat);
         if($heat_panels->num_rows>0){
             while($row = $heat_panels->fetch_assoc()){
                $pid = $row['ID'];
                 echo '<div class="sub_pd">
                 <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="Solar Heating Panel"/>
                 <ul class="pd_description">
                     <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                     <li>Tank Capacity: '.$row["TankCapacity"].'</li>
                     <li>Number of Tubes: '.$row["NbTubes"].'</li>
                     <li>Tube Diameter: '.$row["TubeDiameter"].'</li>
                     <li>Tube Length: '.$row["TubeLength"].'</li>
                 </ul>
                 <form action="details.php" method="post" class="pd_details">
                     <input type="hidden" name="table" value="ht_panels"/>
                     <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                     <input type="submit" value="More Details" class="pd_btn"/>
                 </form>
             </div>';
             }
         }
     ?>
 </div>
 <div id="bat_containers" class="product">
     <?php
         $sql_bats = "SELECT * FROM batteries Where Manufacturer Like '%$search%' OR Model LIKE '%$search%' OR Voltage LIKE '%$search%' OR Capacity LIKE '%$search%' OR Tech LIKE '%$search%'";
         $batts = $conn->query($sql_bats);
         if($batts->num_rows>0){
             while($row = $batts->fetch_assoc()){
                $pid = $row['ID'];
                 echo '<div class="sub_pd">
                 <img class="pd_img" src="'.$row["ImgDirec"].'/img1.jpg" alt="Solar Battery"/>
                 <ul class="pd_description">
                     <li>'.$row["Manufacturer"].' '.$row["Model"].'</li>
                     <li>Capacity: '.$row["Capacity"].'</li>
                     <li>Voltage: '.$row["Voltage"].'</li>
                     <li>Type: '.$row["Tech"].'</li>
                 </ul>
                 <form action="details.php" method="post" class="pd_details">
                     <input type="hidden" name="table" value="batteries"/>
                     <input type="hidden" name="ID" value="'.$row["ID"].'"/>
                     <input type="submit" value="More Details" class="pd_btn"/>
                 </form>
             </div>';
            }
        }
        else{
            echo '<div class="sa"><span class="error-msg">there is no product matching your </span></div>';
        }
    ?>
</div>
</div>
</div>
<style>
    .sa{
        font-size: xx-large;
        margin: 0 0 200px 0;
    }
    .error-msg{
        color: red;
        background-color: #F8D238;
    }
</style>
<?php
require 'footer.php';
?>
</body>
</html>