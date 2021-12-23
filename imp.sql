/* �g�p����f�[�^�x�[�X��I�� */
USE haisya_info;

#�����Shift_JIS�̃t�@�C������荞�߂�
set character_set_database=sjis;

/* haisya_info_mid�������� */
truncate table haisya_info.haisya_info_mid;

/* haisya_info_mid��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/haisya_info.csv" into table haisya_info.haisya_info_mid FIELDS TERMINATED by ',';

/* haisya_info_mid�̉��s�R�[�h�폜 */
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(13),"");
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(10),"");

/* haisya_info_mid�̉��s�R�[�h�폜 */
UPDATE haisya_info_mid SET csv_truck_no=REPLACE (csv_truck_no,Char(13),"");
UPDATE haisya_info_mid SET csv_truck_no=REPLACE (csv_truck_no,Char(10),"");

/* m_driver_mid�������� */
truncate table haisya_info.m_driver_mid;

/* m_driver_mid��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/m_driver.csv" into table haisya_info.m_driver_mid FIELDS TERMINATED by ',';

/* haisya_info_backup��haisya_info��ǉ� */
INSERT INTO haisya_info.haisya_info_backup SELECT haisya_info.haisya_info.*
FROM haisya_info.haisya_info WHERE CenterCd=3440;

/* haisya_info_backup��haisya_info��ǉ� */
INSERT INTO haisya_info.haisya_info_backup SELECT haisya_info.haisya_info.*
FROM haisya_info.haisya_info WHERE CenterCd=8000;

/* haisya_info(3440)�������� */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=3440;

/* haisya_info(8000)�������� */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=8000;

/* haisya_info��haisya_info_mid��ǉ� */
INSERT INTO haisya_info.haisya_info SELECT haisya_info.haisya_info_mid.*
FROM haisya_info.haisya_info_mid;

/* haisya_info(3440)�������� */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=0;

/* m_driver_backup��m_driver��ǉ� */
INSERT INTO haisya_info.m_driver_backup SELECT haisya_info.m_driver.*
FROM haisya_info.m_driver;

/* m_driver(3440)�������� */
DELETE FROM haisya_info.m_driver WHERE CenterCd=3440;

/* m_driver(8000)�������� */
DELETE FROM haisya_info.m_driver WHERE CenterCd=8000;


/* m_driver(3440)�������� */
DELETE FROM haisya_info.m_driver WHERE CenterCd=0;

/* m_driver��m_driver_mid��ǉ� */
INSERT INTO haisya_info.m_driver SELECT haisya_info.m_driver_mid.*
FROM haisya_info.m_driver_mid;

/* juryo_fr�������� */
truncate table haisya_info.juryo_fr;

/* juryo_fr��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/juryo.csv" into table haisya_info.juryo_fr FIELDS TERMINATED by ',';

/* juryo_fr�̉��s�R�[�h�폜 */
UPDATE juryo_fr SET tenban2=REPLACE (tenban2,Char(13),"");
UPDATE juryo_fr SET tenban2=REPLACE (tenban2,Char(10),"");

/* juryo_fr_backup��juryo_fr��ǉ� */
INSERT IGNORE INTO haisya_info.juryo_fr_backup SELECT haisya_info.juryo_fr.*
FROM haisya_info.juryo_fr;
