function ysqSetCookie(name, value, date, path) {
    document.cookie = name + "=" + escape(value) + ";expires=" + date.toGMTString() + ";path=" + path;
}

function ysqGetCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1){
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1){
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return null;
}

function ysqAds(adArr) {
    var minCnt;
    var xAdArr = [];
    for (var i = 0; i < adArr.length; i++) {
        var ad = adArr[i];
        var ck = ysqGetCookie(ad.cntName);
        var cnt = ck == null ? 0 : parseInt(ck);
        if (xAdArr.length == 0 || cnt == minCnt) {
            minCnt = cnt;
            xAdArr.push(ad);
        } else if (cnt < minCnt) {
            minCnt = cnt;
            xAdArr = [];
            xAdArr.push(ad);
        }
    }
    var d = new Date();
    var i = d.getTime() % xAdArr.length;
    d.setHours(23);
    d.setMinutes(59);
    d.setSeconds(59);
    d.setMilliseconds(999);
    ysqSetCookie(xAdArr[i].cntName, minCnt + 1, d, '/');
    document.writeln(xAdArr[i].js);
}


