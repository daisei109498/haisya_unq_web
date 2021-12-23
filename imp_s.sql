/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

/* haisya_info_midを初期化 */
truncate table haisya_info.haisya_info_mid;

/* haisya_info_midにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/haisya_info_s.csv" into table haisya_info.haisya_info_mid FIELDS TERMINATED by ',';

/* haisya_info_midの改行コード削除 */
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(13),"");
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(10),"");

/* m_driver_midを初期化 */
truncate table haisya_info.m_driver_mid;

/* m_driver_midにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/m_driver_s.csv" into table haisya_info.m_driver_mid FIELDS TERMINATED by ',';

/* haisya_info_backupにhaisya_infoを追加 */
INSERT INTO haisya_info.haisya_info_backup SELECT haisya_info.haisya_info.* FROM haisya_info.haisya_info WHERE CenterCd=3440 AND Left(driver,1)="d";

/* haisya_info(3440)を初期化 */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=3440 AND Left(driver,1)="d";

/* haisya_infoにhaisya_info_midを追加 */
INSERT INTO haisya_info.haisya_info SELECT haisya_info.haisya_info_mid.*
FROM haisya_info.haisya_info_mid;

/* haisya_info(3440)を初期化 */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=0;

/* m_driver_backupにm_driverを追加 */
INSERT INTO haisya_info.m_driver_backup SELECT haisya_info.m_driver.* FROM haisya_info.m_driver WHERE CenterCd=3440 AND Left(StaffCode,1)="d";

/* m_driver(3440)を初期化 */
DELETE FROM haisya_info.m_driver WHERE CenterCd=3440 AND Left(StaffCode,1)="d";

/* m_driver(3440)を初期化 */
DELETE FROM haisya_info.m_driver WHERE CenterCd=0;

/* m_driverにm_driver_midを追加 */
INSERT INTO haisya_info.m_driver SELECT haisya_info.m_driver_mid.* FROM haisya_info.m_driver_mid;
