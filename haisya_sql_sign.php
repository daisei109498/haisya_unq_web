<?php
header("Content-type: text/html; charset=utf-8");
 
    $dsn = 'mysql:dbname=haisya_info;host=120.51.223.55;port=59371';
    $user = 'user';
    $password = 'Daiseilog7151';

try{

    $link = new PDO($dsn, $user, $password);
    if (!$link) {
        die('失敗しました'.mysql_error());
    }

	if($teisei_flg==""){
	}else{
	     $sql = "SELECT husoku_flg FROM nohin_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."' AND kanri_no='".$teisei_no."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>失敗しました</p>');
	    }else{
			foreach ( $result as $row) {
			}
			if ($teisei_flg==0){
				 $sql = "UPDATE nohin_fr_backup set husoku_flg='0' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."' AND kanri_no='".$teisei_no."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				echo "<script charset='utf-8'>alert('登録完了しました');</script>";
				echo "<script>window.location.href='./haisya.php';</script>";
			}else{
				 $sql = "UPDATE nohin_fr_backup set husoku_flg='1' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."' AND kanri_no='".$teisei_no."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);


				echo "<script>window.location.href='./haisya.php';</script>";
			}
		}	
	}

	if($kari_husoku==""){
	}else{
	     $sql = "SELECT husoku_flg FROM nohin_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."' AND kanri_no='".$teisei_no."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>失敗しました</p>');
	    }else{
			foreach ( $result as $row) {
			}
			 $sql = "UPDATE juryo_fr_backup set kari_husoku='".$kari_husoku."' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
			 $result = $link->query($sql);

				echo "<script charset='utf-8'>alert('登録完了しました');</script>";
				echo "<script>window.location.href='./haisya.php';</script>";
		}	
	}

	$sql = "SELECT * FROM nohin_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";
	$statement = $link -> query($sql);

	$row_count = $statement->rowCount();
	
	while($row0 = $statement->fetch()){
		$rows0[] = $row0;
	}


	$sql = "SELECT Count(kanri_no) AS total_su,tenban2,tenmei2,date,sum(husoku_flg) as total_husoku FROM nohin_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."' GROUP BY tenban2,tenmei2,date";
	$statement = $link -> query($sql);

	$row_count1 = $statement->rowCount();
	
	while($row1 = $statement->fetch()){
		$rows1[] = $row1;
	}
	//納品数集計
	foreach($rows1 as $row1){ 
		$nohin_su=$row1['total_su']-$row1['total_husoku'];
		$husoku_su=$row1['total_husoku'];
	} 

	if(!$img_juryo){
	}else{
	     $sql = "SELECT juryo_flg FROM juryo_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>失敗しました</p>');
	    }else{
			foreach ( $result as $row) {
			}
			if ($row['juryo_flg']==0||$row['juryo_flg']==2){
				 $sql = "UPDATE juryo_fr_backup set juryo_flg='1' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				 $sql = "UPDATE juryo_fr_backup set juryo_time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				 $sql = "UPDATE juryo_fr_backup set juryo_img ='".$img_juryo."' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				 $sql = "UPDATE juryo_fr_backup set husoku_su ='".$husoku_su."' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				 $sql = "UPDATE juryo_fr_backup set nohin_su ='".$nohin_su."' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				 $sql = "UPDATE juryo_fr_backup set nohin_yotei ='".$row1['total_su']."' WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
				 $result = $link->query($sql);

				echo "<script charset='utf-8'>alert('登録完了しました');</script>";
				echo "<script>window.location.href='./haisya.php';</script>";
			}else{
				echo "<script charset='utf-8'>alert('既に登録されています');</script>";
				echo "<script>window.location.href='./haisya.php';</script>";
			}
		}	
	}

	$sql = "SELECT Count(kanri_no) AS total_su,bumon,tenban2 FROM nohin_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."' GROUP BY bumon,tenban2";
	$statement = $link -> query($sql);

	$row_count2 = $statement->rowCount();
	
	while($row2 = $statement->fetch()){
		$rows2[] = $row2;
	}   


	$sql = "SELECT * FROM juryo_fr_backup WHERE date='".$nouhinbi."' AND tenban2='".$todoke."'";
	$statement = $link -> query($sql);

	$row_count3 = $statement->rowCount();
	
	while($row3 = $statement->fetch()){
		$rows3[] = $row3;
	}

	//ドライバー名取得
	$sql = 'SELECT * FROM m_driver WHERE m_drivercol="'.$_GET['conditions'].'"';
	$statement = $link -> query($sql);

	//レコード件数取得
	$row_count4 = $statement->rowCount();
	
	while($row4 = $statement->fetch()){
		$rows4[] = $row4;
	}

	$dbh = null;
    
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}
 
?>