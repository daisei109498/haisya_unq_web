<?php
header("Content-type: text/html; charset=utf-8");
 
    $dsn = 'mysql:dbname=haisya_info;host=120.51.223.55;port=59371';
    $user = 'user';
    $password = 'Daiseilog7151';
 
try{

    $link = new PDO($dsn, $user, $password);
    if (!$link) {
        die('�ڑ����s�ł��B'.mysql_error());
    }


if(isset($_POST['nouhin'])) {
	if(!$_POST['nou']){
	    # nou�ƌ���POST�f�[�^�����M����Ă�����ȉ��̏���
	}else{
	    date_default_timezone_set('Asia/Tokyo');
	    $datetime = getdate(time());

	    //exec���\�b�h�ŃN�G�������s�Binsert�������s�����ꍇ�}���������߂�l�Ƃ��ĕԂ�
		//    $count = $link->exec("insert into haisya_info(haisoubi,driver,todoke,kanryo,time) values('2018/07/05','".$_POST['driver']."','".$_POST['nou']."','".$_POST['test']."','".date('Y/m/d H:i:s', $datetime[0])."')");
	     $sql = "SELECT kanryo FROM haisya_info WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>�������ݎ��s���܂����B�ēx�{�^���������Ă��������B</p>');
	    }else{
			// foreach���ŌJ��Ԃ��z��̒��g����s���o��
			foreach ( $result as $row) {
			}
			if (!$row){
	   		     print('<p>�������ݎ��s���܂����B�ēx�{�^���������Ă��������B</p>');

			}else{
				if ($_POST['kanryo']=='0'||$_POST['kanryo']=='2'){
					//M�h���C�o�[�ʒu���擾
				    $link = new PDO($dsn, $user, $password);
				    if (!$link) {
				        die('�ڑ����s�ł��B'.mysql_error());
				    }
					$sql = "SELECT * FROM m_driver WHERE m_drivercol='".$_GET['conditions']."'";
					$statement = $link -> query($sql);
					while($row0 = $statement->fetch()){
						$rows0[] = $row0;
					}
					 //���݈ʒu��R�t��
					 $sql = "UPDATE haisya_info set Lat ='".$rows0['Lat']."',Lng ='".$rows0['Lng']."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
		   		     //�����t���O1
					 $sql = "UPDATE haisya_info set kanryo ='1' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
				}else{
					 //�����t���O0
					 $sql = "UPDATE haisya_info set kanryo ='0' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
				}
			}
		}
	}
} else if(isset($_POST['toutyaku'])) {
	if(!$_POST['nou']){
	    # nou�ƌ���POST�f�[�^�����M����Ă�����ȉ��̏���
	}else{
	    date_default_timezone_set('Asia/Tokyo');
	    $datetime = getdate(time());

	    //exec���\�b�h�ŃN�G�������s�Binsert�������s�����ꍇ�}���������߂�l�Ƃ��ĕԂ�
		//    $count = $link->exec("insert into haisya_info(haisoubi,driver,todoke,kanryo,time) values('2018/07/05','".$_POST['driver']."','".$_POST['nou']."','".$_POST['test']."','".date('Y/m/d H:i:s', $datetime[0])."')");
	     $sql = "SELECT kanryo FROM haisya_info WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
		 $result = $link->query($sql);

	    if (!$result) {
	        print('<p>�������ݎ��s���܂����B�ēx�{�^���������Ă��������B</p>');
	    }else{
			// foreach���ŌJ��Ԃ��z��̒��g����s���o��
			foreach ( $result as $row) {
			}
			if (!$row){
	   		     print('<p>�������ݎ��s���܂����B�ēx�{�^���������Ă��������B</p>');
			}else{
				if ($_POST['kanryo']=='0'||$_POST['kanryo']=='1'){
					//M�h���C�o�[�ʒu���擾
				    $link = new PDO($dsn, $user, $password);
				    if (!$link) {
				        die('�ڑ����s�ł��B'.mysql_error());
				    }
					$sql = "SELECT * FROM m_driver WHERE m_drivercol='".$_GET['conditions']."'";
					$statement = $link -> query($sql);
					while($row0 = $statement->fetch()){
						$rows0[] = $row0;
					}
					 //���݈ʒu��R�t��
					 $sql = "UPDATE haisya_info set Lat ='".$rows0['Lat']."',Lng ='".$rows0['Lng']."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
		   		     //�����t���O1
					 $sql = "UPDATE haisya_info set kanryo ='2' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
				}else{
					 //�����t���O0
					 $sql = "UPDATE haisya_info set kanryo ='0' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
		   		     //time
					 $sql = "UPDATE haisya_info set time ='".date('Y/m/d H:i:s', $datetime[0])."' WHERE nin_no='".$_GET['conditions']."' AND todoke='".$_POST['nou']."'";//"' AND haisoubi='".date('Y/m/d', $datetime[0])."'" ;
					 // �N�G�����s�i�f�[�^���擾�j
					 $result = $link->query($sql);
				}
			}
		}
	}
} else {

}


    $link = new PDO($dsn, $user, $password);
    if (!$link) {
        die('�ڑ����s�ł��B'.mysql_error());
    }

	//�h���C�o�[�ʃO���[�s���O
	$sql = 'SELECT haisoubi,driver,driver_nm,trip,max(line_no) as total_su,CenterCd FROM haisya_info WHERE nin_no="'.$_GET['conditions'].'" group by haisoubi,driver,driver_nm,trip';
	$statement = $link -> query($sql);
	
	//���R�[�h�����擾
	$row_count = $statement->rowCount();
	
	while($row = $statement->fetch()){
		$rows[] = $row;
	}
	
	//�h���C�o�[�ʓ͂���ʃO���[�s���O
	$sql = 'SELECT haisoubi,driver,driver_nm,trip,line_no,todoke,kanryo,time,TodokeCd FROM haisya_info WHERE nin_no="'.$_GET['conditions'].'" group by haisoubi,driver,driver_nm,trip,line_no,todoke,kanryo,time,TodokeCd order by driver,line_no';
	$statement = $link -> query($sql);

	//���R�[�h�����擾
	$row_count2 = $statement->rowCount();
	
	while($row2 = $statement->fetch()){
		$rows2[] = $row2;
	}

	//�S�f�[�^���o
	$sql = 'SELECT * FROM haisya_info WHERE nin_no="'.$_GET['conditions'].'" order by driver,line_no,nin_no';
	$statement = $link -> query($sql);

	//���R�[�h�����擾
	$row_count3 = $statement->rowCount();
	
	while($row3 = $statement->fetch()){
		$rows3[] = $row3;
	}

	//�h���C�o�[���擾
	$sql = 'SELECT * FROM m_driver WHERE m_drivercol="'.$_GET['conditions'].'"';
	$statement = $link -> query($sql);

	//���R�[�h�����擾
	$row_count4 = $statement->rowCount();
	
	while($row4 = $statement->fetch()){
		$rows4[] = $row4;
	}

	//�f�[�^�x�[�X�ڑ��ؒf
	$dbh = null;
    
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}
 
?>