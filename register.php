<?php
 $err="";
 include 'db/dbconn.php';
if(isset($_POST['submit'])){
   
	    $name = $_POST['name'];
        $pet = $_POST['pet'];
        $type = $_POST['type'];
        $age = $_POST['age'];
        $mobile = $_POST['mobile'];
        $days = $_POST['days'];
        $message = $_POST['message'];

        $selectquery = "select * from regpets where name = '$name'";
        $result = mysqli_query($con, $selectquery);
        $num = mysqli_num_rows($result);

        if($num == 1){
        ?>
            <script>
                alert("Name already exist.");
                location.replace("register.html");
            </script>
        <?php
	} else {
		$insertquery = "insert into regpets(id,name,pet,type,age,mobile,days,message)
	                 values (null, '$name', '$pet','$type','$age', '$mobile', '$days', '$message')";
		$res = mysqli_query($con,$insertquery);
	}
	 if($res){
	 	?>
        <script>
                alert("Your pet registered successfully !")
                location.replace("register.html");
		</script>
		<?php
	 }else {
         echo "Not Registered";
     } 
	}
	?>
