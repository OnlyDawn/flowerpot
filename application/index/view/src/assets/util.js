import axios from 'axios';
let util = {

};
util.formatDate = function(date, format) {   
    if (!date) return;   
    if (!format) format = "yyyy-MM-dd";   
    switch(typeof date) 
    {   
        case "string":
            var tmpDate = date.replace(/-/g, "/").replace(/T/g, " ");
            date = new Date(tmpDate);   
            break;   
        case "number":   
            date = new Date(date);   
            break;   
    }    
    if (!date instanceof Date) return;   
    var dict = {   
        "yyyy": date.getFullYear(),   
        "M": date.getMonth() + 1,   
        "d": date.getDate(),   
        "H": date.getHours(),   
        "m": date.getMinutes(),   
        "s": date.getSeconds(),   
        "MM": ("" + (date.getMonth() + 101)).substr(1),   
        "dd": ("" + (date.getDate() + 100)).substr(1),   
        "HH": ("" + (date.getHours() + 100)).substr(1),   
        "mm": ("" + (date.getMinutes() + 100)).substr(1),   
        "ss": ("" + (date.getSeconds() + 100)).substr(1)
    };
    var tmp_str = format.replace(/(yyyy|MM?|dd?|HH?|ss?|mm?)/g, function() {   
        return dict[arguments[0]];   
    }) 
    return tmp_str;                   
};
util.rem = function() {
	let win = window;
	var remCalc = {};
	var docEl = win.document.documentElement,tid;

	function refreshRem() {
		// 获取当前窗口的宽度
		var width = win.innerWidth;
		if (width > 1200) {
			width = 1200
		}
		var rem = width / 12; // cms 只要把这行改成 var rem = width /750 * 100 
		docEl.style.fontSize = rem + "px";
		remCalc.rem = rem;
		//误差、兼容性处理
		var actualSize = parseFloat(window.getComputedStyle(document.documentElement)["font-size"]);
		if (actualSize !== rem && actualSize > 0 && Math.abs(actualSize - rem) > 1) {
			var remScaled = rem * rem / actualSize;
			docEl.style.fontSize = remScaled + "px"
		}
	}
	//函数节流，避免频繁更新
	function dbcRefresh() {
		clearTimeout(tid);
		tid = setTimeout(refreshRem, 50)
	}
	//窗口更新动态改变font-size
	win.addEventListener("resize", function() {
		dbcRefresh()
	}, false);
	//页面显示的时候再计算一次 难道切换窗口之后再切换来窗口大小会变?....
	win.addEventListener("pageshow", function(e) {
		if (e.persisted) {
			dbcRefresh()
		}
	}, false);
	refreshRem();
	remCalc.refreshRem = refreshRem;
	remCalc.rem2px = function(d) {
		var val = parseFloat(d) * this.rem;
		if (typeof d === "string" && d.match(/rem$/)) {
			val += "px"
		}
		return val
	};
	remCalc.px2rem = function(d) {
		var val = parseFloat(d) / this.rem;
		if (typeof d === "string" && d.match(/px$/)) {
			val += "rem"
		}
		return val
	};
	win.remCalc = remCalc
}
export default util;
