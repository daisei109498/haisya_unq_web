/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

/* haisya_info_midを初期化 */
truncate table haisya_info.haisya_info_mid;

/* haisya_info_midにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/haisya_info.csv" into table haisya_info.haisya_info_mid FIELDS TERMINATED by ',';

/* haisya_info_midの改行コード削除 */
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(13),"");
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(10),"");

/* haisya_info_midの改行コード削除 */
UPDATE haisya_info_mid SET csv_truck_no=REPLACE (csv_truck_no,Char(13),"");
UPDATE haisya_info_mid SET csv_truck_no=REPLACE (csv_truck_no,Char(10),"");

/* m_driver_midを初期化 */
truncate table haisya_info.m_driver_mid;

/* m_driver_midにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/m_driver.csv" into table haisya_info.m_driver_mid FIELDS TERMINATED by ',';

/* haisya_info_backupにhaisya_infoを追加 */
INSERT INTO haisya_info.haisya_info_backup SELECT haisya_info.haisya_info.*
FROM haisya_info.haisya_info WHERE CenterCd=3440;

/* haisya_info_backupにhaisya_infoを追加 */
INSERT INTO haisya_info.haisya_info_backup SELECT haisya_info.haisya_info.*
FROM haisya_info.haisya_info WHERE CenterCd=8000;

/* haisya_info(3440)を初期化 */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=3440;

/* haisya_info(8000)を初期化 */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=8000;

/* haisya_infoにhaisya_info_midを追加 */
INSERT INTO haisya_info.haisya_info SELECT haisya_info.haisya_info_mid.*
FROM haisya_info.haisya_info_mid;

/* haisya_info(3440)を初期化 */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=0;

/* m_driver_backupにm_driverを追加 */
INSERT INTO haisya_info.m_driver_backup SELECT haisya_info.m_driver.*
FROM haisya_info.m_driver;

/* m_driver(3440)を初期化 */
DELETE FROM haisya_info.m_driver WHERE CenterCd=3440;

/* m_driver(8000)を初期化 */
DELETE FROM haisya_info.m_driver WHERE CenterCd=8000;


/* m_driver(3440)を初期化 */
DELETE FROM haisya_info.m_driver WHERE CenterCd=0;

/* m_driverにm_driver_midを追加 */
INSERT INTO haisya_info.m_driver SELECT haisya_info.m_driver_mid.*
FROM haisya_info.m_driver_mid;

/* juryo_frを初期化 */
truncate table haisya_info.juryo_fr;

/* juryo_frにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/juryo.csv" into table haisya_info.juryo_fr FIELDS TERMINATED by ',';

/* juryo_frの改行コード削除 */
UPDATE juryo_fr SET tenban2=REPLACE (tenban2,Char(13),"");
UPDATE juryo_fr SET tenban2=REPLACE (tenban2,Char(10),"");

/* juryo_fr_backupにjuryo_frを追加 */
INSERT IGNORE INTO haisya_info.juryo_fr_backup SELECT haisya_info.juryo_fr.*
FROM haisya_info.juryo_fr;
