/* �g�p����f�[�^�x�[�X��I�� */
USE haisya_info;

#�����Shift_JIS�̃t�@�C������荞�߂�
set character_set_database=sjis;

/* haisya_info_mid�������� */
truncate table haisya_info.haisya_info_mid;

/* haisya_info_mid��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/haisya_info_s.csv" into table haisya_info.haisya_info_mid FIELDS TERMINATED by ',';

/* haisya_info_mid�̉��s�R�[�h�폜 */
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(13),"");
UPDATE haisya_info_mid SET jusyo=REPLACE (jusyo,Char(10),"");

/* m_driver_mid�������� */
truncate table haisya_info.m_driver_mid;

/* m_driver_mid��CSV��ǉ� */
load data local infile "E:/FTPRoot/haisya_dat/m_driver_s.csv" into table haisya_info.m_driver_mid FIELDS TERMINATED by ',';

/* haisya_info_backup��haisya_info��ǉ� */
INSERT INTO haisya_info.haisya_info_backup SELECT haisya_info.haisya_info.* FROM haisya_info.haisya_info WHERE CenterCd=3440 AND Left(driver,1)="d";

/* haisya_info(3440)�������� */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=3440 AND Left(driver,1)="d";

/* haisya_info��haisya_info_mid��ǉ� */
INSERT INTO haisya_info.haisya_info SELECT haisya_info.haisya_info_mid.*
FROM haisya_info.haisya_info_mid;

/* haisya_info(3440)�������� */
DELETE FROM haisya_info.haisya_info WHERE CenterCd=0;

/* m_driver_backup��m_driver��ǉ� */
INSERT INTO haisya_info.m_driver_backup SELECT haisya_info.m_driver.* FROM haisya_info.m_driver WHERE CenterCd=3440 AND Left(StaffCode,1)="d";

/* m_driver(3440)�������� */
DELETE FROM haisya_info.m_driver WHERE CenterCd=3440 AND Left(StaffCode,1)="d";

/* m_driver(3440)�������� */
DELETE FROM haisya_info.m_driver WHERE CenterCd=0;

/* m_driver��m_driver_mid��ǉ� */
INSERT INTO haisya_info.m_driver SELECT haisya_info.m_driver_mid.* FROM haisya_info.m_driver_mid;
