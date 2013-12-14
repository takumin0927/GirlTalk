<?php
if(isset($_POST['COM'])){
	$flag = $_POST['comment'];
	$name = $_POST["user"];
	if($flag != null){
		header("Location:talk.php?name=".$name."&com=".$flag."");
	}else{
		header("Location:talk.php?name=".$name."&com=commentは必須入力です。");
	}
}
////////////////////////////////////////////////////////
////////////覚えさせる言葉//////////////////////////////

if(isset($_POST['ADD'])){
	$flag = $_POST["AddDate"];
	$talk = $_POST["talk"];
	$name = $_POST["user"];
	require_once("dbCone.php");
	$connection = connectDB();
	if($flag!=null){
		mysql_query("INSERT INTO girl_talk (talk,girl) VALUES ('$talk','$flag')");
		mysql_close($connection);
		header("Location:talk.php?name=".$name."&com=".$talk."");
	}else{

		header("Location:talk.php?name=".$name."&com=".$talk."");
	}
}
?>