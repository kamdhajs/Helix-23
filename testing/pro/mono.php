<?php
include 'connect.php';
if(isset($_POST)){
  $reg_id_mono = $_POST['reg_id_mono'];
  $sql_u="SELECT firstname,lastname, email, phone, college, gender FROM users where id='$reg_id_mono'";
  $res_u=mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
 if(mysqli_num_rows($res_u) > 0){
   while($row = mysqli_fetch_array($res_u)){
     $sql = "INSERT INTO monoacting(id,firstname,lastname,email,phone,college,gender) VALUES ('$reg_id_mono','$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]')";
     $to= $row[2];
     }
     if(mysqli_query($conn,$sql)){

$from = "info@helix20.com";
$subject = 'Registration For Helix-20';
$message = "You are Successfully Registered for Mono Acting.\nAll the Best, See you at the venue:-Near 1 st year block\nTimestamp:-19 Feb. 2020, 3PM – 4PM\nIf you have any queries regarding the contest, feel free to get in touch with us.\n\nRegards,\nHelix-20";
$headers="From: ".$from;
mail($to,$subject,$message,$headers);

     echo "1";
   }else{
     echo '0';
   }
}else{
  echo "0";
}

}
 ?>
