/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

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