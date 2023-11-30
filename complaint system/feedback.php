<?php
$fname=$_FILES["f2"]["name"];
$uploaddir = './uploads/'.$fname;

$target_file = $uploaddir . basename($_FILES["f2"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES['f2']['tmp_name'],$uploaddir);


$cat=$_POST['category'];
$subcat=$_POST['subcategory'];
$nature=$_POST['nature'];
$comp=$_POST['comp'];
$date= date("F j, Y, g:i a"); 


$servername='localhost';
$username='root';
$password='Vaishnavi@123';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname,"3307");
if($conn)
{
	
	$query1="SELECT * FROM `userlogininfo`";
	$result=mysqli_query($conn,$query1);
	if($result)
	{
		
		while($row=mysqli_fetch_assoc($result))
		{
			$user=$row['user'];
		}
	}	
	
	$pend='1';
	$query2="INSERT INTO `feedback`(`subject`, `leveloffeedback`, `reason`) VALUES 
	('$user','$cat','$subcat','$nature','$comp','$uploaddir','$pend','$date')";

	$result=mysqli_query($conn,$query2);
		
	if($result)
	{
		
		echo "<script>window.location.assign('afterlogin.php');</script>";
		
	}
}
?>
