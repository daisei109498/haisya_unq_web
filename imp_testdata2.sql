/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

/* haisya_info_midを初期化 */
truncate table haisya_info.haisya_info_mid;

/* haisya_info_midにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/haisya_info_test.csv" into table haisya_info.haisya_info_mid FIELDS TERMINATED by ',';

/* haisya_info_midの改行コード削除 */
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(13),"");
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(10),"");

/* m_driver_midを初期化 */
truncate table haisya_info.m_driver_mid;

/* m_driver_midにCSVを追加 */
load data local infile "E:/FTPRoot/haisya_dat/m_driver_test.csv" into table haisya_info.m_driver_mid FIELDS TERMINATED by ',';

/* haisya_infoにhaisya_info_midを追加 */
INSERT INTO haisya_info.haisya_info SELECT haisya_info.haisya_info_mid.*
FROM haisya_info.haisya_info_mid;

/* m_driverにm_driver_midを追加 */
INSERT INTO haisya_info.m_driver SELECT haisya_info.m_driver_mid.*
FROM haisya_info.m_driver_mid;

