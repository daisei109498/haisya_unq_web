/* �g�p����f�[�^�x�[�X��I�� */
USE haisya_info;

#�����Shift_JIS�̃t�@�C������荞�߂�
set character_set_database=sjis;

# csv�t�@�C���o��
SELECT * INTO OUTFILE 'haisya_kanryo.csv' FIELDS TERMINATED BY ',' FROM haisya_info;