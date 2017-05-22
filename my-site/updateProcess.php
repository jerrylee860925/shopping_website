<?php
include ("pratyFunctions.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourstore";
$conn = new mysqli($servername, $username, $password,$dbname);
$message = "";
$itemid="";
$name="";
$category="";
$category2="";
$category3="";
$price;
$amount;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from item where itemid = '" .$_POST['deleteID']."'";
echo $sql;
$result = $conn->query($sql);
//echo mysqli_num_rows($result);
if(mysqli_num_rows($result) >0)
{
	$row = mysqli_fetch_assoc($result);
	$itemid = $row['itemid'];
	$name = $row['name'];
	$category = $row['category'];
	$category2 = $row['category2'];
	$category3 = $row['category3'];
	$price = $row['price'];
	$amount = $row['amount'];
}
else
{
	$message="no records exist";
}


topFunc("our shop");
banner("This is our shop ");
leftDiv("Please select actions");
closediv();
secondrightDivBegain();
if(strlen($message)!=0)
{
	echo '<h1>'.$message.'</h1>',"\n";	
}
else
{
	updateText("itemid","itemid",$itemid,"Name","Name",$name,"category","category",$category,"category2","category2",$category2,"category3","category3",$category3,"price","price",$price,"amount","amount",$amount,"updateProcess2.php");

}
secondrightDivEnd();
closediv();
bottom();
?>