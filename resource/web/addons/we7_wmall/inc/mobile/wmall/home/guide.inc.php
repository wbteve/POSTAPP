<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$config_mall = $_W['we7_wmall']['config']['mall'];
$_W['page']['title'] = $config_mall['title'];
$url = imurl('wmall/home/index');

if ($config_mall['version'] == 2) {
	$url = imurl('wmall/store/goods', array('sid' => $config_mall['default_sid']));
}
else {
	if ($config_mall['is_to_nearest_store'] == 1) {
		$url = imurl('wmall/home/near');
	}
}

$slides = sys_fetch_slide();

if (empty($slides)) {
	header('location:' . $url);
	exit();
}

include itemplate('home/guide');

?>
