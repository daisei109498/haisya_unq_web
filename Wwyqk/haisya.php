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
	width:	150px;
	float: right;
	border-radius: 5px;
}
.simple_square_btn:hover {
	 background: #1B1B1B;
         color: #fff;
	 cursor: pointer;
	 text-decoration: none;
	border-radius: 5px;
}

.simple_square_btn2 {
	text-align:center;
	display: block;
	position: relative;
	padding: 0.4em;
	text-align: center;
	text-decoration: none;
	color: #1B1B1B;
	background: #fff;
	border:1px solid #1B1B1B;
	font-size: 15px;
	width:	100px;
	height:	15px;
	float: right;
	border-radius: 5px;
}
.simple_square_btn2:hover {
	 background: #1B1B1B;
         color: #fff;
	 cursor: pointer;
	 text-decoration: none;
border-radius: 5px;
}

.simple_square_btn_t {
	display: block;
	position: relative;
	padding: 0.8em;
	text-align: center;
	text-decoration: none;
	color: #1B1B1B;
	background: white;
	border:1px solid black;
	font-size: 15px;
	width:	150px;
	float: left;
border-radius: 5px;
}
.simple_square_btn_t:hover {
	color: black;
	background: white;
	 cursor: pointer;
	 text-decoration: none;
border-radius: 5px;
}

h1 {color:blue; 
line-height:1.5;
	}

.dtable_tr{ 
padding: 5px;
display: table;
width:330px; /* ブロックレベル要素全体の幅 */
background-color:white;
border-radius: 5px;
  box-shadow: 2px 2px 4px gray;
 } 

.dtable_tr_h{ 
display: table;
width:330px; /* ブロックレベル要素全体の幅 */
font-size:20px;
color:#4d4d4d;
 } 

.dtable_c_line_no{  
display: table-cell;
text-align:left;
width: 10px;
 } 

.dtable_c_todoke{  
display: table-cell;
text-align:left;
width: 330px;
 } 

.dtable_c_kanryo1{  
display: table-cell;
text-align:center;
width: 330px;
HEIGHT: 30px;
font-size: 15px;
background-color: skyblue;
padding-top:5px;
 }

.dtable_c_kanryo0{  
display: table-cell;
text-align:center;
width: 330px;
HEIGHT: 30px;
font-size: 15px;
background-color: #aaa;
padding-top:5px;
 }

.dtable_c_kanryo2{  
display: table-cell;
text-align:center;
width: 330px;
HEIGHT: 30px;
font-size: 15px;
background-color: lightyellow;
padding-top:5px;
 }

.dtable_c_time{  
border: none;
display: table-cell;
text-align:left;
width: 300px;
 } 

  </style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scale=yes, initial-scale=1.0, maximum-scale=5.0" />
<meta http-equiv="refresh" content="300" >
<?php 
	//デバイス判定
	function ua_smt (){
	//ユーザーエージェントを取得
	$ua = $_SERVER['HTTP_USER_AGENT'];
	//スマホと判定する文字リスト
	$ua_list = array('iPhone','iPad','iPod');
	 foreach ($ua_list as $ua_smt) {
	//ユーザーエージェントに文字リストの単語を含む場合はTRUE、それ以外はFALSE
	  if (strpos($ua, $ua_smt) !== false) {
	   return true;
	  }
	 } return false;
	}

	$get_dir = __FILE__; // ①
	$get_dir_path =  dirname($get_dir); // ③
	$thisdir = dirname($_SERVER["SCRIPT_NAME"]);		
	$thisdirname = substr($thisdir, -5);

	$_GET['conditions'] = $thisdirname;

	date_default_timezone_set('Asia/Tokyo');
	$datetime = getdate(time());
	$nouhinbi = date("Y/m/d");

	include('../haisya_sql_test.php'); 
?>
</head>
<body bgcolor="#F9F9F9">
    <script>
		  android.sendString("0488726851");
		  android.sendMail("s_dejima@daiseilog.co.jp");
	function calltel() {
          window.webkit.messageHandlers.telcallbackHandler.postMessage("0488726851");
          window.webkit.messageHandlers.mailcallbackHandler.postMessage("s_dejima@daiseilog.co.jp");
	}
    function OnButtonClick(msg_tdk){
          window.webkit.messageHandlers.telcallbackHandler.postMessage("0488726851");
          window.webkit.messageHandlers.mailcallbackHandler.postMessage("s_dejima@daiseilog.co.jp");
         window.webkit.messageHandlers.callbackHandler.postMessage(msg_tdk);
	}
    </script>
<?php 
$count_no = 1;
$count_col = 1;
foreach($rows as $row){
	if ($count_col==4){
	?>
	<BR>
	<?php
		$count_col = 2;
	}else{
		$count_col = $count_col+1;
	}
?>
	<div class="dtable_tr_h"><?php echo htmlspecialchars($row['driver_nm'],ENT_QUOTES,'UTF-8'); ?><BR><?php echo htmlspecialchars($row['haisoubi'],ENT_QUOTES,'UTF-8'); ?>　trip:<?php echo htmlspecialchars($row['trip'],ENT_QUOTES,'UTF-8'); ?></div>
	<?php 
	foreach($rows2 as $row2){
	?> 
		<?php
		if ($row2['driver']==$row['driver']){
			if ($row2['driver_nm']==$row['driver_nm']){
				if ($row2['trip']==$row['trip']){
		?>
		<div class="dtable_tr">
			<div class="dtable_c_line_no">
			<b><font color ="#6b73b3" size ="4"><?php echo htmlspecialchars($count_no,ENT_QUOTES,'UTF-8'); ?>.</font></b>
			</div>
	    	<form action="" method="post">
			<div class="dtable_c_todoke">
			<?php
				if (substr($row2['driver'],0,1) == "k") {
						$mail="mailto:s_dejima@daiseilog.co.jp";
					}else{
						$mail="mailto:s_dejima@daiseilog.co.jp";
					}
			?>
			<?php 
				if (ua_smt() == true) { 
					 //iosの場合の処理
			?>
					<input class="simple_square_btn2" type="button" value="メール送信" onclick="OnButtonClick('<?php echo htmlspecialchars($row2['todoke'],ENT_QUOTES,'UTF-8'); ?>');" style="height:25px;">
			<?php				} else {
					//それ以外の場合の処理
					$url　= 'http://localhost/';
					$mailer = "";
					$mailer = $mailer . '<a class="simple_square_btn2" href="';
					$mailer = $mailer . $mail;
					$mailer = $mailer . '?subject='.$row2['todoke'];
					$mailer = $mailer . '&amp;body='.$row2['driver_nm'].urlencode(mb_convert_encoding($url,"sjis")).'"';
					$mailer = $mailer . '>メール送信';
					$mailer = $mailer . '</a>';
					print ($mailer);
				}
			?>
				<input type="hidden" name="nou" value="<?php echo htmlspecialchars($row2['todoke'],ENT_QUOTES,'UTF-8'); ?>">
				<b><font color ="#6b73b3" size ="4"><?php echo htmlspecialchars($row2['todoke'],ENT_QUOTES,'UTF-8'); ?></font></b>
				<br>
					<?php 
					foreach($rows3 as $row3){
					?> 
						<?php
						if ($row3['driver']==$row['driver']){
							if ($row3['driver_nm']==$row['driver_nm']){
								if ($row3['trip']==$row['trip']){
									if ($row3['line_no']==$row2['line_no']){
										if ($row3['todoke']==$row2['todoke']){
										?>
										<?php 
										foreach($rows5 as $row5){
										if ($row5['juryo_flg']=="1"){
										if ($row5['tenban2']==$row2['TodokeCd']){
										?>
										総納品数:<?php echo htmlspecialchars($row5['nohin_su'],ENT_QUOTES,'UTF-8'); ?>
										(納<?php echo $row5['nohin_su']-$row5['husoku_su'];?>/不<?php echo $row5['husoku_su'];?>)
										<?php }}else{
										if ($row5['tenban2']==$row2['TodokeCd']){
										?>
										総納品数:<?php echo htmlspecialchars($row5['nohin_su'],ENT_QUOTES,'UTF-8'); ?>
										<?php }}}?>
										<?php 
										}else{}
									}else{}
								}else{}
							}else{}
						}else{}
						?>
					<?php }?>
				<BR>
				<input type="hidden" name="kanryo" value="<?php echo htmlspecialchars($row2['kanryo'],ENT_QUOTES,'UTF-8'); ?>">
				<?php 
				if ($row2['kanryo']==1){
				?>
				<div class="dtable_c_kanryo1">
				<?php echo htmlspecialchars("完了",ENT_QUOTES,'UTF-8'); ?>
				<?php }else{ ?>
				<?php 
				if ($row2['kanryo']==2){
				?>
				<div class="dtable_c_kanryo2">
				<?php echo htmlspecialchars("到着",ENT_QUOTES,'UTF-8'); ?>
				<?php }else{ ?>
				<div class="dtable_c_kanryo0">
				<?php echo htmlspecialchars("未完了",ENT_QUOTES,'UTF-8'); ?>
				<?php }?>
				<?php }?>
				</div>
				<div class="dtable_c_time" style="float:left;">
			<?php 
				if (substr($row2['time'],1) == 0) { 
			?>
				更新日時：
			<?php
			} else {
			?>
				更新日時：<?php echo htmlspecialchars($row2['time'],ENT_QUOTES,'UTF-8'); ?>
			<?php }?>
				<BR><B>備考：納品時間注意!!</B>
				<BR>
				</div>
				<?php 
				if ($row2['kanryo']==1){
				?>
				<input class="simple_square_btn_t" type="submit" name="toutyaku" value="やり直し">
				<?php }else{ ?>
				<?php 
				if ($row2['kanryo']==2){
				?>
				<input class="simple_square_btn_t" type="submit" name="toutyaku" value="完了">
				<?php }else{ ?>
				<input class="simple_square_btn_t" type="submit" name="toutyaku" value="到着">
				<?php }}?>
				<input class="simple_square_btn" type="button" name="nouhin" value="受領確認" onclick="location.href='haisya_menu.php?driver=<?php echo htmlspecialchars($_GET['conditions'],ENT_QUOTES,'UTF-8'); ?>&todoke=<?php echo $row2['TodokeCd']?>'">  <br>
			</div>
			</form>
		</div>
		<?php
		$count_no=$count_no+1;
		}else{}
		}else{}
		}else{}
		?>
	<?php 
	} 
	?>
<?php 
} 
?>
</body>
</html>
