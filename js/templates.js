(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['rooms'] = template({"1":function(depth0,helpers,partials,data,blockParams,depths) {
    var stack1, helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "<li>\r\n  <fieldset >\r\n    <legend style=\"position: relative; left: 10px;\">Room "
    + alias3(((helper = (helper = helpers.index || (data && data.index)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"index","hash":{},"data":data}) : helper)))
    + "</legend>\r\n\r\n    <label class=\"adults grid-25\">\r\n      <span class=\"label\">Adults<span>(18+)</span></span>\r\n      <select name=\"rooms["
    + alias3(((helper = (helper = helpers.index || (data && data.index)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"index","hash":{},"data":data}) : helper)))
    + "][adultsCount]\">\r\n"
    + ((stack1 = (helpers.select || (depth0 && depth0.select) || alias1).call(depth0,(depth0 != null ? depth0.adultsCount : depth0),{"name":"select","hash":{},"fn":this.program(2, data, 0, blockParams, depths),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "      </select>\r\n    </label>\r\n\r\n    <label class=\"children grid-25\">\r\n      <span class=\"label\">Children<span>(0-17)</span></span>\r\n      <select class=\"js-children-count\" name=\"rooms["
    + alias3(((helper = (helper = helpers.index || (data && data.index)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"index","hash":{},"data":data}) : helper)))
    + "][childrenCount]\">\r\n"
    + ((stack1 = (helpers.select || (depth0 && depth0.select) || alias1).call(depth0,(depth0 != null ? depth0.childrenCount : depth0),{"name":"select","hash":{},"fn":this.program(4, data, 0, blockParams, depths),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "      </select>\r\n    </label>\r\n\r\n    <fieldset class=\"children-ages\" >\r\n"
    + ((stack1 = helpers['if'].call(depth0,(depth0 != null ? depth0.children : depth0),{"name":"if","hash":{},"fn":this.program(6, data, 0, blockParams, depths),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "    </fieldset>\r\n\r\n  </fieldset>\r\n</li>\r\n";
},"2":function(depth0,helpers,partials,data) {
    return "        <option value=\"1\">1</option>\r\n        <option value=\"2\">2</option>\r\n        <option value=\"3\">3</option>\r\n        <option value=\"4\">4</option>\r\n";
},"4":function(depth0,helpers,partials,data) {
    return "        <option value=\"0\">0</option>\r\n        <option value=\"1\">1</option>\r\n        <option value=\"2\">2</option>\r\n        <option value=\"3\">3</option>\r\n";
},"6":function(depth0,helpers,partials,data,blockParams,depths) {
    var stack1;

  return "      <legend style=\"position: relative; left: 10px;\">Age</legend>\r\n      <ul style=\"margin-left: 0;\">\r\n\r\n"
    + ((stack1 = helpers.each.call(depth0,(depth0 != null ? depth0.children : depth0),{"name":"each","hash":{},"fn":this.program(7, data, 0, blockParams, depths),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "      </ul>\r\n";
},"7":function(depth0,helpers,partials,data,blockParams,depths) {
    var stack1, helper, alias1=this.escapeExpression, alias2=helpers.helperMissing;

  return "        <li class=\"grid-30\">\r\n          <label>\r\n            <select name=\"rooms["
    + alias1(this.lambda((this.data(data, 1) && this.data(data, 1).index), depth0))
    + "][children]["
    + alias1(((helper = (helper = helpers.index || (data && data.index)) != null ? helper : alias2),(typeof helper === "function" ? helper.call(depth0,{"name":"index","hash":{},"data":data}) : helper)))
    + "]\" required>\r\n"
    + ((stack1 = (helpers.select || (depth0 && depth0.select) || alias2).call(depth0,depth0,{"name":"select","hash":{},"fn":this.program(8, data, 0, blockParams, depths),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "            </select>\r\n          </label>\r\n        </li>\r\n";
},"8":function(depth0,helpers,partials,data) {
    return "              <option value=\"\">—</option>\r\n              <option value=\"0\">&lt;1</option>\r\n              <option value=\"1\">1</option>\r\n              <option value=\"2\">2</option>\r\n              <option value=\"3\">3</option>\r\n              <option value=\"4\">4</option>\r\n              <option value=\"5\">5</option>\r\n              <option value=\"6\">6</option>\r\n              <option value=\"7\">7</option>\r\n              <option value=\"8\">8</option>\r\n              <option value=\"9\">9</option>\r\n              <option value=\"10\">10</option>\r\n              <option value=\"11\">11</option>\r\n              <option value=\"12\">12</option>\r\n              <option value=\"13\">13</option>\r\n              <option value=\"14\">14</option>\r\n              <option value=\"15\">15</option>\r\n              <option value=\"16\">16</option>\r\n              <option value=\"17\">17</option>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data,blockParams,depths) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0,(depth0 != null ? depth0.rooms : depth0),{"name":"each","hash":{},"fn":this.program(1, data, 0, blockParams, depths),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "\r\n\r\n<li class=\"add-row\">\r\n   <button class=\"js-add-room\">Add room</button>\r\n</li>\r\n";
},"useData":true,"useDepths":true});
})();