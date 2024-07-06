<?php
 $err="";
 include 'db/dbconn.php';
if(isset($_POST['submit'])){
   
	    $name = $_POST['name'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $selectquery = "select * from volunteers where name = '$name'";
        $result = mysqli_query($con, $selectquery);
        $num = mysqli_num_rows($result);

        if($num == 1){
        ?>
            <script>
                alert("Name already exist.");
                location.replace("get-involved.html");
            </script>
        <?php
	} else {
		$insertquery = "insert into volunteers(id,name,lname,email,message)
	                 values (null, '$name', '$lname','$email','$message')";
		$res = mysqli_query($con,$insertquery);
	}
	 if($res){
	 	?>
        <script>
                alert("Your involvement registered successfully !")
                location.replace("get-involved.html");
		</script>
		<?php
	 }else {
         echo "Not Registered";
     } 
	}
	?>
