/* 使用するデータベースを選択 */
USE haisya_info;

#これでShift_JISのファイルが取り込める
set character_set_database=sjis;

/* nohin_yoteiを初期化 */
truncate table haisya_info.nohin_yotei;

/* nohin_yoteiを追加 */
INSERT IGNORE INTO nohin_yotei ( date, tenban2, nohin_yotei )
SELECT nohin_fr_backup.date, nohin_fr_backup.tenban2, Count(nohin_fr_backup.kanri_no) AS nohin_yotei
FROM nohin_fr_backup
GROUP BY nohin_fr_backup.date, nohin_fr_backup.tenban2;

/* juryo_fr_backupのnohin_yoteiにC追加 */
UPDATE juryo_fr_backup INNER JOIN nohin_yotei ON (juryo_fr_backup.tenban2=nohin_yotei.tenban2) AND (juryo_fr_backup.date=nohin_yotei.date) SET juryo_fr_backup.nohin_yotei = nohin_yotei.nohin_yotei;

set sql_safe_updates = 0;
/* juryo_fr_backupのnohin_yoteiにC追加 */
UPDATE haisya_info INNER JOIN nohin_yotei ON (haisya_info.TodokeCd=nohin_yotei.tenban2) AND (haisya_info.haisoubi=nohin_yotei.date) SET haisya_info.suryo = nohin_yotei.nohin_yotei WHERE haisya_info.suryo <> "分納";


