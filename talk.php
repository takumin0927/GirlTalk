<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="js/jquery.typist.js"></script>
		<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title>Girl Talk（beta）</title>
	</head>
	<body style="margin:0; padding:0; background-image:url('images/bg.gif');">
		<div id="hedder" style="margin:0; padding:0; background-color:black; color:white; ">
		
		<?php
			
			require_once("dbCone.php");

			if(isset($_POST["name"]) && $_POST["name"] != null){
				$name = htmlspecialchars($_POST["name"]);
				echo "ようこそ、".$name."さん<a href='index.php'><input type='button' value='ログアウト' /></a>";
			}else if(isset($_GET["name"])){
				$name = $_GET["name"];
				echo "ようこそ、".$name."さん<a href='index.php'><input type='button' value='ログアウト' /></a>";
			}else{
				$name = "ゲスト";
				echo "ようこそ、ゲストさん<a href='index.php'><input type='button' value='ログアウト' /></a>";
			}
			
		?>
		</div>
	<hr />
		<form action="regist.php" method="POST">
		<div id="main" style="background-image:url('images/b01.jpg');">
			<div style="width:100%; background-image:url('images/001.png');">
			<div id="sub1" style="height:480px;">
			</div>
			<div id="sub2" style="background-image:url('images/F5.png'); filter:alpha(opacity=70); -moz-opacity:0.70; -khtml-opacity: 0.70; opacity:0.70;">
			<p><span style="font-size:large;">話す：</span><input type="text" name="comment"/><input type="submit" name="COM" value="会話する" /></p>	
			<?php
				/////////////表示/////////////////////
				//ファイル読み込み可能かテェック
					$connection = connectDB();
					if(isset($_GET["com"])){
						$com = $_GET["com"];
							$kotoba2 = "　　　".$com."";
							$koto2 = $com;	
							echo "<input type='hidden' name='talk' value='$koto2'>";
					}else{
							$kotoba2 = "　　　こんにちは";
							$koto2 = こんにちは;
					}
					$kotoba = $name;

					echo "<input type='hidden' name='user' value='$name'>";
				////////////////////////////////////////////
				$kotoba4 = 0;
				//////////////女の子データ参照//////////////
					$kaisuu = 0;
					$kotoba3 = "";
					$connection = connectDB();
					$sql = mysql_query("SELECT * FROM girl_talk where talk = '$koto2' ");
					$rows = mysql_num_rows($sql);
					if($rows){
						while($date = mysql_fetch_array($sql)){
							$kotoba3 = "　　　".$date[2]."";
						}
					}else{
							$kotoba3 = "　　　".$koto2."はわかりません。";
					}
				if($kotoba3 == "　　　".$koto2."はわかりません。"){
					$kotoba4 = 1;
					$div2="<div id='add style='margin:0 auto; padding:0 auto; '><p>わからない場合は教えてあげよう！！なんて答えて欲しいんだい？<br /><input type='text' name='AddDate' /><input type='submit' name='ADD' value='こう答えて！！！' /></p></div>";
				}
				mysql_close($connection);	
				////////////////////////////////////////////
			?>
			<input type="text" id="1" value="<?php echo $kotoba;?>" style="display:none;"/>
			<input type="text" id="2" value="<?php echo $kotoba2;?>" style="display:none;"/>
			<input type="text" id="3" value="<?php echo $kotoba3;?>" style="display:none;"/>
			<input type="text" id="4" value="<?php echo $kotoba4;?>" style="display:none;"/>
			<?php
			$div="<div id='typist'></div><span>会話をす場合は画像をクリックしてください☆</span>";
			
			echo $div;
			if($kotoba4 == 1){
				echo $div2;
			}else{
			}
			?>
		</div>
		</div>
		</div>
		</form>
	</body>
		<script type="text/javascript">
		$(function(){
			$("#sub1").hover(function() {
			$(this).next("span").animate({opacity: "show", top: "-75"}, "slow");},
			function() {
				$(this).next("span").animate({opacity: "hide", top: "-85"}, "fast");
			});
		});

		$(function () {
			var console = $('#typist').typist({
				height: 100,
				width: 1200,
				backgroundColor: "#345628f",
				textColor: "#000000",
				fontFamily: '"富士ポップ"'
			});
			
			var play = function(a,b) {
				
				console.html('');
				console.typist('speed','slow')
				.typist('echo',a)
				.typist('wait',200)
				.typist('echo',b);

			};
			var iti1 = $("#1").attr('value');
			var iti2 = $("#2").attr('value');
			play(iti1,iti2);
			$("#sub1").click(function(){
				var console = $('#typist').typist({
				height: 100,
				width: 1200,
				backgroundColor: "#ffffff",
				textColor: "#000000",
				fontFamily: '"富士ポップ"'
			});
			
			var play = function(a,b) {
				
				console.html('');
				console.typist('speed','slow')
				.typist('echo',a)
				.typist('wait',200)
				.typist('echo',b);

			};
			var iti3 = $("#3").attr('value');
			play("女の子",iti3);
			});
		});
		</script>
</html>