!function(e,t){"use strict";var o=function(e){if("object"!=typeof e.document)throw new Error("Cookies.js requires a `window` with a `document` object");var t=function(e,o,n){return 1===arguments.length?t.get(e):t.set(e,o,n)};return t._document=e.document,t._cacheKeyPrefix="cookey.",t._maxExpireDate=new Date("Fri, 31 Dec 9999 23:59:59 UTC"),t.defaults={path:"/",secure:!1},t.get=function(e){t._cachedDocumentCookie!==t._document.cookie&&t._renewCache();var o=t._cache[t._cacheKeyPrefix+e];return void 0===o?void 0:decodeURIComponent(o)},t.set=function(e,o,n){return n=t._getExtendedOptions(n),n.expires=t._getExpiresDate(void 0===o?-1:n.expires),t._document.cookie=t._generateCookieString(e,o,n),t},t.expire=function(e,o){return t.set(e,void 0,o)},t._getExtendedOptions=function(e){return{path:e&&e.path||t.defaults.path,domain:e&&e.domain||t.defaults.domain,expires:e&&e.expires||t.defaults.expires,secure:e&&void 0!==e.secure?e.secure:t.defaults.secure}},t._isValidDate=function(e){return"[object Date]"===Object.prototype.toString.call(e)&&!isNaN(e.getTime())},t._getExpiresDate=function(e,o){if(o=o||new Date,"number"==typeof e?e=e===1/0?t._maxExpireDate:new Date(o.getTime()+1e3*e):"string"==typeof e&&(e=new Date(e)),e&&!t._isValidDate(e))throw new Error("`expires` parameter cannot be converted to a valid Date instance");return e},t._generateCookieString=function(e,t,o){e=e.replace(/[^#$&+\^`|]/g,encodeURIComponent),e=e.replace(/\(/g,"%28").replace(/\)/g,"%29"),t=(t+"").replace(/[^!#$&-+\--:<-\[\]-~]/g,encodeURIComponent),o=o||{};var n=e+"="+t;return n+=o.path?";path="+o.path:"",n+=o.domain?";domain="+o.domain:"",n+=o.expires?";expires="+o.expires.toUTCString():"",n+=o.secure?";secure":""},t._getCacheFromString=function(e){for(var o={},n=e?e.split("; "):[],a=0;a<n.length;a++){var i=t._getKeyValuePairFromCookieString(n[a]);void 0===o[t._cacheKeyPrefix+i.key]&&(o[t._cacheKeyPrefix+i.key]=i.value)}return o},t._getKeyValuePairFromCookieString=function(e){var t=e.indexOf("=");t=t<0?e.length:t;var o=e.substr(0,t),n;try{n=decodeURIComponent(o)}catch(e){console&&"function"==typeof console.error&&console.error('Could not decode cookie with key "'+o+'"',e)}return{key:n,value:e.substr(t+1)}},t._renewCache=function(){t._cache=t._getCacheFromString(t._document.cookie),t._cachedDocumentCookie=t._document.cookie},t._areEnabled=function(){var e="cookies.js",o="1"===t.set(e,1).get(e);return t.expire(e),o},t.enabled=t._areEnabled(),t},n="object"==typeof e.document?o(e):o;"function"==typeof define&&define.amd?define(function(){return n}):"object"==typeof exports?("object"==typeof module&&"object"==typeof module.exports&&(exports=module.exports=n),exports.Cookies=n):e.Cookies=n}("undefined"==typeof window?this:window),function($,e,t){"use strict";$(document).ready(function(){function t(e){e.length<2&&(e="..."),_.removeClass("closed"),_.find("input").val(e)}function o(){_.addClass("closed")}function n(e,t){var o=$(".fb_iframe_widget");o.height(o.outerHeight()),p.addClass("step-1-finished"),0==A?l(!0):(r(f.find(".like-box").data("enter-email"),4e3),x.focus(),f.find(".like-btn").addClass("loaded")),v=!0,Cookies.set("l2d_page_is_liked",1,{expire:604800})}function a(e,t){var n=$(".fb_iframe_widget");n.height(n.outerHeight()),p.removeClass("step-1-finished"),o(),v=!1,Cookies.set("l2d_page_is_liked",0,{expire:0})}function i(e){p.addClass("message-send"),n()}function s(){var e={action:"laborator_l2d_request_new_coupon_code"};$.post(ajax_url,e,function(e){y=e;var t=_.find("input");"..."==t.val()&&t.val(y)},"json")}function d(t,o){g.html(t),g.slideDown("normal"),o&&(e.clearTimeout(h),h=setTimeout(function(){u()},o))}function u(){g.slideUp("fast",function(){g.html("")})}function r(t,o){C.html(t),C.slideDown("normal"),o&&(e.clearTimeout(),D=setTimeout(function(){c()},o))}function c(){C.slideUp("fast",function(){C.html("")})}function l(e){if(x.data("done"))return!1;if(!e&&!v&&!E)return d(f.find(".like-box").data("likemsg"),3e3),!1;var o=/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;if(!e&&!o.test(x.val()))return d(x.data("invalid"),3e3),!1;E&&t(y);var n={action:"laborator_l2d_submit_coupon_email",email:x.val(),requestedCoupon:y};e?f.find(".like-btn").addClass("is-loading"):x.parent().addClass("is-loading"),$.post(ajax_url,n,function(o){e?(f.find(".like-btn").removeClass("is-loading"),e&&f.find(".like-btn").addClass("loaded")):x.parent().removeClass("is-loading"),o.success?(x.attr("readonly",!0).data("done",!0),t(y),e?r(f.find(".like-box").data("coupon-confirmed")):o.message&&r(o.message)):(x.attr("readonly",!1),o.errmsg&&d(o.errmsg,1e4))},"json")}var F=$(".l2d-overlay"),f=$(".l2d-body"),m=F.add(f),p=f.find(".like-and-email"),_=f.find(".cc-wrapper"),x=f.find(".email-box input"),g=f.find(".errors-container"),C=f.find(".successmsg-container"),h=0,D=0,v=!1,b=f.data("enter"),k=f.data("exit"),y="",w=!1,E=!1,j=!1,A=f.data("require-confirmation"),T=function(){m.addClass("visible"),f.addClass("animated "+b),"absolute"==f.css("position")&&f.css({top:$(e).scrollTop()+100}),y&&!E||s(),w=!0},z=function(){f.removeClass(b).addClass(k),F.addClass("animated fadeOut"),setTimeout(function(){F.attr("class","l2d-overlay"),f.attr("class","l2d-body")},500),w=!1},S=function(){1!=Cookies.get("l2d_modal_is_shown")&&(Cookies.set("l2d_modal_is_shown",1),T())},U=function(){1!=Cookies.get("l2d_modal_addtocart_is_shown")&&(Cookies.set("l2d_modal_addtocart_is_shown",1),T())};e.l2dShow=T,e.l2dHide=z,e.showModalAfterAddingToCart=U,p.hasClass("l2d-display-share")&&(E=!0),p.hasClass("l2d-display-send")&&(j=!0),f.find(".cc-wrapper input").on("click",function(e){$(this).select()}),F.on("click",z),f.on("click",".close",function(e){e.preventDefault(),z()});var I=function(){FB.Event.subscribe("edge.create",n),FB.Event.subscribe("edge.remove",a),j&&FB.Event.subscribe("message.send",i),FB.getLoginStatus(function(e){console.log(e)})},K=!1;if(e.fbAsyncInit=function(){K||(I(),K=!0)},$(e).load(function(){0==K&&(I(),K=!0)}),x.on("keydown",function(e){13==e.keyCode&&l()}),$(".email-box .email-submit").on("click",function(e){e.preventDefault(),l()}),$(e).on("keyup",function(e){w&&27==e.keyCode&&z()}),f.hasClass("is-success")&&(y="null",T(),Cookies.set("l2d_coupon_gained",1)),$("body").hasClass("l2d-modal")){var P=$("body").attr("class").match(/l2d-show-delay-([0-9]+)/);P&&(P=parseInt(P[1],10),setTimeout(S,1e3*P))}$("body").hasClass("l2d-after-add-to-cart")&&"undefined"!=typeof wc_add_to_cart_params&&$(document).on("added_to_cart",function(e,t){setTimeout(U,1e3)}),$("body").on("click",".l2d-show-modal",function(e){e.preventDefault(),T()});var O=$(".l2d-side-banner");if(O.length){var q=O.find("img").attr("src"),B=new Image;B.src=q,B.onload=function(){O.css({marginTop:-this.height/2,display:"block"})}}})}(jQuery,window);