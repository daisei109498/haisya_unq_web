<?php
header("Content-type: text/html; charset=utf-8");
 
    $dsn = 'mysql:dbname=haisya_info;host=120.51.223.55;port=59371';
    $user = 'user';
    $password = 'Daiseilog7151';
 
try{

    $link = new PDO($dsn, $user, $password);
    if (!$link) {
        die('接続失敗です。'.mysql_error());
    }


if(isset($_POST['nouhin'])) {
	if(!$_POST['nou']){
	    # nouと言うPOSTデータが送信されてきたら以下の処理
	}else{
	    date_default_timezone_set('Asia/Tokyo');
	    $datetime = getdate(time());

	    //execメソッドでクエリを実行。insert文を実行した場合挿入件数が戻り値として返る
		//    $count = $link->exec("insert into haisya_info(haisoubi,driver,todoke,kanryo,time) values('2018/07/05','".$_POST['driver']."','".$_POST['nou']."','".$_POST['test']."','".date('Y/m/d H:i:s', $datetime[0])."')");
	     $sql = "SELECT kanryo FROM haisya_info WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>書き込み失敗しました。再度ボタンを押してください。</p>');
	    }else{
			// foreach文で繰り返し配列の中身を一行ずつ出力
			foreach ( $result as $row) {
			}
			if (!$row){
	   		     print('<p>書き込み失敗しました。再度ボタンを押してください。</p>');

			}else{
				if ($_POST['kanryo']=='0'||$_POST['kanryo']=='2'){
					//Mドライバー位置情報取得
				    $link = new PDO($dsn, $user, $password);
				    if (!$link) {
				        die('接続失敗です。'.mysql_error());
				    }
					$sql = "SELECT * FROM m_driver WHERE m_drivercol='".$_GET['conditions']."'";
					$statement = $link -> query($sql);
					while($row0 = $statement->fetch()){
						$rows0[] = $row0;
					}
					 //現在位置を紐付け
					 $sql = "UPDATE haisya_info set Lat ='".$rows0['Lat']."',Lng ='".$rows0['Lng']."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
		   		     //完了フラグ1
					 $sql = "UPDATE haisya_info set kanryo ='1' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
				}else{
					 //完了フラグ0
					 $sql = "UPDATE haisya_info set kanryo ='0' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
				}
			}
		}
	}
} else if(isset($_POST['toutyaku'])) {
	if(!$_POST['nou']){
	    # nouと言うPOSTデータが送信されてきたら以下の処理
	}else{
	    date_default_timezone_set('Asia/Tokyo');
	    $datetime = getdate(time());

	    //execメソッドでクエリを実行。insert文を実行した場合挿入件数が戻り値として返る
		//    $count = $link->exec("insert into haisya_info(haisoubi,driver,todoke,kanryo,time) values('2018/07/05','".$_POST['driver']."','".$_POST['nou']."','".$_POST['test']."','".date('Y/m/d H:i:s', $datetime[0])."')");
	     $sql = "SELECT kanryo FROM haisya_info WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>書き込み失敗しました。再度ボタンを押してください。</p>');
	    }else{
			// foreach文で繰り返し配列の中身を一行ずつ出力
			foreach ( $result as $row) {
			}
			if (!$row){
	   		     print('<p>書き込み失敗しました。再度ボタンを押してください。</p>');
			}else{
				if ($_POST['kanryo']=='0'||$_POST['kanryo']=='1'){
					//Mドライバー位置情報取得
				    $link = new PDO($dsn, $user, $password);
				    if (!$link) {
				        die('接続失敗です。'.mysql_error());
				    }
					$sql = "SELECT * FROM m_driver WHERE m_drivercol='".$_GET['conditions']."'";
					$statement = $link -> query($sql);
					while($row0 = $statement->fetch()){
						$rows0[] = $row0;
					}
					 //現在位置を紐付け
					 $sql = "UPDATE haisya_info set Lat ='".$rows0['Lat']."',Lng ='".$rows0['Lng']."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
		   		     //完了フラグ1
					 $sql = "UPDATE haisya_info set kanryo ='2' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
				}else{
					 //完了フラグ0
					 $sql = "UPDATE haisya_info set kanryo ='0' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // クエリ実行（データを取得）
					 $result = $link->query($sql);
				}
			}
		}
	}
} else {

}


    $link = new PDO($dsn, $user, $password);
    if (!$link) {
        die('接続失敗です。'.mysql_error());
    }

	//ドライバー別グルーピング
	$sql = 'SELECT haisoubi,driver,driver_nm,trip,max(line_no) as total_su,CenterCd FROM haisya_info WHERE nin_no="'.$_GET['conditions'].'" group by haisoubi,driver,driver_nm,trip';
	$statement = $link -> query($sql);
	
	//レコード件数取得
	$row_count = $statement->rowCount();
	
	while($row = $statement->fetch()){
		$rows[] = $row;
	}
	
	//ドライバー別届け先別グルーピング
	$sql = 'SELECT haisoubi,driver,driver_nm,trip,line_no,todoke,kanryo,time,TodokeCd FROM haisya_info WHERE nin_no="'.$_GET['conditions'].'" group by haisoubi,driver,driver_nm,trip,line_no,todoke,kanryo,time,TodokeCd order by driver,line_no';
	$statement = $link -> query($sql);

	//レコード件数取得
	$row_count2 = $statement->rowCount();
	
	while($row2 = $statement->fetch()){
		$rows2[] = $row2;
	}

	//全データ抽出
	$sql = 'SELECT * FROM haisya_info WHERE nin_no="'.$_GET['conditions'].'" order by driver,line_no,nin_no';
	$statement = $link -> query($sql);

	//レコード件数取得
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

	//データベース接続切断
	$dbh = null;
    
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}
 
?>