<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('default/header', TEMPLATE_INCLUDEPATH)) : (include template('default/header', TEMPLATE_INCLUDEPATH));?>
<body class="max-width">
<header class="bar bar-nav bg-green">
    <a class="icon icon-left pull-left txt-fff" onclick="window.location.href='<?php  echo $this->createMobileUrl('member')?>'"></a>
    <h1 class="title txt-fff">我的报修</h1>
</header>
<div class="content page">
    <div class="buttons-row repair-buttons-row">
        <a href="#tab0" class="tab-link  button active" onclick="xqrepair(0)">全部报修</a>
        <a href="#tab1" class="tab-link button" onclick="xqrepair(1)">已处理</a>
        <a href="#tab2" class="tab-link button" onclick="xqrepair(2)">未处理</a>
    </div>
    <div class="tabs repair-tabs" style="margin-top: 40px;">
        <div id="tab0" class="tab active">
            <div class="content-block mt0">
                <div class="list-block media-list repair-list-block repair-my-block mt0" id="data-list-0">


                </div>
            </div>
        </div>
        <div id="tab1" class="tab">
            <div class="content-block mt0">
                <div class="list-block media-list repair-list-block repair-my-block mt0" id="data-list-1">

                </div>
            </div>
        </div>
        <div id="tab2" class="tab">
            <div class="content-block mt0">
                <div class="list-block media-list repair-list-block repair-my-block mt0" id="data-list-2">

                </div>
            </div>
        </div>
    </div>
    <div id="btn_div">
        <div id="btn_dj">
            <span id="btn_input" class="btn_img hide_b"></span>
        </div>
        <div id="menu_b" class="menu_btn hide_m">
            <a href="" onclick="window.location.href='tel:<?php  echo $region['linkway'];?>'">电话报修</a>
            <a href="" onclick="window.location.href='<?php  echo $this->createMobileUrl('repair',array('op' => 'add'))?>'">在线报修</a>
            <a href="" onclick="window.location.href='<?php  echo $this->createMobileUrl('repair',array('op' => 'my'))?>'">我的报修</a>
        </div>
    </div>
</div>

<script type="text/html" id="xq_list">
    {{# for(var i = 0, len = d.list.length; i < len; i++){ }}
    <ul>
        <li onclick="javascript:window.location.href='{{ d.list[i].url }}'">
            <a href="#" class="item-link item-content">
                <div class="item-inner">
                    <div class="item-title-row">
                        <div class="item-title">
                            <span class="repair-lable {{ d.list[i].css5 }}">{{ d.list[i].s}}</span> {{ d.list[i].category}}
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="item-content">
            <div class="item-inner">
                <div class="item-title-row">
                    <div class="item-subtitle">报修日期：{{ d.list[i].datetime}}</div>
                    {{# if(d.list[i].status== 2){ }}
                    <div class="item-after"><a class="repair-del" onclick="del({{ d.list[i].id }})">删除</a></div>
                    {{# } }}
                    {{# if(d.list[i].status== 1  && d.list[i].xqrank==1){ }}
                    <div class="item-after"><a class="repair-del" onclick="javascript:window.location.href='<?php  echo $this->createMobileUrl('repair',array('op'=> 'rank'))?>&id={{d.list[i].id}}'" >待评价</a></div>
                    {{# } }}
                </div>
            </div>
        </li>
    </ul>
    {{# } }}
</script>
<script>
    $(function() {
        $("#btn_dj").click(function() {
            var input_btn = $("#btn_input")
            if (input_btn.attr("class") == "btn_img hide_b") {
                input_btn.removeClass();
                input_btn.addClass("btn_img show_b");
            } else {
                input_btn.removeClass();
                input_btn.addClass("btn_img hide_b");
            }
            var menu_b = $("#menu_b")
            if (menu_b.attr("class") == "menu_btn hide_m") {
                menu_b.removeClass();
                menu_b.addClass("menu_btn show_m");
            } else {
                menu_b.removeClass();
                menu_b.addClass("menu_btn hide_m");
            }
        })
    })
    function del(id){
        var id = id;
        $.post("<?php  echo $this->createMobileUrl('repair')?>", {"op":"delete","id":id}, function(msg){
            if (msg.status == 1) {
                setTimeout(function(){
                    window.location.reload();
                },100);
            };
        },'json');
    }
</script>
<script>$.config = {autoInit: true}</script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/default/static/js/light7.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var status ="<?php  echo $_GPC['status'];?>";
        loaddata("<?php  echo $this->createMobileUrl('repair',array('op'=>'my'))?>&status="+status, $("#data-list-0"),'xq_list' ,true);
    });
</script>
<script>
    function xqrepair(status) {
        var status =status;
        var url = "<?php  echo $this->createMobileUrl('repair',array('op'=>'my'))?>&status="+status;
        var obj = $("#data-list-"+status);
        var object= 'xq_list';
        $.get(url, function (data) {
            if (data.list.length > 0) {
                var gettpl = document.getElementById(object).innerHTML;
                laytpl(gettpl).render(data, function(html){
                    //document.getElementById(obj).innerHTML = html;
                    obj.html(html);
                });
            }
            lock = 0;
            hideLoader();
        }, 'json');
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('default/footer', TEMPLATE_INCLUDEPATH)) : (include template('default/footer', TEMPLATE_INCLUDEPATH));?>