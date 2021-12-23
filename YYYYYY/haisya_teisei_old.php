<!DOCTYPE html>
<html>
<head>
<title>配車情報</title>
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
<?php
date_default_timezone_set('Asia/Tokyo');
$datetime = getdate(time());
$nouhinbi = date("Y/m/d");
$todoke = $_GET['todoke'];
if (isset($_POST['save_button'])) {
$teisei_no = $_POST['teisei_no'];
$teisei_flg = $_POST['teisei_flg'];
}else{
$teisei_no = "";
$teisei_flg = "";
}
$get_dir = __FILE__; // ①
$get_dir_path =  dirname($get_dir); // ③
$thisdir = dirname($_SERVER["SCRIPT_NAME"]);		
$thisdirname = substr($thisdir, -6);

$_GET['conditions'] = $thisdirname;

include('../haisya_sql_sign.php'); 
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scale=yes, initial-scale=1.0, maximum-scale=5.0" />
<meta http-equiv="refresh" content="300" >
</head>
<body bgcolor="#F9F9F9">
	<?php 
	foreach($rows4 as $row4){
	?>
	ドライバー名：<?php echo htmlspecialchars($row4['DriverName'],ENT_QUOTES,'UTF-8'); ?>
	<?php 
	}
	?> 
	<?php 
	foreach($rows3 as $row3){
	?>
	<BR>お届け先名：<?php echo htmlspecialchars($row3['todoke'],ENT_QUOTES,'UTF-8'); ?>
	<?php 
	}
	?>
    <h3 class="title">訂正入力</h1>
	訂正管理No.<BR>
	<form action="" method="post">
	<input id="teisei_no" name="teisei_no" type="tel" value="" style="height:30px;width:250px;"/><input id="search" name="search" type="submit" value="検索" style="height:35px;width:60px;float: right;border-radius: 5px;margin-right : 30px;"/><BR>
	</form>
	<BR>
	<DIV style="width:320px;background:lightblue;">
	検索結果<BR>
	<form action="" method="post">
	<?php 
	$count = 0;
	foreach($rows0 as $row0){
    if (isset($_POST['search'])) {
		$kanri_no = str_replace("-","",$row0['kanri_no']);
		$search = mb_convert_kana($_POST["teisei_no"],"n");
		$search = str_replace("-","",$search);
		if($kanri_no == $search){
	?>
	<input id="teisei_no" name="teisei_no" type="hidden" value="<?php echo htmlspecialchars($row0['kanri_no'],ENT_QUOTES,'UTF-8'); ?>"/>
	管理No.：<?php echo htmlspecialchars($row0['kanri_no'],ENT_QUOTES,'UTF-8'); ?><BR>
	部門：<?php echo htmlspecialchars($row0['bumon'],ENT_QUOTES,'UTF-8'); ?><BR>
	代表商品：<?php echo htmlspecialchars($row0['shohin'],ENT_QUOTES,'UTF-8'); ?><BR>
	代表商品名：<?php echo htmlspecialchars($row0['shohin_nm'],ENT_QUOTES,'UTF-8'); ?><BR>
	<?php
	if($row0['husoku_flg'] == 0){
	?>
	現在の区分：正常<BR>
	<?php
	}else{
	?>
	現在の区分：不足<BR>
	<?php 
	}
	$count = $count +1;
	}}}
	if($count == 0){
	?>
	該当なし
	<?php
	}
	?>
	</DIV>
	<BR>区分<BR>
	<BR><input id="teisei_flg" name="teisei_flg" type="radio" name="kubun" value="0" checked/> 正常<BR><BR>
	<BR><input id="teisei_flg" name="teisei_flg" type="radio" name="kubun" value="1"/> 不足<BR><BR>
	<BR>
	<input id="back_button" type="button" onclick="location.href='haisya_menu.php?driver=<?php echo htmlspecialchars($_GET['driver'],ENT_QUOTES,'UTF-8'); ?>&todoke=<?php echo $_GET['todoke']?>'" value="戻る"/> 
	<input id="save_button" name="save_button" type="submit" value="訂正確定"/>
	</form>
</body>
</html>
