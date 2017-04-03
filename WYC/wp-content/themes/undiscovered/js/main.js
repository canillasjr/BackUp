(function($) {
	var UndiscoveredTheme = {
		init: function(){
			this.nav();
			this.backToTop();
			this.initGallery();
		},

		nav: function(){
			$('.main-navigation .menu').slicknav({
				label: ''
			});
		},

		backToTop: function(){
			$().UItoTop({
				inDelay: 300,
				outDelay: 200,
				scrollSpeed: 350,
				text: ''
			});
		},

		initGallery: function(){
			$('.gallery').bxSlider({
				slideSelector: '.gallery-item',
				pager: false
			});
		}
	};

	$(document).ready(function($) {
		UndiscoveredTheme.init();
	});
	$(document).ready(function($) {
		$(document).on('click' , '[data-click="collapse"]' , function(e){
			e.preventDefault();
			$('#search-box').slideDown();
			$(this).addClass('show-search');
		})
		$(document).on('click' , '.show-search' , function(e){
			e.preventDefault();
			$('#search-box').slideUp();
			$(this).removeClass('show-search');
		})


		$(document).on('click' , '.search-btn-box' , function(e){
			e.preventDefault();
			$('#search-box-m').slideDown();
			$(this).addClass('show-search-m');
			$('.menu-mobile-container.box-showed').removeClass('box-showed');
			$('.m-nav-menu.showed-nav').removeClass('showed-nav');
			$('.backmenu.showed-back').removeClass('showed-back');
			$('.show-nav').removeClass('show-nav');
		})
		$(document).on('click' , '.show-search-m' , function(e){
			e.preventDefault();
			$('#search-box-m').slideUp();
			$(this).removeClass('show-search-m');
		})


		$(document).on('click' , '[data-click="collapse-nav"]' , function(e){
			e.preventDefault();
			$(this).addClass('show-nav');
			$('.menu-mobile-container').addClass('box-showed');
			$('.m-nav-menu').addClass('showed-nav');
			$('.backmenu').addClass('showed-back');
			$('#search-box-m').slideUp();
			$('.show-search-m').removeClass('show-search-m');
		})
		$(document).on('click' , '.show-nav' , function(e){
			e.preventDefault();
			$(this).removeClass('show-nav');
			$('.menu-mobile-container.box-showed').removeClass('box-showed');
			$('.m-nav-menu.showed-nav').removeClass('showed-nav');
			$('.backmenu.showed-back').removeClass('showed-back');
		})
		$(document).on('click' , '.m-nav-menu.showed-nav' , function(e){
			 e.stopPropagation();
		})
		$(document).on('click' , '.menu-mobile-container.box-showed' , function(e){
			e.preventDefault();
			$('.show-nav').removeClass('show-nav');
			$('.menu-mobile-container.box-showed').removeClass('box-showed');
			$('.m-nav-menu.showed-nav').removeClass('showed-nav');
			$('.backmenu.showed-back').removeClass('showed-back');
			})
	

		$(document).on('click' , '.m-nav-menu #menu-menu-1 > li.menu-item-has-children > a' , function(e){
			e.preventDefault();
			$(this).addClass('list-item-collapse');
			$('.m-nav-menu #menu-menu-1 > li.menu-item-has-children > ul').slideDown();
			$('.m-nav-menu.showed-nav').css('height','auto');
			
		})
		$(document).on('click' , '.m-nav-menu #menu-menu-1 > li.menu-item-has-children > a.list-item-collapse' , function(e){
			e.preventDefault();
			$(this).removeClass('list-item-collapse');
			$('.m-nav-menu #menu-menu-1 > li.menu-item-has-children > ul').slideUp();
			$('.m-nav-menu.showed-nav').css('height','100%');
		})

		$(document).on('click' , '.m-nav-menu #menu-menu-1 > li.menu-item-has-children > ul > li.menu-item-has-children > a' , function(e){
			e.preventDefault();
			$(this).addClass('list-item-collapse');
			$('.m-nav-menu #menu-menu-1 > li.menu-item-has-children > ul > li.menu-item-has-children > ul').slideDown();
		})
		$(document).on('click' , '.m-nav-menu #menu-menu-1 > li.menu-item-has-children > ul > li.menu-item-has-children > a.list-item-collapse' , function(e){
			e.preventDefault();
			$(this).removeClass('list-item-collapse');
			$('.m-nav-menu #menu-menu-1 > li.menu-item-has-children > ul > li.menu-item-has-children > ul').slideUp();
		})

		$("a[href='#target-section']").click(function() {
	       $('html, body').animate({
	          scrollTop: $("#target-section").offset().top
	      	}, 500);
	    });
	    $(".form-goto").click(function() {
	       $('html, body').animate({
	          scrollTop: $(".contact-section").offset().top
	      	}, 1000);
	    });

	});
})(jQuery);
