/* �g�p����f�[�^�x�[�X��I�� */
USE haisya_info;

#�����Shift_JIS�̃t�@�C������荞�߂�
set character_set_database=sjis;
set sql_safe_updates = 0;

/* juryo_fr_backup��nohin_yotei��C�ǉ� */
UPDATE haisya_info INNER JOIN nohin_yotei ON (haisya_info.TodokeCd=nohin_yotei.tenban2) AND (haisya_info.haisoubi=nohin_yotei.date) SET haisya_info.suryo = nohin_yotei.nohin_yotei
WHERE haisya_info.suryo <> "���[";


