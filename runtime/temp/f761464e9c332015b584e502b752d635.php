<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\work\flowerpot\public/../application/index\view\index\index.html";i:1549175649;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <link rel=icon type=image/x-icon href=static/favicon.ico>
    <script type=text/javascript src="http://api.map.baidu.com/api?key=&v=1.0&services=true"></script>
    <script src=http://code.jquery.com/jquery-2.1.1.min.js></script>
    <title>花盆,花钵,花器 - 买花盆就上花盆网</title>
    <style type=text/css>.lxb-container {
        right: 0 !important;
        top: 119px !important;
    }

    .lxb-close-btn {
        top: 119px !important;
        right: 0 !important;
    }</style>
    <link href=/static/css/app.48c851757c054aff3045ad05f2cb6a3a.css rel=stylesheet>
</head>
<body>
<div id=app></div>
<script type=text/javascript src=/static/js/manifest.3ad1d5771e9b13dbdad2.js></script>
<script type=text/javascript src=/static/js/vendor.c012190e7919cb5ce96e.js></script>
<script type=text/javascript src=/static/js/app.a4761cd88259ccde5266.js></script>
</body>
<script type=text/javascript>window.onload = function () {
    function Index(node) {
        this.node = node;
        this.init();
    };
    Index.prototype.init = function () {
        var self = this;
        this.nodes = [];
        Array.prototype.slice.call(self.node, 0).forEach(function (item, index) {
            self.nodes.push(self.update(item));
            self.bindEvents(item, index);
        });
    };
    Index.prototype.update = function (item) {
        return {
            w: item.offsetWidth,
            h: item.offsetHeight,
            l: item.offsetLeft,
            t: item.offsetTop
        }
    };
    Index.prototype.bindEvents = function (item, index) {
        var self = this;
        $(item).on('mouseenter', function (e) {
            self.addClass(e, item, 'in', index);
            return false;

        })
        $(item).on('mouseleave', function (e) {
            self.addClass(e, item, 'out', index);
            return false;
        })
    };
    Index.prototype.addClass = function (e, item, state, index) {
        var direction = this.getDirection(e, index);
        var class_suffix = '';
        switch (direction) {
            case 0:
                class_suffix = '-top';
                $('.picBox').css('transformOrigin', ' 50% 50% -68.5px');
                break;
            case 1:
                class_suffix = '-right';
                $('.picBox').css('transformOrigin', '50% 50% -136px');
                break;
            case 2:
                class_suffix = '-bottom';
                $('.picBox').css('transformOrigin', '50% 50% -68.5px');
                break;
            case 3:
                class_suffix = '-left';
                $('.picBox').css('transformOrigin', '50% 50% -136px');
                break;
        }
        item.className = '';
        item.classList.add(state + class_suffix);
    };
    Index.prototype.getDirection = function (e, index) {
        var w = this.nodes[index].w,
            h = this.nodes[index].h,
            x = (e.offsetX - (w / 2)) * (w > h ? (h / w) : 1),
            y = (e.offsetY - (h / 2)) * (h > w ? (w / h) : 1);
        d = (Math.round(((Math.atan2(y, x) * (180 / Math.PI)) + 180) / 90) + 3) % 4;
        return d;
    };
    new Index($('.bbb li'));
}</script>
</html>