<?php
if(isset($_POST["issue_chln"])){
   $registration_no = $_POST['registration_no'];
   $owner = $_POST['owner'];
   $address = $_POST['address'];
   $VIN = $_POST['VIN'];
   $cause = $_POST['cause'];
   $amount = $_POST['amount'];

   //send email.......
   /* 
   $to = email;
   $Sub = "Chalaan";
   $msg = "you have been fined ".$amount."\n
            cause-- ".$cause."\n".$owner."\n ".$registration_no."\n".$VIN;
   mail($to, $Sub, $msg);
   */

   //generate otp
   $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $srt_shuffle = str_shuffle($str);
   $otp = substr($srt_shuffle, 1,7);

   include("conn_cha.php");
   mysqli_select_db($connection, "e_challan");
   $sql = "insert into challan_info(registration_no, owners_name,no_of_challan ,amount, cause, OTP) values('$registration_no','$owner',3,'$amount','$cause','$otp')";
   $q = mysqli_query($connection, $sql);
   if(!$q){
      echo ("data not inserteed! Please try again");
   } else{
      ?>
      <script>
         alert("challan has been successfuly issued!!");
      </script>
      <?php
      echo("Redirecting in...2 sec");
      header('refresh:2 e_challan.php');
   }

   //API for sms...........[another page]

} else{
   echo "oops! theres some error ";
}
?>