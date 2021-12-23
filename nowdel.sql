/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

/* now_backupを初期化 */
truncate table haisya_info.now_backup;

