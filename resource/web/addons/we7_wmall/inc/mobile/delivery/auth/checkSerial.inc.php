<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$_W['page']['title'] = '输入序列号';
$config_mall = $_W['we7_wmall']['config']['mall'];
include itemplate('auth/checkSerial');

?>
