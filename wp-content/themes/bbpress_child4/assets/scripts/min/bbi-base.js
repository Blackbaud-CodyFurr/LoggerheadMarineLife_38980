window.bbiGetInstance().register({alias:"bbtheme31",author:"Blackbaud Designer",client:"New Theme 3.1",created:"06.26.2015",requires:[]}).scope(function(e,i,$){return{isEdit:i.isPageEditor(),gaScriptTrack:function(e){_gaq.push(e)}}}).action("clickSearch",function(e,i,$){var n={_events:function(){$(".search-submit").click(function(){$(".search-field").toggleClass("is_open")})}};return{init:function(e,i){$(function(){n._events()})}}}).action("pageInit",function(e,i,$){var n={_vars:{},_events:function(){},menuTitles:function(){console.log("BBI Base/Parent Script Running");var e=$("[id*=menu-primary-navigation] > li > a,[id*=menu-action-navigation] > li > a");$.each(e,function(e,i){var n=$(i),t=n.text(),a=n.attr("title");new_title=$("<span />",{"class":"hidden-sm hidden-md",text:t}).add($("<span />",{"class":"hidden-xs hidden-lg",text:a})),n.html(new_title)})},responsiveTable:function(){$("#content-primary table").addClass("table table-bordered").wrap("<div class='table-responsive'></div>")},embedResponsiveVideo:function(){$('iframe[src*="youtube.com"],iframe[src*="vimeo.com"]').each(function(){$(this).wrapAll('<div class="videoWrapper"></div>')})},googleTracking:function(){$('[id*="menu-social-media"] a').on("click",function(){var e=$(this).attr("href");ga("send","event","Social Icons","click",e)}),$('[id*="menu-social-media"] span').on("click",function(){var e=$(this).attr("class");ga("send","event","Social Icons","click",e)}),$("#menu-action-navigation a").on("click",function(){var e=$(this).attr("title");ga("send","event","Action Navigation","click",e)})},loadPageContent:function(){$("#bb-wrapper").fadeIn("slow"),$("#widget-img-carousel").carousel({interval:1e4}),$("#widget-img-carousel .item").each(function(){var e=$(this).next();e.length||(e=$(this).siblings(":first")),e.children(":first-child").clone().appendTo($(this)),e.next().length>0?e.next().children(":first-child").clone().appendTo($(this)):$(this).siblings(":first").children(":first-child").clone().appendTo($(this))})},showSearchForm:function(){$("#header .search-btn").toggle(function(){$("#header .search-form").toggle(),$(this).addClass("clicked")},function(){$(this).removeClass("clicked"),$("#header .search-form").toggle()})}};return{init:function(e,i){$(function(){n.loadPageContent(),n.responsiveTable(),n.embedResponsiveVideo()})}}}).build();