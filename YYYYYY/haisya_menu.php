<!DOCTYPE html>
<html>
<head>
<title>配車情報</title>
  <style>
.simple_square_btn {
	display: block;
	position: relative;
	padding: 0.8em;
	text-align: center;
	text-decoration: none;
	background: #1B1B1B;
    color: #fff;
	border:1px solid #1B1B1B;
	font-size: 15px;
	width:	300px;
	float: center;
	border-radius: 5px;
}
.simple_square_btn:hover {
	 background: #1B1B1B;
         color: #fff;
	 cursor: pointer;
	 text-decoration: none;
	border-radius: 5px;
}
</style>
<?php
date_default_timezone_set('Asia/Tokyo');
$datetime = getdate(time());
$nouhinbi = date("Y/m/d");
$todoke = $_GET['todoke'];

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
	if ($row3['juryo_flg']=="1"){
	?>
	<BR><BR><BR>
	受領済みです
	<BR><BR><BR>
	<?php }else{?>
	<BR><BR><BR>
	<input class="simple_square_btn" type="button" name="teisei" value="訂正入力" onclick="location.href='haisya_teisei.php?driver=<?php echo htmlspecialchars($_GET['driver'],ENT_QUOTES,'UTF-8'); ?>&todoke=<?php echo $_GET['todoke']?>'"><br><br>
	<input class="simple_square_btn" type="button" name="kakunin" value="受領確認" onclick="location.href='haisya_sign.php?driver=<?php echo htmlspecialchars($_GET['driver'],ENT_QUOTES,'UTF-8'); ?>&todoke=<?php echo $_GET['todoke']?>'"><br><br>
	<?php 
	}}
	?>
	<input class="simple_square_btn" type="button" name="modoru" value="戻る"  onclick="location.href='haisya.php?driver=<?php echo htmlspecialchars($_GET['driver'],ENT_QUOTES,'UTF-8'); ?>&todoke=<?php echo $_GET['todoke']?>'"><br><br>
</body>
</html>
