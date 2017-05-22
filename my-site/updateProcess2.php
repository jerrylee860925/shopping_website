<?php

include ("pratyFunctions.php");
$error_message1 = "";
$error_message2 = "";
$error_message3 = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourstore";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE item SET ";//lastname;='Doe' WHERE id=2";
$itemid = $_POST['itemid'];
$name = $_POST['Name'];
$category = $_POST['category']; 
$category2= $_POST['category2'];
$category3= $_POST['category3'];
$price= $_POST['price'];
$amount= $_POST['amount'];
if(!is_numeric($price))
{
	$error_message1 =  "price needs to be a number ";
}
if(!is_numeric($amount))
{
	$amount = intval($amount);  
	if(is_int($amount))
	{
		$error_message2 = "amount needs to be an integer ";
	}
}
if(strlen($error_message1)==0 &&strlen($error_message2)==0 )
{
	$sql = $sql."name = '".$name."' , category = '".$category."' , category2 = '".$category2."' , category3 = '".$category3."' , price = ".$price." , amount = ".$amount." where itemid = '".$itemid."'";
	echo $sql;
	if ($conn->query($sql) == TRUE) {
    	$error_message3= "record successfully updated ";
	} else {
    	$error_message3= "Error: " . $sql . "<br>" . $conn->error;
	}	
}
topFunc("our shop");
banner("This is our shop ");
leftDiv("Please select actions");
closediv();
secondrightDivBegain();
if(strlen($error_message1)!=0)
{
	echo '<h1>'.$error_message1.'</h1>',"\n";
	echo "<br/>";
}
if(strlen($error_message2)!=0)
{
	echo '<h1>'.$error_message2.'</h1>',"\n";
	echo "<br/>";
}
if(strlen($error_message3)!=0)
{
	echo '<h1>'.$error_message3.'</h1>',"\n";
	echo "<br/>";
}
secondrightDivEnd();
closediv();
bottom();
?>