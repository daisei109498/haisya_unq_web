/* �g�p����f�[�^�x�[�X��I�� */
USE haisya_info;

#�����Shift_JIS�̃t�@�C������荞�߂�
set character_set_database=sjis;

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