<!DOCTYPE html>
<html lang = 'en'>
<head>
   <meta charset = 'UTF-8'>
   <meta vieport display initial scale = '1.0'>
   <link href = "e_challan.css" rel = "stylesheet" type = "text/css">
   <title>E challan</title>
   <style>
      body{
         background-color: rgb(147, 183, 211);
      }
      form table{
         margin-bottom: 15px;
      }
      form table th{
         text-align: left;
         border-bottom: 1px black solid;
      }
      #table td{
         border-bottom: 1px black solid;
         margin-bottom: 10px;
      }
      form table tr td input{
         border: none;
         margin-left: 8px;
      }
      form{
         text-align: center;
         margin-top: 9%;
         margin-left: 18px;
      }
      form textarea{
         border: 1px solid blueviolet;
         border-radius: 4px;
         font-size: 100%;
         margin-bottom: 10px;
         padding: 2px 3px;
      }
      form>input{
         border: 1px solid blueviolet;
         border-radius: 4px;
         font-size: 100%;
         margin-bottom: 10px;
         padding: 2px 3px;
      }
      form button{
         border: 1px solid blueviolet;
         border-radius: 4px;
         font-size: 100%;
         padding: 2px 3px;
      }
   </style>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
   //$reg_no = $_POST['reg_no'];
   
   include("conn_cha.php");
   mysqli_select_db($connection, "e_challan");
   $reg_no = $_POST['reg_no'];
   //echo $reg_no;
   $sql = "select * from vehicle_info where registration_no = '$reg_no'";
   $q = mysqli_query($connection, $sql);
   $res = mysqli_fetch_assoc($q);
   $row = mysqli_num_rows($q);
   
   if ($row == 1) {
      
      ?>
         <div class = "container">
            <form method = "POST" action = "iss_chln.php" id = "info">
               <center>
               <table id="table">
                  <tr>
                     <th>Registration no.</th>
                     <td><input type = "text" name = "registration_no" value ="<?php echo ($res['registration_no']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>Owner's Name</th>
                     <td><input type = "text" name = "owner" value ="<?php echo ($res['owner']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>Address</th>
                     <td><input type = "text" name = "address" value ="<?php echo ($res['address']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>Make</th>
                     <td><input type = "text" name = "make" value ="<?php echo ($res['make']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>Fuel Type</th>
                     <td><input type = "text" name = "fuel_type" value ="<?php echo ($res['fuel_type']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>year</th>
                     <td><input type = "text" name = "year" value ="<?php echo ($res['year']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>Vehicle Class</th>
                     <td><input type = "text" name = "vehicle_class" value ="<?php echo ($res['vehicle_class']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>Vehicle Type</th>
                     <td><input type = "text" name = "vehicle_type" value ="<?php echo ($res['vehicle_type']); ?>" readonly></td>
                  </tr>
                  <tr>
                     <th>VIN</th>
                     <td><input type = "text" name = "VIN" value = "<?php echo ($res['VIN']); ?>" readonly></td>
                  </tr>
                  <form>
                  <tr>
                     <th>Color</th>
                     <td><input type = "text" name = "color" value = "<?php echo ($res['color']); ?>" readonly ></td>
                  </tr>
               </table>
               </center>
               <textarea id = "cause" cols=25 name = "cause" placeholder = "cause of challan"></textarea><br>
               <input id ="amount" type = "text" name = "amount" placeholder = "amount"><br>
               <button onclick="return validate()" type = "submit" name = "issue_chln">Issue Chalan</button>
            </form>
         </div>

      <?php
   } else {
      echo ("there is no vehicle with this registration number.");
   }

}else {
   echo ("error finding registration no."); 
}
?>
</body>
</html>
<script>
   function validate(){
      console.log("button pressed");
      var cause = document.getElementById('cause').value.length;
      var amount = document.getElementById('amount').value.length;
      if(cause == 0 || amount == 0){
         alert("enter all fields");
         return false;
      } else{
         return true;
      }
   }
</script>