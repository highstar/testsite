alert("你好！");
String.prototype.rtrim = function(){
    return this.replace(/\s+$/ig, "");
};
String.prototype.ltrim = function(){
    return this.replace(/^\s+$/ig, "");
};
var str = "  ab cd  ";
alert("[" + str.rtrim() + "]");
alert("[" + str.ltrim() + "]");