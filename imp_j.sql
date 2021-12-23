/* �g�p����f�[�^�x�[�X��I�� */
USE haisya_info;

#�����Shift_JIS�̃t�@�C������荞�߂�
set character_set_database=sjis;

/* nohin_fr�������� */
truncate table haisya_info.nohin_fr;

/* nohin_fr��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/�X�ܔ[�i��_�f�[�^.csv" into table haisya_info.nohin_fr FIELDS TERMINATED by ',' OPTIONALLY ENCLOSED BY '"' lines terminated by '\r\n' IGNORE 1 LINES;

/* nohin_fr�̉��s�R�[�h�폜 */
UPDATE nohin_fr SET tenban2=REPLACE (tenban2,Char(13),"");
UPDATE nohin_fr SET tenban2=REPLACE (tenban2,Char(10),"");

/* nohin_fr_backup��nohin_fr��ǉ� */
INSERT IGNORE INTO haisya_info.nohin_fr_backup SELECT haisya_info.nohin_fr.*
FROM haisya_info.nohin_fr;


/* nohin_fr�������� */
truncate table haisya_info.nohin_fr;

/* nohin_fr��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/�X�ܔ[�i��_�f�[�^2.csv" into table haisya_info.nohin_fr FIELDS TERMINATED by ',' OPTIONALLY ENCLOSED BY '"' lines terminated by '\r\n' IGNORE 1 LINES;

/* nohin_fr�̉��s�R�[�h�폜 */
UPDATE nohin_fr SET tenban2=REPLACE (tenban2,Char(13),"");
UPDATE nohin_fr SET tenban2=REPLACE (tenban2,Char(10),"");

/* nohin_fr_backup��nohin_fr��ǉ� */
INSERT IGNORE INTO haisya_info.nohin_fr_backup SELECT haisya_info.nohin_fr.*
FROM haisya_info.nohin_fr;


/* nohin_fr�������� */
truncate table haisya_info.nohin_fr;

/* nohin_fr��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/�X�ܔ[�i��_�f�[�^3.csv" into table haisya_info.nohin_fr FIELDS TERMINATED by ',' OPTIONALLY ENCLOSED BY '"' lines terminated by '\r\n' IGNORE 1 LINES;

/* nohin_fr�̉��s�R�[�h�폜 */
UPDATE nohin_fr SET tenban2=REPLACE (tenban2,Char(13),"");
UPDATE nohin_fr SET tenban2=REPLACE (tenban2,Char(10),"");

/* nohin_fr_backup��nohin_fr��ǉ� */
INSERT IGNORE INTO haisya_info.nohin_fr_backup SELECT haisya_info.nohin_fr.*
FROM haisya_info.nohin_fr;

/* nohin_yotei�������� */
truncate table haisya_info.nohin_yotei;

/* nohin_yotei��ǉ� */
INSERT IGNORE INTO nohin_yotei ( date, tenban2, nohin_yotei )
SELECT nohin_fr_backup.date, nohin_fr_backup.tenban2, Count(nohin_fr_backup.kanri_no) AS nohin_yotei
FROM nohin_fr_backup
GROUP BY nohin_fr_backup.date, nohin_fr_backup.tenban2;

/* juryo_fr_backup��nohin_yotei��C�ǉ� */
UPDATE juryo_fr_backup INNER JOIN nohin_yotei ON (juryo_fr_backup.tenban2=nohin_yotei.tenban2) AND (juryo_fr_backup.date=nohin_yotei.date) SET juryo_fr_backup.nohin_yotei = nohin_yotei.nohin_yotei;

set sql_safe_updates = 0;
/* juryo_fr_backup��nohin_yotei��C�ǉ� */
UPDATE haisya_info INNER JOIN nohin_yotei ON (haisya_info.TodokeCd=nohin_yotei.tenban2) AND (haisya_info.haisoubi=nohin_yotei.date) SET haisya_info.suryo = nohin_yotei.nohin_yotei WHERE haisya_info.suryo <> "���[";


