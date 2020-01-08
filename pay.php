<!doctype html>
<html>
<head>
<title>e-challan payment</title>
<meta charset='utf-8'>
<style>
   body{
      
   }
</style>
</head>
<body>
<h3>Welcome to the e challan payment portal</h3>
<?php
?>
<form method = "POST" action = "pay2.php">
   <input type="text" id = "otp" name = "otp" placeholder = "enter 7 digit otp">
   <br><div id = "error" style="color:red"></div>
   <button onclick = "return vali()" type = "submit" name = "pay_btn">View challan</button>
   <!-- <button><a style="text-decoration:none" href="pay.php?verify=">proceed</a></button> -->
</form>
<?php
?>
</body>
</html>
<script>
function vali(){
   var otp = document.getElementById('otp').value.length;
   if(otp!=7){
      document.getElementById('error').innerHTML="enter valid otp";
      return false; 
   } else{
      console.log("validated");
      return true;
   }
}
</script>