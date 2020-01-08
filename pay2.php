<html>
<head></head>
<body>
<?php
if (isset($_POST['pay_btn'])){
   $otp = $_POST['otp'];
   include("conn_cha.php");
   $sql = "select * from challan_info where otp='$otp'";
   $q = mysqli_query($connection, $sql);
   $row = mysqli_num_rows($q);
   if ($row == 1) {
      $res = mysqli_fetch_assoc($q);
      echo($res['registration_no']);
      echo($res['owners_name']);
      echo($res['amount']);
      echo($res['cause']);  
      ?>
      <a href = "pay3.php"><input type="button" value="Proceed to payment"></a>
      <?php
   } else{
      ?>
      <h3>you entered wrong otp.<br>Please try again.<br></h3><h4><span>Redirecting in 3... seconds</span></h4>    
      <?php
      header("Refresh:3; pay.php");
   }
} else{
   echo "oops! theres some problem";
}
?>
</body>
</html>