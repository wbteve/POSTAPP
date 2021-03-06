<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        微小区
        -
        国内领先的新一代微信物业管理系统,轻松打造小区微信运营平台
    </title>
    <meta name="keywords" content="微小区,智慧小区,智慧城市" />
    <meta name="description" content="微小区,智慧小区,智慧城市" />
    <link href="./resource/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="./resource/js/app/util.js"></script>

<div class="row" style="border-top: 4px solid #44b549;background-color: #fff;border-bottom: 1px solid #d9dadc;">
    <?php  if($_W['uniacid']) { ?>
    <div class="col-xs-12 col-sm-3 col-lg-2">
        <div style="height: 60px;background: transparent url('') center center no-repeat;background-color: white;"></div>
    </div>
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <div class="navbar navbar-default" style="margin-bottom: 0px;background-color: #FFFFFF;border-color: #FFFFFF;border: 0px solid transparent;">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <?php  if($_SESSION['role']!='merchant') { ?>
                    <?php  $p74 = set('p74')?>
                    <?php  if($p74['value']) { ?><li><a href="./index.php?c=home&a=welcome&"><i class="fa fa-home"></i><?php  echo $p74['value'];?></a> </li><?php  } ?>
                    <?php  } ?>
                    <?php  if(is_array($xqmenu)) { foreach($xqmenu as $topmenus) { ?>
                    <li <?php  if($method == $topmenus['method']) { ?>class="active"<?php  } ?>><a href="<?php  echo $topmenus['url'];?>"><i class="<?php  echo $topmenus['icon'];?>"></i> <?php  echo $topmenus['title'];?></a></li>
                    <?php  } } ?>
                </ul>
                <?php  if($_SESSION['role']=='merchant') { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="javascript:;"  data-toggle="dropdown" style="display:block; max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><img src="<?php  echo tomedia($_SESSION['role_logo'])?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="30"/> <?php  echo $_SESSION['role_name'];?> </a>
                    </li>
                    <li>
                        <a href="<?php  echo web_url('user/logout');?>" style="display:block; max-width:185px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><i class="fa fa-user"></i>退出系统 </a>
                    </li>
                </ul>
                <?php  } else { ?>

                <ul class="nav navbar-nav navbar-center">
                    <!--<li class="dropdown">-->
                    <!--<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "><img src="<?php  echo tomedia('headimg_'.$_W['acid'].'.jpg')?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="30"/>  <?php  echo $_W['account']['name'];?> <b class="caret"></b></a>-->
                    <!--<ul class="dropdown-menu">-->
                    <?php  if($_W['role'] != 'operator') { ?>
                    <!--<li><a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']));?>" target="_blank"><i class="fa fa-weixin fa-fw"></i> 编辑当前账号资料</a></li>-->
                    <?php  } ?>
                    <!--<li><a href="<?php  echo url('account/display');?>" target="_blank"><i class="fa fa-cogs fa-fw"></i> 管理其它公众号</a></li>-->
                    <!--<li><a href="<?php  echo url('utility/emulator');?>" target="_blank"><i class="fa fa-mobile fa-fw"></i> 模拟测试</a></li>-->
                    <!--</ul>-->
                    <!--</li>-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" style="display:block; max-width:185px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; "> <?php  echo $_W['user']['username'];?>  <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php  if($_W['role'] == 'operator') { ?>
                            <li><a href="<?php  echo $this->createWebUrl('users',array('op'=> 'cash'))?>" target="_blank"><i class="fa fa-cogs fa-fw"></i> 我要提现</a></li>
                            <?php  } ?>

                            <li><a href="<?php  echo url('user/logout');?>"><i class="fa fa-sign-out fa-fw"></i> 退出系统</a></li>
                        </ul>
                    </li>
                </ul>
                <?php  } ?>
            </div>
        </div>
    </div>
    <?php  } ?>
</div>
<div class="container-fluid" style="margin-top: 36px;margin-bottom: 88px;">
    <?php  if(defined('IN_MESSAGE')) { ?>
    <div class="jumbotron clearfix alert alert-<?php  echo $label;?>">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-lg-2">
                <i class="fa fa-5x fa-<?php  if($label=='success') { ?>check-circle<?php  } ?><?php  if($label=='danger') { ?>times-circle<?php  } ?><?php  if($label=='info') { ?>info-circle<?php  } ?><?php  if($label=='warning') { ?>exclamation-triangle<?php  } ?>"></i>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                <?php  if(is_array($msg)) { ?>
                <h2>MYSQL 错误：</h2>
                <p><?php  echo cutstr($msg['sql'], 300, 1);?></p>
                <p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
                <?php  } else { ?>
                <h2><?php  echo $caption;?></h2>
                <p><?php  echo $msg;?></p>
                <?php  } ?>
                <?php  if($redirect) { ?>
                <p><a href="<?php  echo $redirect;?>">如果你的浏览器没有自动跳转，请点击此链接</a></p>
                <script type="text/javascript">
                    setTimeout(function () {
                        location.href = "<?php  echo $redirect;?>";
                    }, 3000);
                </script>
                <?php  } else { ?>
                <p>[<a href="javascript:history.go(-1);">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh">首页</a>]</p>
                <?php  } ?>
            </div>
            <?php  } else { ?>
            <div class="row">
                <?php $frames = empty($frames) ? $GLOBALS['frames'] : $frames; _calc_current_frames($frames);?>
                <?php  if(!empty($frames)) { ?>
                <div class="col-xs-12 col-sm-3 col-lg-2 big-menu" style="padding-right: 0px;">
                    <?php  if(is_array($frames)) { foreach($frames as $k => $frame) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" style='padding: 14px 15px;'>
                            <h4 class="panel-title"><i class="<?php  echo $frame['icon'];?>"></i>&nbsp;&nbsp;<?php  echo $frame['title'];?></h4>
                        </div>
                        <ul class="list-group collapse in" id="frame-<?php  echo $k;?>">
                            <?php  if(is_array($frame['items'])) { foreach($frame['items'] as $link) { ?>
                            <?php  if(!empty($link['append'])) { ?>
                            <li class="list-group-item <?php  echo $link['active'];?>" onclick="window.location.href = '<?php  echo $link['url'];?>';" style="cursor:pointer;padding-left: 40px;" kw="<?php  echo $link['title'];?>">
                                <?php  echo $link['title'];?>
                                <a class="pull-right" href="<?php  echo $link['append']['url'];?>"><?php  echo $link['append']['title'];?></a>
                            </li>
                            <?php  } else { ?>
                            <a class="list-group-item <?php  echo $link['active'];?>" href="<?php  echo $link['url'];?>" kw="<?php  echo $link['title'];?>" style="padding-left: 40px;"><?php  echo $link['title'];?></a>
                            <?php  } ?>
                            <?php  } } ?>
                        </ul>
                    </div>
                    <?php  } } ?>
                </div>
                <div class="col-xs-12 col-sm-9 col-lg-10">
                    <style>
                        .topNav{border-bottom-color: rgb(0, 0, 0);border-bottom-width: 0.1em;border-bottom-style: inset;}
                        .panel>.list-group .list-group-item {border-width: 0px 0;}
                        .panel-title {color: #8d8d8d;}
                        .navbar-nav>li>a {line-height: 30px;}
                        body {background: #e7e8eb;overflow-x:hidden;}
                        .list-group .list-group-item.active{background-color:#44b549;border-color:#44b549;}
                        .home .footer a:hover{color:#44b549;}
                        .nav.nav-tabs{border-color:#44b549;}
                        .nav-tabs>li>a:hover{border-color:#eee #eee #44b549 #eee;}
                        .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{background-color:#44b549; border-color:#44b549;}
                        .modal-dialog .avatar-browser{color:#44b549;}
                        .modal-dialog .avatar-browser .thumbnail:hover{border-color:#44b549;}
                        .modal-dialog .avatar-browser{color:#44b549;}
                        .modal-dialog .avatar-browser .thumbnail:hover{border-color:#44b549;}
                        .notice-show h5{color:#44b549; border-left:3px solid #44b549; padding-left:15px;}
                        .nav-tabs>li>a {color: black;border-radius: 0 0 0 0;}
                        .nav{background-color: white;}
                        #tips-container {position: fixed;top: 50%;left: 0;width: 100%;display: none;z-index: 99999;}
                        #tips-container span {display:inline-block; padding:10px 40px; background:rgba(0,0,0,0.8); color:#fff; border-radius:4px;}
                        a, a:hover, a:focus { text-decoration: none; cursor: pointer;}
                        thead {background-color: #f4f5f9;}
                        .table>thead>tr>th {border-bottom: 0px solid #ddd;}
                        /*util.popover*/
                        .mall-popover{position:absolute; top: 0; left: 0; z-index: 1060; padding: 9px 14px; text-align: left; white-space: normal; background-color: #fff; -webkit-background-clip: padding-box; background-clip: padding-box; border: 1px solid rgba(0,0,0,.2); border-radius: 6px; -webkit-box-shadow: 2px 1px 3px rgba(0,0,0,.2); box-shadow: 2px 1px 3px rgba(0,0,0,.2)}
                        .mall-popover .arrow,.mall-popover .arrow:after{width: 0; height: 0; border-style: solid; position: absolute;}
                        .mall-popover .arrow:after{content: "";}
                        .mall-popover.top .arrow,.mall-popover.top .arrow:after{border-width: 10px 8px 0 8px; border-color:rgba(0,0,0,.2) transparent  transparent transparent; left: 50%; bottom:-11px; margin-left:-9px;}
                        .mall-popover.top .arrow:after{border-top-color: #fff; left:1px; top: -12px;}
                        .mall-popover.right .arrow,.mall-popover.right .arrow:after{border-width: 8px 10px 8px 0; border-color: transparent rgba(0,0,0,.2) transparent transparent; left: -11px; top: 50%; margin-top:-8px;}
                        .mall-popover.right .arrow:after{border-right-color: #fff; left: 2px; top:0;}
                        .mall-popover.bottom .arrow,.mall-popover.bottom .arrow:after{border-width: 0 8px 10px 8px; border-color:transparent transparent rgba(0,0,0,.4) transparent; left: 50%; top:-11px; margin-left:-9px;}
                        .mall-popover.bottom .arrow:after{border-bottom-color:#fff; left:1px; top:1px;}
                        .mall-popover.left .arrow,.mall-popover.left .arrow:after{border-width: 8px 0 8px 10px; border-color: transparent transparent transparent rgba(0,0,0,.2); right:-11px; top: 50%; margin-top:-8px;}
                        .mall-popover.left .arrow:after{border-left-color: #fff; left: -12px; top: 0px;}
                        .mall-popover.top{margin-bottom:10px;}
                        .mall-popover.right{margin-left:10px;}
                        .mall-popover.bottom{margin-top:10px;}
                        .mall-popover.left{margin-right:10px;}
                        .btn.min-width {min-width: 104px;}
                        .scrollLoading{background:url(<?php echo TG_URL_WRES;?>images/loading.gif) no-repeat center center;}
                        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus {color: #f60;background-color: #e7e7e7;border-bottom: 2px solid transparent;border-color: #f60;}
                        .bs-callout{padding:20px;margin-bottom:20px;border:1px solid #eee;border-left-width:5px;border-radius:3px;background-color: white;}
                        .bs-callout h4{margin-top:0;margin-bottom:5px}
                        .bs-callout p:last-child{margin-bottom:0}
                        .bs-callout code{border-radius:3px}
                        .bs-callout+.bs-callout{margin-top:-5px}
                        .bs-callout-danger{border-left-color:#ce4844}
                        .bs-callout-danger h4{color:#ce4844}
                        .bs-callout-warning{border-left-color:#aa6708}
                        .bs-callout-warning h4{color:#aa6708}
                        .bs-callout-info{border-left-color:#1b809e}
                        .bs-callout-info h4{color:#1b809e}
                    </style>
                    <?php  } else { ?>
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <?php  } ?>
                        <?php  } ?>
