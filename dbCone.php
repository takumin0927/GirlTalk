<?php
function connectDB(){
		$connection = mysql_connect("mysql002.phy.lolipop.lan","LAA0364661","chiaki0927");
		if(!$connection) {
			
 	   }
		mysql_set_charset("utf8");
		if(!mysql_select_db("LAA0364661-takuminspace",$connection)) {
			 
  	  }
		return $connection;
}
?>