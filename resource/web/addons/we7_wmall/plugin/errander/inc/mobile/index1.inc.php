<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$_W['page']['title'] = '跑腿';
$id = 3;
$diypage = pdo_fetch('SELECT * FROM ' . tablename('tiny_wmall_errander_diypage') . ' WHERE id = :id and uniacid = :uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
$diypage['data'] = json_decode(base64_decode($diypage['data']), true);
include itemplate('index1');

?>
