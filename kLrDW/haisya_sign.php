<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=500px initial-scale=0.64" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <title>受領サイン</title>
			<?php
		    date_default_timezone_set('Asia/Tokyo');
		    $datetime = getdate(time());
			$nouhinbi = date("Y/m/d");
			$todoke = $_GET['todoke'];
			if(isset($_POST['base64']) != ''){
			$img_juryo = $_POST['base64'];
			}else{
			$img_juryo = "";
			}
			$get_dir = __FILE__; // ①
			$get_dir_path =  dirname($get_dir); // ③
			$thisdir = dirname($_SERVER["SCRIPT_NAME"]);		
			$thisdirname = substr($thisdir, -5);

			$_GET['conditions'] = $thisdirname;
			include('../haisya_sql_sign.php'); 
		?>
        <style type="text/css">
			  .option{
			    width: 320px;
			  }
			  .color > a{
			    display: inline-block;
			    width: 20px;
			    height: 20px;
			  }
			  .black{
			    background-color: #000000;
			  }
			  .red{
			    background-color: #ff0000;
			  }
			  .blue{
			    background-color: #0000ff;
			  }
			  #delete_button{
				display: block;
				position: relative;
				padding: 0.5em;
				text-align: center;
				text-decoration: none;
				color: #1B1B1B;
				background: white;
				border:1px solid black;
				font-size: 15px;
				width:	100px;
				float: right;
				border-radius: 5px;
			  }
			  #save_button{
				display: block;
				position: relative;
				padding: 0.8em;
				text-align: center;
				text-decoration: none;
				background: #1B1B1B;
			    color: #fff;
				border:1px solid #1B1B1B;
				font-size: 15px;
				width:	150px;
				float: right;
				border-radius: 5px;
				margin-right : 30px;
			  }
			  #back_button{
				display: block;
				position: relative;
				padding: 0.8em;
				text-align: center;
				text-decoration: none;
				background: white;
			    color: #1b1b1b;
				border:1px solid #1B1B1B;
				font-size: 15px;
				width:	150px;
				float: left;
				border-radius: 5px;
			  }
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script src="haisya_sign.js"></script>
    </head>
    <body>
	<?php 
	foreach($rows3 as $row3){
	?>
	お届け先名：<?php echo htmlspecialchars($row3['todoke'],ENT_QUOTES,'UTF-8'); ?>様
	<?php 
	}
	?>

		   <div class="option"><p style="font-size: 20px;">受領サイン<input id="delete_button" type="button" value="クリア"/></p></div>
				<canvas id="canvas" width="320" height="350" style="border: solid 1px #000;box-sizing: border-box;"></canvas><BR>
				<input id="back_button" type="button" value="戻る"/> 
				<input id="save_button" type="button" value="受領確定"/>
				<input type="hidden" name="check_juryo" value="1">
				<form action="" method="post"　id="form">
				<input id="base64" name="base64" type="hidden">
				<input type="submit" id="input_submit" style="visibility: hidden;" value="送信">
　　　　　　　　</form>
    </body>
</html>



