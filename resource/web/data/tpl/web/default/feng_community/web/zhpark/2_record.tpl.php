<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('web/common/header-base', TEMPLATE_INCLUDEPATH));?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>车辆延期记录</h5>
                    <h5 style="float: right"><a class="glyphicon glyphicon-refresh" href="<?php  echo $this->createWebUrl('zhpark',array('op' => 'record'))?>"></a></h5>
                </div>
                <div class="ibox-content">
                    <form action="./index.php" method="get" class="form-horizontal" role="form">
                        <input type="hidden" name="c" value="site" />
                        <input type="hidden" name="a" value="entry" />
                        <input type="hidden" name="m" value="<?php  echo $this->module['name']?>" />
                        <input type="hidden" name="do" value="zhpark" />
                        <input type="hidden" name="op" value="record" />
                    <div class="row">
                        <div class="col-sm-6 m-b-xs">
                            <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="输入订单号">
                        </div>
                        <div class="col-sm-6 m-b-xs">
                            <div class="input-group">
                                <select name="enable" class="form-control">
                                    <option>选择延期方式</option>
                                    <option value="1">线上延期</option>
                                    <option value="2">线下延期</option>
                                </select>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"> 搜索</button>
                                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                                </span>
                            </div>
                        </div>
                    </div>
                    </form>
        <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:30px;">ID</th>
                    <th>订单号</th>
                    <th>车牌号</th>
                    <th>充值月数</th>
                    <th>金额</th>
                    <th>延期方式</th>
                    <th>支付状态</th>
                    <th>同步状态</th>
                    <th>缴费时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['park_serial'];?></td>
                    <td><?php  echo $item['car_no'];?></td>
                    <td><?php  echo $item['num'];?>月</td>
                    <td><?php  echo $item['pay_fee'];?></td>
                    <td>
                        <?php  if($item['enable'] == 1) { ?>
                        <span class="label label-info">在线延期</span>
                        <?php  } else if($item['enable'] == 2) { ?>
                        <span class="label label-warning">线下延期</span>
                        <?php  } ?>
                    </td>
                    <td>
                        <?php  if($item['status']) { ?>
                        <span class="label label-success">支付成功</span>
                        <?php  } else { ?>
                        <span class="label label-default">未支付</span>
                        <?php  } ?>
                    </td>
                    <td>
                        <?php  if($item['code']) { ?>
                        <span class="label label-primary">同步成功</span>
                        <?php  } else { ?>
                        <span class="label label-default">未同步</span>
                        <?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['toll_date']);?></td>
                    <td>
                        <?php  if($item['status']&&empty($item['code'])) { ?>
                        <span>
                            <a href="<?php  echo $this->createWebUrl('zhpark',array('op' => 'record','operation' => 'cloud','id' => $item['id']))?>" title="手动同步" class="btn btn-primary btn-sm" >手动同步</a>
						</span>
                        <?php  } else { ?>
                        <span>暂无同步</span>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <table class="footable table table-stripped toggle-arrow-tiny footable-loaded tablet breakpoint">
                <thead>
                <?php  if($list) { ?>
                <tr>
                    <td class="footable-visible"><ul class="pagination pull-right"><?php  echo $pager;?></ul></td>
                </tr>
                <?php  } else { ?>
                <tr style="text-align: center"><td >没有找到对应的记录</td></tr>
                <?php  } ?>
                </thead>
            </table>

        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/common/footer', TEMPLATE_INCLUDEPATH)) : (include template('web/common/footer', TEMPLATE_INCLUDEPATH));?>