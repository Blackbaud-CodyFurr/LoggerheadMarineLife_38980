!function($){var i={common:{init:function(){$("#bb-wrapper").fadeIn("slow"),$("#widget-img-carousel").carousel({interval:1e4}),$("#widget-img-carousel .item").each(function(){var i=$(this).next();i.length||(i=$(this).siblings(":first")),i.children(":first-child").clone().appendTo($(this)),i.next().length>0?i.next().children(":first-child").clone().appendTo($(this)):$(this).siblings(":first").children(":first-child").clone().appendTo($(this))}),jQuery(document).on("bbi-loaded",function(){})},finalize:function(){}},home:{init:function(){},finalize:function(){}},about_us:{init:function(){}}},n={fire:function(n,e,t){var o,c=i;e=void 0===e?"init":e,o=""!==n,o=o&&c[n],o=o&&"function"==typeof c[n][e],o&&c[n][e](t)},loadEvents:function(){n.fire("common"),$.each(document.body.className.replace(/-/g,"_").split(/\s+/),function(i,e){n.fire(e),n.fire(e,"finalize")}),n.fire("common","finalize")}};$(document).ready(n.loadEvents)}(jQuery);