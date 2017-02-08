window.bbiGetInstance().register({
	alias: 'bbtheme31',
	author: 'Blackbaud Designer',
	client: 'New Theme 3.1',
	created: '06.26.2015',
	requires: []
})
.scope(function (app, bbi, $) {
	return {
		isEdit: bbi.isPageEditor(),
		gaScriptTrack: function(sendA){
// 			console.log(sendA);
			_gaq.push(sendA);
		}
	};
})
.action("removeSearchAnchor", function (app, bbi, $) {
	$( "#navbar li.search>a").removeAttr("href");
})
.action("clickSearch", function (app, bbi, $) {
	$( ".search-submit" ).click(function() {
		  $( ".search-field" ).toggleClass( "is_open" );
	});	
})
.action("pageInit", function (app, bbi, $) {	
	var methods = {
		_vars: {},
		_events: function () {},
		
		// Adds a option to give a shortend top level title on SM & MD Screen sizes.
		menuTitles: function () {		
			
			console.log('BBI Base/Parent Script Running');
			var items = $('[id*=menu-primary-navigation] > li > a,[id*=menu-action-navigation] > li > a');
            $.each(items, function(k,v) {
                var a = $(v),
                    t = a.text(),
                    n = a.attr('title');
                    new_title = $('<span />', {'class': 'hidden-sm hidden-md',text: t}).add($('<span />', {'class': 'hidden-xs hidden-lg', text: n}));
                a.html(new_title);
                /* console.log(new_title); */
            });			
		},
		
		
		// Makes a table that is added into the wysiwyg editor, responsive.
		responsiveTable: function() {	
			$( "#content-primary table" ).addClass('table table-bordered').wrap( "<div class='table-responsive'></div>" );
		},
		
		// Injects bootstrap classes into elements rendered by wordpress core.
		embedResponsiveVideo: function() {	
			$('iframe[src*="youtube.com"],iframe[src*="vimeo.com"]').each(function() {
				$(this).wrapAll('<div class="videoWrapper"></div>');
			});	
		},
		
		// Injects bootstrap classes into elements rendered by wordpress core.
		googleTracking: function() {	
			$('[id*="menu-social-media"] a').on('click', function() {
				var label = $(this).attr("href");
				ga('send', 'event', 'Social Icons', 'click', label);
			});	
			$('[id*="menu-social-media"] span').on('click', function() {
				var label = $(this).attr("class");
				ga('send', 'event', 'Social Icons', 'click', label);
			});	
			$('#menu-action-navigation a').on('click', function() {
				var label = $(this).attr("title");
				ga('send', 'event', 'Action Navigation', 'click', label);
			});
		},

		// Fades in the content once it has finished loading
		loadPageContent: function() {
         
         $('#bb-wrapper').fadeIn('slow');
         
         $('#widget-img-carousel').carousel({
            interval: 10000
         });
         
         $('#widget-img-carousel .item').each(function(){
            var next = $(this).next();
            if (!next.length) {
               next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
         
            if (next.next().length>0) {
               next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
               $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
         });			
		},	

		showSearchForm: function() {
			$('#header .search-btn').toggle(function(){
				$('#header .search-form').toggle(); $(this).addClass('clicked');
			},function(){
				$(this).removeClass('clicked');
				$('#header .search-form').toggle();
			});
		}

		
	};
	
	return {
		init: function (options, element) {
			$(function() {
				methods.loadPageContent();
				methods.responsiveTable();
				methods.embedResponsiveVideo();
				//methods.menuTitles();
				//methods.showSearchForm();
 				//methods.googleTracking(); 
			});
		}
	};
})
.build();