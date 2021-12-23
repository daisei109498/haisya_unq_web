/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

# csvファイル出力
SELECT * INTO OUTFILE 'haisya_kanryo.csv' FIELDS TERMINATED BY ',' FROM haisya_info;