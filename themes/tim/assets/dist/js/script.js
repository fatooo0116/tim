
/*!
 * in-view 0.6.1 - Get notified when a DOM element enters or exits the viewport.
 * Copyright (c) 2016 Cam Wiegert <cam@camwiegert.com> - https://camwiegert.github.io/in-view
 * License: MIT
 */
!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.inView=e():t.inView=e()}(this,function(){return function(t){function e(r){if(n[r])return n[r].exports;var i=n[r]={exports:{},id:r,loaded:!1};return t[r].call(i.exports,i,i.exports,e),i.loaded=!0,i.exports}var n={};return e.m=t,e.c=n,e.p="",e(0)}([function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}var i=n(2),o=r(i);t.exports=o["default"]},function(t,e){function n(t){var e=typeof t;return null!=t&&("object"==e||"function"==e)}t.exports=n},function(t,e,n){"use strict";function r(t){return t&&t.__esModule?t:{"default":t}}Object.defineProperty(e,"__esModule",{value:!0});var i=n(9),o=r(i),u=n(3),f=r(u),s=n(4),c=function(){if("undefined"!=typeof window){var t=100,e=["scroll","resize","load"],n={history:[]},r={offset:{},threshold:0,test:s.inViewport},i=(0,o["default"])(function(){n.history.forEach(function(t){n[t].check()})},t);e.forEach(function(t){return addEventListener(t,i)}),window.MutationObserver&&addEventListener("DOMContentLoaded",function(){new MutationObserver(i).observe(document.body,{attributes:!0,childList:!0,subtree:!0})});var u=function(t){if("string"==typeof t){var e=[].slice.call(document.querySelectorAll(t));return n.history.indexOf(t)>-1?n[t].elements=e:(n[t]=(0,f["default"])(e,r),n.history.push(t)),n[t]}};return u.offset=function(t){if(void 0===t)return r.offset;var e=function(t){return"number"==typeof t};return["top","right","bottom","left"].forEach(e(t)?function(e){return r.offset[e]=t}:function(n){return e(t[n])?r.offset[n]=t[n]:null}),r.offset},u.threshold=function(t){return"number"==typeof t&&t>=0&&t<=1?r.threshold=t:r.threshold},u.test=function(t){return"function"==typeof t?r.test=t:r.test},u.is=function(t){return r.test(t,r)},u.offset(0),u}};e["default"]=c()},function(t,e){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(e,"__esModule",{value:!0});var r=function(){function t(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}return function(e,n,r){return n&&t(e.prototype,n),r&&t(e,r),e}}(),i=function(){function t(e,r){n(this,t),this.options=r,this.elements=e,this.current=[],this.handlers={enter:[],exit:[]},this.singles={enter:[],exit:[]}}return r(t,[{key:"check",value:function(){var t=this;return this.elements.forEach(function(e){var n=t.options.test(e,t.options),r=t.current.indexOf(e),i=r>-1,o=n&&!i,u=!n&&i;o&&(t.current.push(e),t.emit("enter",e)),u&&(t.current.splice(r,1),t.emit("exit",e))}),this}},{key:"on",value:function(t,e){return this.handlers[t].push(e),this}},{key:"once",value:function(t,e){return this.singles[t].unshift(e),this}},{key:"emit",value:function(t,e){for(;this.singles[t].length;)this.singles[t].pop()(e);for(var n=this.handlers[t].length;--n>-1;)this.handlers[t][n](e);return this}}]),t}();e["default"]=function(t,e){return new i(t,e)}},function(t,e){"use strict";function n(t,e){var n=t.getBoundingClientRect(),r=n.top,i=n.right,o=n.bottom,u=n.left,f=n.width,s=n.height,c={t:o,r:window.innerWidth-u,b:window.innerHeight-r,l:i},a={x:e.threshold*f,y:e.threshold*s};return c.t>e.offset.top+a.y&&c.r>e.offset.right+a.x&&c.b>e.offset.bottom+a.y&&c.l>e.offset.left+a.x}Object.defineProperty(e,"__esModule",{value:!0}),e.inViewport=n},function(t,e){(function(e){var n="object"==typeof e&&e&&e.Object===Object&&e;t.exports=n}).call(e,function(){return this}())},function(t,e,n){var r=n(5),i="object"==typeof self&&self&&self.Object===Object&&self,o=r||i||Function("return this")();t.exports=o},function(t,e,n){function r(t,e,n){function r(e){var n=x,r=m;return x=m=void 0,E=e,w=t.apply(r,n)}function a(t){return E=t,j=setTimeout(h,e),M?r(t):w}function l(t){var n=t-O,r=t-E,i=e-n;return _?c(i,g-r):i}function d(t){var n=t-O,r=t-E;return void 0===O||n>=e||n<0||_&&r>=g}function h(){var t=o();return d(t)?p(t):void(j=setTimeout(h,l(t)))}function p(t){return j=void 0,T&&x?r(t):(x=m=void 0,w)}function v(){void 0!==j&&clearTimeout(j),E=0,x=O=m=j=void 0}function y(){return void 0===j?w:p(o())}function b(){var t=o(),n=d(t);if(x=arguments,m=this,O=t,n){if(void 0===j)return a(O);if(_)return j=setTimeout(h,e),r(O)}return void 0===j&&(j=setTimeout(h,e)),w}var x,m,g,w,j,O,E=0,M=!1,_=!1,T=!0;if("function"!=typeof t)throw new TypeError(f);return e=u(e)||0,i(n)&&(M=!!n.leading,_="maxWait"in n,g=_?s(u(n.maxWait)||0,e):g,T="trailing"in n?!!n.trailing:T),b.cancel=v,b.flush=y,b}var i=n(1),o=n(8),u=n(10),f="Expected a function",s=Math.max,c=Math.min;t.exports=r},function(t,e,n){var r=n(6),i=function(){return r.Date.now()};t.exports=i},function(t,e,n){function r(t,e,n){var r=!0,f=!0;if("function"!=typeof t)throw new TypeError(u);return o(n)&&(r="leading"in n?!!n.leading:r,f="trailing"in n?!!n.trailing:f),i(t,e,{leading:r,maxWait:e,trailing:f})}var i=n(7),o=n(1),u="Expected a function";t.exports=r},function(t,e){function n(t){return t}t.exports=n}])});

/*  star rating  */
(function($,window){$.fn.textWidth=function(){var html_calc=$("<span>"+$(this).html()+"</span>");html_calc.css("font-size",$(this).css("font-size")).hide();html_calc.prependTo("body");var width=html_calc.width();html_calc.remove();if(width==0){var total=0;$(this).eq(0).children().each(function(){total+=$(this).textWidth()});return total}return width};$.fn.textHeight=function(){var html_calc=$("<span>"+$(this).html()+"</span>");html_calc.css("font-size",$(this).css("font-size")).hide();html_calc.prependTo("body");var height=html_calc.height();html_calc.remove();return height};Array.isArray=function(obj){return Object.prototype.toString.call(obj)==="[object Array]"};String.prototype.getCodePointLength=function(){return this.length-this.split(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g).length+1};String.fromCodePoint=function(){var chars=Array.prototype.slice.call(arguments);for(var i=chars.length;i-->0;){var n=chars[i]-65536;if(n>=0)chars.splice(i,1,55296+(n>>10),56320+(n&1023))}return String.fromCharCode.apply(null,chars)};$.fn.rate=function(options){if(options===undefined||typeof options==="object"){return this.each(function(){if(!$.data(this,"rate")){$.data(this,"rate",new Rate(this,options))}})}else if(typeof options==="string"){var args=arguments;var returns;this.each(function(){var instance=$.data(this,"rate");if(instance instanceof Rate&&typeof instance[options]==="function"){returns=instance[options].apply(instance,Array.prototype.slice.call(args,1))}if(options==="destroy"){$(instance.element).off();$.data(this,"rate",null)}});return returns!==undefined?returns:this}};function Rate(element,options){this.element=element;this.settings=$.extend({},$.fn.rate.settings,options);this.set_faces={};this.build()}Rate.prototype.build=function(){this.layers={};this.value=0;this.raise_select_layer=false;if(this.settings.initial_value){this.value=this.settings.initial_value}if($(this.element).attr("data-rate-value")){this.value=$(this.element).attr("data-rate-value")}var selected_width=this.value/this.settings.max_value*100;if(typeof this.settings.symbols[this.settings.selected_symbol_type]==="string"){var symbol=this.settings.symbols[this.settings.selected_symbol_type];this.settings.symbols[this.settings.selected_symbol_type]={};this.settings.symbols[this.settings.selected_symbol_type]["base"]=symbol;this.settings.symbols[this.settings.selected_symbol_type]["selected"]=symbol;this.settings.symbols[this.settings.selected_symbol_type]["hover"]=symbol}var base_layer=this.addLayer("base-layer",100,this.settings.symbols[this.settings.selected_symbol_type]["base"],true);var select_layer=this.addLayer("select-layer",selected_width,this.settings.symbols[this.settings.selected_symbol_type]["selected"],true);var hover_layer=this.addLayer("hover-layer",0,this.settings.symbols[this.settings.selected_symbol_type]["hover"],false);this.layers["base_layer"]=base_layer;this.layers["select_layer"]=select_layer;this.layers["hover_layer"]=hover_layer;$(this.element).on("mousemove",$.proxy(this.hover,this));$(this.element).on("click",$.proxy(this.select,this));$(this.element).on("mouseleave",$.proxy(this.mouseout,this));$(this.element).css({"-webkit-touch-callout":"none","-webkit-user-select":"none","-khtml-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","user-select":"none"});if(this.settings.hasOwnProperty("update_input_field_name")){this.settings.update_input_field_name.val(this.value)}};Rate.prototype.addLayer=function(layer_name,visible_width,symbol,visible){var layer_body="<div>";for(var i=0;i<this.settings.max_value;i++){if(Array.isArray(symbol)){if(this.settings.convert_to_utf8){symbol[i]=String.fromCodePoint(symbol[i])}layer_body+="<span>"+symbol[i]+"</span>"}else{if(this.settings.convert_to_utf8){symbol=String.fromCodePoint(symbol)}layer_body+="<span>"+symbol+"</span>"}}layer_body+="</div>";var layer=$(layer_body).addClass("rate-"+layer_name).appendTo(this.element);$(layer).css({width:visible_width+"%",height:$(layer).children().eq(0).textHeight(),overflow:"hidden",position:"absolute",top:0,display:visible?"block":"none","white-space":"nowrap"});$(this.element).css({width:$(layer).textWidth()+"px",height:$(layer).height(),position:"relative",cursor:this.settings.cursor});return layer};Rate.prototype.updateServer=function(){if(this.settings.url!=undefined){$.ajax({url:this.settings.url,type:this.settings.ajax_method,data:$.extend({},{value:this.getValue()},this.settings.additional_data),success:$.proxy(function(data){$(this.element).trigger("updateSuccess",[data])},this),error:$.proxy(function(jxhr,msg,err){$(this.element).trigger("updateError",[jxhr,msg,err])},this)})}};Rate.prototype.getValue=function(){return this.value};Rate.prototype.hover=function(ev){var pad=parseInt($(this.element).css("padding-left").replace("px",""));var x=ev.pageX-$(this.element).offset().left-pad;var val=this.toValue(x,true);if(val!=this.value){this.raise_select_layer=false}if(!this.raise_select_layer&&!this.settings.readonly){var visible_width=this.toWidth(val);this.layers.select_layer.css({display:"none"});if(!this.settings.only_select_one_symbol){this.layers.hover_layer.css({width:visible_width+"%",display:"block"})}else{var index_value=Math.floor(val);this.layers.hover_layer.css({width:"100%",display:"block"});this.layers.hover_layer.children("span").css({visibility:"hidden"});this.layers.hover_layer.children("span").eq(index_value!=0?index_value-1:0).css({visibility:"visible"})}}};Rate.prototype.select=function(ev){if(!this.settings.readonly){var old_value=this.getValue();var pad=parseInt($(this.element).css("padding-left").replace("px",""));var x=ev.pageX-$(this.element).offset().left-pad;var selected_width=this.toWidth(this.toValue(x,true));this.setValue(this.toValue(selected_width));this.raise_select_layer=true}};Rate.prototype.mouseout=function(){this.layers.hover_layer.css({display:"none"});this.layers.select_layer.css({display:"block"})};Rate.prototype.toWidth=function(val){return val/this.settings.max_value*100};Rate.prototype.toValue=function(width,in_pixels){var val;if(in_pixels){val=width/this.layers.base_layer.textWidth()*this.settings.max_value}else{val=width/100*this.settings.max_value}var temp=val/this.settings.step_size;if(temp-Math.floor(temp)<5e-5){val=Math.round(val/this.settings.step_size)*this.settings.step_size}val=Math.ceil(val/this.settings.step_size)*this.settings.step_size;val=val>this.settings.max_value?this.settings.max_value:val;return val};Rate.prototype.getElement=function(layer_name,index){return $(this.element).find(".rate-"+layer_name+" span").eq(index-1)};Rate.prototype.getLayers=function(){return this.layers};Rate.prototype.setFace=function(value,face){this.set_faces[value]=face};Rate.prototype.setAdditionalData=function(data){this.settings.additional_data=data};Rate.prototype.getAdditionalData=function(){return this.settings.additional_data};Rate.prototype.removeFace=function(value){delete this.set_faces[value]};Rate.prototype.setValue=function(value){if(!this.settings.readonly){if(value<0){value=0}else if(value>this.settings.max_value){value=this.settings.max_value}var old_value=this.getValue();this.value=value;var change_event=$(this.element).trigger("change",{from:old_value,to:this.value});$(this.element).find(".rate-face").remove();$(this.element).find("span").css({visibility:"visible"});var index_value=Math.ceil(this.value);if(this.set_faces.hasOwnProperty(index_value)){var face="<div>"+this.set_faces[index_value]+"</div>";var base_layer_element=this.getElement("base-layer",index_value);var select_layer_element=this.getElement("select-layer",index_value);var hover_layer_element=this.getElement("hover-layer",index_value);var left_pos=base_layer_element.textWidth()*(index_value-1)+(base_layer_element.textWidth()-$(face).textWidth())/2;$(face).appendTo(this.element).css({display:"inline-block",position:"absolute",left:left_pos}).addClass("rate-face");base_layer_element.css({visibility:"hidden"});select_layer_element.css({visibility:"hidden"});hover_layer_element.css({visibility:"hidden"})}if(!this.settings.only_select_one_symbol){var width=this.toWidth(this.value);this.layers.select_layer.css({display:"block",width:width+"%",height:this.layers.base_layer.css("height")});this.layers.hover_layer.css({display:"none",height:this.layers.base_layer.css("height")})}else{var width=this.toWidth(this.settings.max_value);this.layers.select_layer.css({display:"block",width:width+"%",height:this.layers.base_layer.css("height")});this.layers.hover_layer.css({display:"none",height:this.layers.base_layer.css("height")});this.layers.select_layer.children("span").css({visibility:"hidden"});this.layers.select_layer.children("span").eq(index_value!=0?index_value-1:0).css({visibility:"visible"})}$(this.element).attr("data-rate-value",this.value);if(this.settings.change_once){this.settings.readonly=true}this.updateServer();var change_event=$(this.element).trigger("afterChange",{from:old_value,to:this.value});if(this.settings.hasOwnProperty("update_input_field_name")){this.settings.update_input_field_name.val(this.value)}}};Rate.prototype.increment=function(){this.setValue(this.getValue()+this.settings.step_size)};Rate.prototype.decrement=function(){this.setValue(this.getValue()-this.settings.step_size)};$.fn.rate.settings={max_value:5,step_size:.5,initial_value:0,symbols:{utf8_star:{base:"☆",hover:"★",selected:"★"},utf8_hexagon:{base:"⬡",hover:"⬢",selected:"⬢"},hearts:"&hearts;",fontawesome_beer:'<i class="fa fa-beer"></i>',fontawesome_star:{base:'<i class="fa fa-star-o"></i>',hover:'<i class="fa fa-star"></i>',selected:'<i class="fa fa-star"></i>'},utf8_emoticons:{base:[128549,128531,128530,128516],hover:[128549,128531,128530,128516],selected:[128549,128531,128530,128516]}},selected_symbol_type:"utf8_star",convert_to_utf8:false,cursor:"default",readonly:false,change_once:false,only_select_one_symbol:false,ajax_method:"POST",additional_data:{}}})(jQuery,window);





(function($){
    $(document).ready(function(){


        $("#home_line .slider").slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          });


        // Options
        var options = {
            max_value: 5,
            step_size: 1,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'default',
            readonly: false,
            change_once: false, // Determines if the rating can only be set once
            ajax_method: 'POST',
            url: 'http://localhost/test.php',
            additional_data: {} // Additional data to send to the server
        }

        $(".rating").rate(options);        


            $(".filters button").on("click",function(){
                let filter = $(this).attr("data-filter");
                console.log(filter);
                $(this).addClass("is-checked").siblings().removeClass("is-checked");

                if(filter){
                    $(".member_con .element-item").each(function(){
                        if(!$(this).hasClass(filter)){
                            $(this).fadeOut(200);
                        }else{
                            $(this).fadeIn(200);
                        }
                    });
                }else{
                    $(".member_con .element-item").each(function(){
                        $(this).fadeIn(200);
                    });
                }

            });

            
            $(".video-js").each(function(){               
               let idobj = $(this).attr('id');                            
               var vid = document.getElementById(idobj); 
               // $(vid).pause();
               vid.pause(); 

                  
                inView('.video-js')
                .on('enter', function(){
                    vid.play(); 
                });
            });
            
            /*
           inView('img.lazy')
           .on('enter', function(){
              // console.log('lazy');
              let src = $(this).attr('data-src');
              console.log(src);

              // $(this).attr('src',$(this).attr('data-src'));
           });
           */



           /*   Landing Page Tab */
           $("#sec3_form .tab_inner .tab ul li a").on("click",function(e){
               e.preventDefault();
                let idx = $(this).parent().index();
                console.log(idx);
                $(this).parent().addClass("active").siblings().removeClass("active");
                $("#sec3_form .tab_inner .right_content .inner .content").eq(idx).addClass("active").siblings().removeClass("active");
           });

           /*
           $("#tab_menu ul li a").on("click",function(e){
            e.preventDefault();
           
            $(this).parent().addClass('active').siblings().removeClass('active');
            
             let target = $(this).attr('href');
             console.log(target);
             $(target).addClass('active').siblings().removeClass('active');
        });
        */

        $("#main_menuv2 .top_inner .menu-toggle").on("click",function(){
            $("#site-navigation").toggleClass('open');
        });


        var  w = $(window).width();
        //    console.log(w);
            if(w < 768){
                    $("#primary-menu li.menu-item-has-children > a").on("click",function(e){
                        e.preventDefault();
                        $(this).parent().toggleClass("jcHover");
                    });
            }else{
                 $("#primary-menu li").on("mouseenter",function(){
                    $(this).addClass("jcHover");
                   });
                   $("#primary-menu li").on("mouseleave",function(){
                       $(this).removeClass("jcHover");
                   });
            }

    });
})(jQuery);