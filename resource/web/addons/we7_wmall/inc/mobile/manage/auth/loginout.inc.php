<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$key = 'we7_wmall_manager_session_' . $_W['uniacid'];
isetcookie($key, '', -100);

if ($_W['ispost']) {
	imessage(error(0, '退出成功'), imurl('manage/auth/login'), 'ajax');
}

header('location:' . imurl('manage/auth/login'));
exit();

?>
