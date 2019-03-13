(function($) {
    $.fn.ysqTabs = function(conf) {
        var defaultConf = {
            auto: "ASC"//ASC(默认),DESC,RANDOM,OFF
            , interval: 5000
            , defFunc: function($on, $i) {
                $on.hide();
                $i.show();
            }
            //,count:4

            /*定义动态部件
             ,items:[{
             expr:".text",
             eventSort:"MOUSEOVER",
             func:xx
             }]*/
        };
        //初始化配置
        conf = $.extend(defaultConf, conf);
        
        var _this = $(this);
        var on = 0;
        var lock = false;
        var lock2 = false;
        //var queue = [];

        //定义函数
        var active = function(i) {
            //if (on != i && conf.items) {
            
            if (conf.items) {
                for (var j = 0; j < conf.items.length; j++) {
                    var item = conf.items[j];
                    var func = item.func ? item.func : conf.defFunc;
                    var $on;
                    var $i;
                    if(item.expr){
                        $on = _this.find(item.expr).eq(on);
                        $i = _this.find(item.expr).eq(i);
                    }else if(item.prefix){
                        $on = _this.find(item.prefix + on);
                        $i = _this.find(item.prefix + i);
                    }
                    func($on, $i);
                }
                on = i;
            }
        };
        _this.mouseover(function() {
            lock = true;
        }).mouseout(function() {
            lock = false;
        });
        var i;
        //初始化控制部件组
        var event = function(i) {
            this.run = function() {
                if (!lock2) {
                    lock2 = true;
                    active(i);
                    lock2 = false;
                }
            }
        };
        if (conf.items) {
            for (i = 0; i < conf.items.length; i++) {
                var item = conf.items[i];
                for (var j = 0; j < conf.count; j++) {
                    var eventSort = item.eventSort;
                    if (eventSort) {
                        var $ctrl;
                        if(item.expr){
                            $ctrl =_this.find(item.expr).eq(j);
                        }else if(item.prefix){
                            $ctrl =_this.find(item.prefix + j);
                        }
                        if (eventSort == "CLICK")
                            $ctrl.click(new event(j).run);
                        else {
                            $ctrl.mouseover(new event(j).run);
                        }
                    }
                }
            }
        }

        //轮循
        var auto = function() {
            if (!lock && !lock2) {
                lock2 = true;
                var i = on;
                if (conf.auto == "DESC") {
                    i--;
                    if (i < 0)
                        i = conf.count - 1;
                    active(i);
                } else if (conf.auto == "RANDOM") {
                    i = Math.floor(Math.random() * (conf.count - 0.001));
                    active(i);
                } else {
                    i++;
                    if (i >= conf.count)
                        i = 0;
                    active(i);
                }
                lock2 = false;
            }
        };
        for(var i=0;i<conf.count;i++){
            auto();
        }
        if (conf.auto != "OFF")
            setInterval(auto, conf.interval);
        //        setInterval(function(){
        //            if(queue.length!=0){
        //                var i = queue.shift();
        //                active(i);
        //            }
        //        }, 300);
    };
})(jQuery);