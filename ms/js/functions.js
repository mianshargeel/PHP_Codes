!function(a){"use strict";function b(a){document.write('<script src="'+a+'"></script>')}function c(a){var b=0;a.wheelDelta?b=a.wheelDelta/120:a.detail&&(b=-a.detail/3),d(b),a.preventDefault&&a.preventDefault(),a.returnValue=!1}function d(b){var c=500,d=300;a("html, body").stop().animate({scrollTop:a(window).scrollTop()-d*b},c)}b("js/jquery.ui.totop.js"),a(document).ready(function(){a().UItoTop({easingType:"easeOutQuart"})}),a("a").click(function(){return a("html, body").animate({scrollTop:a(a(this).attr("href")).offset().top-320},900),!1}),a("document").ready(function(){a(window).scroll(function(){a(this).scrollTop()>50?a(".myNav").addClass("navFixed"):a(".myNav").removeClass("navFixed")})}),window.addEventListener&&window.addEventListener("DOMMouseScroll",c,!1),window.onmousewheel=document.onmousewheel=c,screen.width<500&&(a("body").addClass("nohover"),a("td, th").attr("tabindex","1").on("touchstart",function(){a(this).focus()})),b("js/jquery.stickytableheaders.js")}(jQuery);