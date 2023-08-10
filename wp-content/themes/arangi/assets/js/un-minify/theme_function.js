(function ($) {
    "use strict";
	//Global variable
   	var $body = $( 'body' );
    var $rtl = false;
    if(arangi_params.arangi_rtl=='yes'){
        $rtl = true;   
    }
	// Check images loaded
	$.fn.JAS_ImagesLoaded = function( callback ) { 
		var JAS_Images = function ( src, callback ) {
			var img = new Image;
			img.onload = callback;
			img.src = src;
		}
		var images = this.find( 'img' ).toArray().map( function( el ) {
			return el.src;
		});
		var loaded = 0;
		$( images ).each(function( i, src ) {
			JAS_Images( src, function() {
				loaded++;
				if ( loaded == images.length ) {
					callback();
				}
			})
		})
	}

	function arangiAutocompleteSearch(){
		$('.search-form').each(function(){
			var url = arangi_params.ajax_url + "?action=arangi_search";
			var $this = $(this);
			var $post_type = ($(this).find( "input[name='post_type']" ).val()!='')?$(this).find( "input[name='post_type']" ).val():'';
			var s1 = [];
			// var s2 = [];
			$(this).find(' select' ).each(function(){
				$(this).on('change', function() {
					s1.unshift({
			            tax: $(this).attr('name'),
			            term: $(this).find(":selected").val()
			        });
					var categories =[];
					var dup= [];
					if(s1.length !== 0){
						$.each(s1, function(index, value) {
							if(typeof value !== "undefined"){
							    if ($.inArray(value.tax, categories) == -1) {
							        categories.push(value.tax);
							    }else{
							        dup.push(value.tax);
							        s1.pop();
							    }
							}
						});
					}
				});

			});
			$(this).find( ".search-input" ).autocomplete({
				// source: url,
				source: function( request, response ) {
					var request_data = {
						term: request.term,
						post_type: $post_type,
						tax: s1,
						min_price: function(){
							return $('.first_limit').text();
						},
						max_price: function(){
							return $('.last_limit').text();
						},
					};
					$.getJSON(arangi_params.ajax_url+'?&action=arangi_search', request_data, response);
				},
				appendTo: $this.parent(),
				autoFocus: true,
				delay: 500,
				minLength: 3,
				search: function( event, ui ) {
					$this.find('.searchsubmit .ti-search').removeClass('ti-search').addClass('fa fa-spin ti-reload');
				},
				response: function( event, ui ) {
					$this.find('.searchsubmit .fa-spin').removeClass('fa fa-spin ti-reload').addClass('ti-search');
					$this.parent().toggleClass('s-no-result-found');

					$this.parent().find('.search-no-results').remove();
					$this.parent().append('<div class="search-no-results"><p>'+arangi_params.arangi_search_no_result+'</p></div>');
				}
			})._renderItem = function( ul, item ) {
				$this.parent().find('.search-no-results').remove();
				var result =  "<div class='search-content'>" ;
				if(item.imgsrc!=''){
					result += "<div class='search-img'><a href='"+item.link +"'><img src='"+item.imgsrc+"' alt='' /></a></div>";
				}
				result += "<div class='search-info'>";
				result += "<a href='"+item.link +"'>" + item.label + "</a>";

				if(item.add_cart!==''&&item.add_cart!=='undefined'){
					result += "<div class='price'>" + item.add_cart + "</div>";
				}
				result += "</div>"+ "</div>";
		      return $( "<li>" )
		        .append( result )
		        .appendTo( ul );
		    };
			$(this).find( "input[name='s']" ).on('autocompleteselect', function (e, ui) {
				$this.parent().find('.ui-autocomplete').addClass('show');
				if($this.find('input[name="post_type"]').val()!='product'){
					$this.parent().find('.ui-autocomplete').removeClass('show');
				};
			});
		});
		if($('.category_dropdown ul.chosen-results li').length){
			$('.category_dropdown ul.chosen-results li').each(function(){
				$(this).on( "click", function() {
					$(this).closest('.category_dropdown').find('.chosen-single').html('<span>'+$(this).text()+'</span><i class="ti-angle-down"></i>');
					$(this).closest('form.woocommerce-product-search').find('input[name="product_cat"]').val($(this).data('val'));
					$(this).closest('.category_dropdown').find('.chosen-single li').removeClass('active');
					$(this).addClass('active');
				});
			});
		}
		/*********** Search ajax **********/
		$('.woocommerce-product-search').each(function(){
			var $_this = $(this);
			var $_input_search = $(this).find('.search-field');
			var $_search_result = $(this).find('.auto_ajax_search');
			var $_btn_search_sm = $('button[type="submit"] i');
			var myVar =false;
			$_input_search.keyup(function(e){
				$_search_result.addClass('loading');
				// $_search_result.html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
				$_btn_search_sm.addClass('fa fa-pulse ti-reload');
				var search_val = $_input_search.val();
				var search_cat = $_this.find('input[name="product_cat"]').val();
				if(search_val.length > 2){
					myVar = setTimeout(
						function(){
							$.ajax({
								url: arangi_params.ajax_url,
								type: "post",
								data: {
									action: 'au_ajax_search_product',
									s: search_val,
									product_cat: search_cat
								},
								complete: function(response){
									$_search_result.addClass('active');
									$_search_result.removeClass('loading');
									$_btn_search_sm.removeClass('fa fa-pulse ti-reload');
								},
								success: function(response){
									$_search_result.html(response);
								}
							});
						},
						500
					);
				}else{
					if(search_val == ''){
						$_search_result.removeClass('loading');
						$_search_result.html('');
						$_btn_search_sm.removeClass('fa fa-pulse ti-reload');
					}
					$_search_result.removeClass('active');
					clearTimeout(myVar);
				}
			}).keyup(function(e){
				$_search_result.removeClass('active');
				$_search_result.html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
				clearTimeout(myVar);
				var search_val = $_input_search.val();
				var search_cat = $_this.find('input[name="product_cat"]').val();
				if(search_val.length > 2){
					myVar = setTimeout(
						function(){
							$.ajax({
								url: arangi_params.ajax_url,
								type: "post",
								data: {
									action: 'au_ajax_search_product',
									s: search_val,
									product_cat: search_cat
								},
								complete: function(response){
									$_search_result.addClass('active');
									$_search_result.removeClass('loading');
									$_btn_search_sm.removeClass('fa fa-pulse ti-reload');
								},
								success: function(response){
									$_search_result.html(response);
								}
							});
						},
						500
					);
				}else{
					if(search_val == ''){
						$_search_result.removeClass('loading');
						$_search_result.html('');
						$_btn_search_sm.removeClass('fa fa-pulse ti-reload');
					}
					clearTimeout(myVar);
					$_search_result.removeClass('active');
				}
			});
		});
	}
	function arangiCounter() {
		var i = '';
		var j = '';
		  var counters = $(".count-content .count");
		  var countersQuantity = counters.length;
		  var counter = [];

		  for (i = 0; i < countersQuantity; i++) {
		    counter[i] = parseInt(counters[i].innerHTML);
		  }

		  var count = function(start, value, id) {
		    var localStart = start;
		    setInterval(function() {
		      if (localStart < value) {
		        localStart++;
		        counters[id].innerHTML = localStart;
		      }
		    }, 40);
		  }

		  for (j = 0; j < countersQuantity; j++) {
		    count(0, counter[j], j);
		  }
		$('.scroll-humubur').slimScroll({
			alwaysVisible: true,
			railVisible: true,
			railColor: '#f0f1f0',
			distance: '0',
			height: '100%',
			width: '100%',
			position: 'right',  size: '5px',
		});
	}

	function arangiScroll_bar_tab(){
		$('.tabs-scroll .tabs-content-adv').slimScroll({
			alwaysVisible: true,
			railVisible: true,
			railColor: '#f0f1f0',
			railOpacity: '1',
			color: '#dbe0db',
			distance: '0',
			height: '100%',
			borderRadius: '0',
			width: '100%',
			position: 'right',  
			size: '5px',
			opacity: '1',
		});
	}
	// Woocommer
	function woocommerce_add_cart_ajax_message() {
		if ($('.add_to_cart_button').length !== 0 && $('#cart_added_msg_popup').length === 0) {
			var message_div = $('<div>')
				.attr('id', 'cart_added_msg'),
				popup_div = $('<div>')
				.attr('id', 'cart_added_msg_popup')
				.html(message_div)
				.hide();
			$('body').prepend(popup_div);
		}
	}
	function arangiWoocommer() {
		// Redirect On off
		$('#woosearch-search').on('submit', function (e) {
			if( $(this).data('redirect') == 1 ){
				e.preventDefault();
			}
		});
		if(arangi_params.arangi_woo_enable == 'yes'){
			//woocommerce
			$('body').on('added_to_cart', function (response) {
				$('body').trigger('wc_fragments_loaded');
			});
			//end ajax search

			woocommerce_add_cart_ajax_message();
			if(arangi_params.single_ajax_cart == '1'){
				// Ajax add to cart on the product page
				var $warp_fragment_refresh = {
					url: arangi_params.ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
					type: 'POST',
					success: function( data ) {
						if ( data && data.fragments ) {
							$.each( data.fragments, function( key, value ) {
								$( key ).replaceWith( value );
							});
							$( document.body ).trigger( 'wc_fragments_refreshed' );
						}
					}
				};

				$('.entry-summary form.cart').on('submit', function (e){
					e.preventDefault();
					var $this = $(this);
					$this.block({
						message: null,
						overlayCSS: {
							cursor: 'none'
						}
					});

					var product_url = window.location,
						form = $(this);
					$.post(product_url, form.serialize() + '&_wp_http_referer=' + product_url, function (result){
						var cart_dropdown = $('.widget_shopping_cart', result)
						
						var msg = $('#cart_added_msg_popup');
						$('#cart_added_msg').html(arangi_params.ajax_cart_added_msg);
						msg.css('margin-left', '-' + $(msg).width() / 2 + 'px').fadeIn();
						
						// update dropdown cart
						$('.widget_shopping_cart').replaceWith(cart_dropdown);

						// update fragments
						$.ajax($warp_fragment_refresh);
						$this.unblock();
						window.setTimeout(function () {
							msg.fadeOut();
						}, 2000);		

					});
				});
			}
			//Woocommerce update cart sidebar
			$('body').on('added_to_cart', function (response) {
				$('body').trigger('wc_fragments_loaded');
				$('ul.products li .added_to_cart').remove();
				var msg = $('#cart_added_msg_popup');
				$('.search-form').each(function(){
					$(this).parent().find('.ui-autocomplete').removeClass('show');
				});
				$('#cart_added_msg').html(arangi_params.ajax_cart_added_msg);
				msg.css('margin-left', '-' + $(msg).width() / 2 + 'px').fadeIn();
				window.setTimeout(function () {
					msg.fadeOut();
				}, 2000);
			});

			// tabs
			$("form.cart").on("change", "input.qty", function() {
				$(this.form).find("button[data-quantity]").data("quantity", this.value);
			});

			/**page shop**/
			$('.list-view-as li').each(function(){
				$(this).find('a').on( "click", function(e) {
					e.preventDefault();
					var data_show = $(this).data('layout');
					var data_column = $(this).data('column');
					var current_grid = $('.list-view-as li a.active').data('column');
					if(data_show == 'layout-grid'){
						$('ul.products').removeClass('columns-'+current_grid);
						$('ul.products').addClass('columns-' +data_column);
						$('ul.products').removeClass('product-list');
						$('ul.products').addClass('product-grid');
					}else if(data_show == 'layout-list'){
						$('ul.products').removeClass('columns-'+current_grid);
						$('ul.products').addClass('columns-' +data_column);
						$('ul.products').removeClass('product-grid');
						$('ul.products').addClass('product-list');
					}
					$('.list-view-as li a').removeClass('active');
					$(this).addClass('active');
					$('.products').find('>div').removeClass('active');
					$('.products'+' .'+ data_show).addClass('active').fadeIn("slow");
				});
			});
			//quantily
			// Target quantity inputs on product pages
			$('input.qty:not(.product-quantity input.qty)').each(function () {
				var min = parseFloat($(this).attr('min'));
				if (min && min > 0 && parseFloat($(this).val()) < min) {
					$(this).val(min);
				}
			});

			$(document).off('click', '.plus, .minus').on('click', '.plus, .minus', function () {
				// Get values
				var $qty = $(this).closest('.quantity').find('.qty'),
						currentVal = parseFloat($qty.val()),
						max = parseFloat($qty.attr('max')),
						min = parseFloat($qty.attr('min')),
						step = $qty.attr('step');

				// Format values
				if (!currentVal || currentVal === '' || currentVal === 'NaN')
					currentVal = 0;
				if (max === '' || max === 'NaN')
					max = '';
				if (min === '' || min === 'NaN')
					min = 1;
				if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN')
					step = 1;

				// Change the value
				if ($(this).is('.plus')) {

					if (max && (max === currentVal || currentVal > max)) {
						$qty.val(max);
					} else {
						$qty.val(currentVal + parseFloat(step));
					}

				} else {

					if (min && (min === currentVal || currentVal < min)) {
						$qty.val(min);
					} else if (currentVal > 0) {
						$qty.val(currentVal - parseFloat(step));
					}

				}

				// Trigger change event
				$qty.trigger('change');
			});

			// Viewby
			$( '.woocommerce-viewing' ).off( 'change' ).on( 'change', 'select.count', function() {
				$( this ).closest( 'form' ).submit();
			});

			// Single product
			$('.product-list-thumbnails img').on('click',function(e){
				$('.woocommerce-product-gallery__image').trigger('zoom.destroy'); // remove zoom
			});
			$('.woocommerce-product-gallery__wrapper').on('afterChange', function(event, slick, currentSlide, nextSlide){
				$('.slick-slide').removeClass('flex-active-slide');
				$("[data-slick-index='"+currentSlide+"']").addClass('flex-active-slide');
			});
			if(arangi_params.arangi_slick_enable == 'yes'){
				if($('.product-detail').hasClass('single_2')){
					var dot = true;
					var arrows = false;
					var arrowsthumb = true;
					var nextArrow = '<button class="btn-next"><i class="ti-angle-right"></i></button>';
					var prevArrow = '<button class="btn-prev"><i class="ti-angle-left"></i></button>';
				}else if($('.product-detail').hasClass('single_3')){
					var dot = false;
					var arrows = true;
					var arrowsthumb = false;
					var nextArrow = '<button class="btn-next">'+ arangi_params.single_product_next +'</button>';
					var prevArrow = '<button class="btn-prev">'+ arangi_params.single_product_prev +'</button>';
				}else if($('.product-detail').hasClass('single_4')){
					var dot = false;
					var arrows = true;
					var arrowsthumb = false;
					var nextArrow = '<button class="btn-next">'+ arangi_params.single_product_next +'</button>';
					var prevArrow = '<button class="btn-prev">'+ arangi_params.single_product_prev +'</button>';
				}else{
					var dot = true;
					var arrows = false;
					var arrowsthumb = false;
				}
				if($('.main-sidebar').hasClass('col-xl-9')){
					if($('.product-detail').hasClass('single_3') || $('.product-detail').hasClass('single_4')){
						var slidesToShow = 2;
					}else{
						var slidesToShow = 3;
					}
				}else{
					var slidesToShow = 4;
				}
				var $productGallery = $( '.woocommerce-product-gallery__wrapper' ),
						$productGalleryThumb = $( '.product-list-thumbnails' );
				if($('.product-detail').hasClass('single_1')){
					$productGallery.slick( {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: dot,
						arrows: arrows,
						nextArrow: nextArrow,
						prevArrow: prevArrow,
						infinite: false,
						rtl:$rtl,
					} );
				}else{
					$productGallery.slick( {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: dot,
						arrows: arrows,
						nextArrow: nextArrow,
						prevArrow: prevArrow,
						infinite: false,
						rtl:$rtl,
						asNavFor: $productGalleryThumb
					} );
					$productGalleryThumb.slick( {
						slidesToShow: slidesToShow,
						slidesToScroll: 1,
						nextArrow: nextArrow,
						prevArrow: prevArrow,
						dots: false,
						arrows: arrowsthumb,
						focusOnSelect: true,
						infinite: false,
						centerMode: false,
						speed: 300,
						rtl:$rtl,
						asNavFor: $productGallery,
						responsive: [
							{
								breakpoint: 1200,
								settings: {
									slidesToShow: 3,
								}
							},
							{
								breakpoint: 992,
								settings: {
									slidesToShow: 5,
								}
							},
							{
								breakpoint: 767,
								settings: {
									slidesToShow: 4,
								}
							},
							{
								breakpoint: 577,
								settings: {
									slidesToShow: 3,
								}
							}
						  ]
					} );
				}
			}
		}
		$(document).on( 'added_to_wishlist removed_from_wishlist', function(){
			var counter = $('.ajax-wishlist');
			$.ajax({
				url: yith_wcwl_l10n.ajax_url,
				data: {
					action: 'yith_wcwl_update_wishlist_count'
				},
				dataType: 'json',
				success: function( data ){
					counter.html( data.count );
				},
				beforeSend: function(){
					counter.block();
				},
				complete: function(){
					counter.unblock();
				}
			})
		} );
		$('.yith-woocompare-widget .clear-all').on('click', function(){
			if($('.compare_product .add_to_compare').hasClass('added')){
				$('.compare_product .add_to_compare').addClass('removed');
			}else{
				$('.compare_product .add_to_compare').removeClass('removed');
			}
		});
		if(arangi_params.arangi_slick_enable == 'yes'){
			$('.related .products, .up-sells .products, .cross-sells .products').slick({
				slidesToShow: arangi_params.single_per_limit,
				slidesToScroll: 1,
				arrows: true,
				nextArrow: '<button class="btn-next"><i class="ti-arrow-right"></i></button>',
				prevArrow: '<button class="btn-prev"><i class="ti-arrow-left"></i></button>',
				fade: false,
				rtl:$rtl,
				infinite: true,
				variableWidth: false,
				responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 3,
						}
					},

					{
						breakpoint: 768,
						settings: {
							slidesToShow: 2,
						}
					},
					{
					  breakpoint: 481,
						settings: {
							slidesToShow: 1,
						}
					}
				]
			});
			$('.cate-archive').slick({
				nextArrow: '<button class="btn-next"><i class="icon-next4"></i></button>',
				prevArrow: '<button class="btn-prev"><i class="icon-back3"></i></button>',
				slidesToShow: arangi_params.arangi_number_cate,
				slidesToScroll: 1,
				rtl:$rtl,
				dots: false,
				arrows: true,
				infinite: true,
				speed: 300,
				responsive: [
					{
					  breakpoint: 1024,
					  settings: {
						slidesToShow: 3
					  }
					},
					{
					  breakpoint: 600,
					  settings: {
						slidesToShow: 2
					  }
					},
					{
					  breakpoint: 480,
					  settings: {
						slidesToShow: 1
					  }
					}
				]
			});
		}
	}

	function arangiLoadMore(){
		var $j = jQuery.noConflict();
		var $container = $j('.load-item');
		var i = 1;
		var paged = $('.load_more_button').data('data-paged');
		var page = paged ? paged + 1 : 2;
		$j('.load_more_button a').off('click tap').on('click tap', function(e)  {
			e.preventDefault();
			var el = $(this);
			$j('.load_more_button a').append('<i class="ti-reload fa-spin"></i>');
            el.addClass('hide-loadmore');
			var link = $j(this).attr('href');
			var $content = '.load-item';
			var $anchor = '.load_more_button a';
			var $next_href = $j($anchor).attr('href');
			$j.get(link+'', function(data){
				$j('.load_more_button').find('.fa-spin').remove();
                el.removeClass('hide-loadmore');
				var $new_content = $j($content, data).wrapInner('').html();
				$next_href = $j($anchor, data).attr('href');
				if($('.blog-entries-wrap').hasClass('blog-masonry')){
		            $container.isotope({
						itemSelector: '.item',
						layoutMode: 'masonry',
						getSortData: {
							name: '.item'
						}
					});
		        }else{
		           $container.isotope({
						itemSelector: '.item',
						layoutMode: 'fitRows',
						getSortData: {
							name: '.item'
						}
					});
		        }
				
				$container.append($new_content).isotope( 'reloadItems' ).isotope({ sortBy: 'original-order' });
				
				setTimeout(function() {
					$j('.load-item').isotope( 'layout');
				}, 400);

				if($j('.load_more_button').attr('rel') > i) {
					$j('.load_more_button a').attr('href', $next_href); // Change the next URL 
				} else {
					$j('.load_more_button').remove();
				}
				
				$j('.item-page'+i).each( function() {
					var id = $j(this).find('.blog-img').attr('id');
					$j('#'+id+'.blog-gallery').slick({
						dots: true,
						arrows: false,
						rtl:$rtl,
						infinite: true,
						autoplay: false,
						autoplaySpeed: 2000,
						slidesToShow: 1,
						slidesToScroll: 1
					});
				});
				$j('.blog-masonry .blog-item').each(function(){
					var container = $(this);
					container .find('.custom-date').appendTo(container.find('.blog-img'));
				});
				$j('.blog-grid.grid-style2 .blog-item').each(function(){
					var container = $(this);
					container .find('.custom-date').appendTo(container.find('.blog-img'));
				});
			});
			i++;
		});
	}
	function gallerySlider(page) {
		$('.item-page'+page).each( function() {
			if($(this).find('.blog-img').hasClass('blog-gallery')) {
				var id = $(this).find('.blog-img').attr('id');
				$('#'+id+'.blog-gallery').slick({
					dots: true,
					arrows: false,
					prevArrow: '<button class="btn-prev"><span class="ti-angle-left"></span></button>',
					nextArrow: '<button class="btn-next"><span class="ti-angle-right"></span></button>',
					rtl:$rtl,
					infinite: true,
					autoplay: false,
					autoplaySpeed: 2000,
					slidesToShow: 1,
					slidesToScroll: 1
				});
			}
		});
		if($('.blog-img').hasClass('blog-gallery')) {
			$('.blog-shortcode .blog-gallery').slick({
				dots: true,
				arrows: false,
				prevArrow: '<button class="btn-prev"><span class="ti-angle-left"></span></button>',
				nextArrow: '<button class="btn-next"><span class="ti-angle-right"></span></button>',
				rtl:$rtl,
				infinite: true,
				autoplay: false,
				autoplaySpeed: 2000,
				slidesToShow: 1,
				slidesToScroll: 1
			});
		}
	}
	function postGallery(){
        $('.blog-gallery-single').slick({
          dots: false,
          arrows: true,
          prevArrow: '<button class="btn-prev"><span class="ti-angle-left"></span></button>',
          nextArrow: '<button class="btn-next"><span class="ti-angle-right"></span></button>',
          rtl:$rtl,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 2000,
          slidesToShow: 2,
          slidesToScroll: 1,
          responsive: [
		    {
		      breakpoint: 400,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
		  ] 
        });
        $('.blog-gallery2').slick({
          dots: false,
          arrows: true,
          prevArrow: '<button class="btn-prev"><span class="ti-angle-left"></span></button>',
          nextArrow: '<button class="btn-next"><span class="ti-angle-right"></span></button>',
          rtl:$rtl,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 2000,
          slidesToShow: 3,
          slidesToScroll: 1,
         responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		      }
		    },
		    {
		      breakpoint: 800,
		      settings: {
		        slidesToShow: 2,
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		      }
		    }
		  ]  
        });
        $('.blog-slide').slick({
          dots: false,
          arrows: true,
          nextArrow: '<button class="btn-next">next&nbsp;<span class="icon-right-arrow"></span></button>',
          prevArrow: '<button class="btn-prev"><span class="icon-left-arrow"></span>&nbsp;previous</button>',
          rtl:$rtl,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 2000,
          slidesToShow: 2,
          slidesToScroll: 1,
	         responsive: [
			    {
			      breakpoint: 586,
			      settings: {
			        slidesToShow: 1,
			      }
			    }
			  ] 
        });
	}
	function arangiTestimonial(){
		jQuery(document).ready(function($) {
            $('.testimonial-box .testimonial-image').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.testimonial-box .testimonial-content',
                dots: false,
                rtl: $rtl,
                centerPadding: '0px',
                focusOnSelect: true,
                centerMode: true,
                infinite: true,
                arrows :false,
                variableWidth: true,
            });
        });
		jQuery(document).ready(function($) {
			$('.testimonial-box  .testimonial-content').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				rtl: false,
				centerMode: true,
				asNavFor: '.testimonial-box  .testimonial-image',
				dots: true,
				arrows: false,
				nextArrow: '<button class="btn-next"><i class="icon-next4"></i></button>',
				prevArrow: '<button class="btn-prev"><i class="icon-back3"></i></button>',
				autoplay: true,
				infinite: true,
				autoplaySpeed : 5000,
				speed : 500,
				pauseOnHover: true,
				responsive: [
					{
					  breakpoint: 768,
					  settings: {
						slidesToShow: 1
					  }
					},
				]

			});
		});
	}

	//Filter Isotop Window Load
    function arangiFilterIsotopLoad() {
		var $grid = $('.isotope');
		var container = $('.isotope').isotope({
            itemSelector: '.item',
            layoutMode: 'fitRows',
            getSortData: {
                name: '.item'
            }
        });
		
		var container = $('.product-packery .product-grid').isotope({
            itemSelector: '.item',
            layoutMode: 'masonry',
            getSortData: {
                name: '.item'
            }
        });

		$('.btn-filter').each( function( i, buttonGroup ) {
            var filterLoadValue = $(this).find('.active').attr('data-filter');
            container.isotope({ filter: filterLoadValue });
        });
		$('.blog-masonry').masonry({
			itemSelector: '.item',
			percentPosition: true
		});


        $('.btn-filter').on( 'click', '.button', function() {
            var filterValue = $(this).attr('data-filter');
            container.isotope({ filter: filterValue });
        });
        $('.btn-filter').each( function( i, buttonGroup ) {
            var buttonGroup = $(buttonGroup);
            buttonGroup.on( 'click', '.button', function() {
                buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
        });
		
		var container = $('.product-packery .product-grid').isotope({
            itemSelector: '.item',
            layoutMode: 'masonry',
            getSortData: {
                name: '.item'
            }
        });
    }
	// Srcoll Top
	function arangiScrollTop() {
		if ($('.scroll-to-top').length) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > $('#page:not(.fixed-header) .site-header').height() +40) {
					if($('header').hasClass('header-bottom')){
						$('.scroll-to-top').css({bottom: "90px"});
					}
					else{
						$('.scroll-to-top').css({bottom: "213px"});
					}
					if($(window).width() < 991){
						$('.scroll-to-top').css({bottom: "100px"});
					}
                } else {
                    $('.scroll-to-top').css({bottom: "-100px"});
                }
            });

            $('.scroll-to-top').on('click',function () {
                $('html, body').animate({scrollTop: '0px'}, 800);
                return false;
            });
		}
        if(arangi_params.coming_subcribe_text){
            if(arangi_params.coming_subcribe_text.trim() && arangi_params.coming_subcribe_text.length > 0){
                $('.page-coming-soon .mc4wp-form input[type="submit"]').attr("value", arangi_params.coming_subcribe_text);
            }
        }
    }
    function arangiComing_soon_countdown() {
		if(arangi_params.coming_soon_countdown){
			$("#clock_coming_soon").countdown(arangi_params.coming_soon_countdown, function(event) {
				$(this).html(event.strftime(''
					+ '<div class="countdown-section"><div class="countdown-number">%D</div><div class="countdown-label">Days</div></div>'
					+ '<div class="countdown-section"><div class="countdown-number">%H</div><div class="countdown-label">Hours</div></div>'
					+ '<div class="countdown-section"><div class="countdown-number">%M</div><div class="countdown-label">Mins</div></div>'
					+ '<div class="countdown-section"><div class="countdown-number">%S</div><div class="countdown-label">Secs</div></div>'));
			});
		}
	}
	// Sticky Menu
	function arangiStickyMenu() {
    	var header_wp = $(".site-header");
    	var page = $("#page");
		var menuH = header_wp.outerHeight();
		var current = 0;
		if(arangi_params.header_sticky == '1' || arangi_params.header_fix == '1' || arangi_params.header_fix_metabox == '1'){
			header_wp.addClass('active-sticky fix-top');
			if($(window).width() > 991){
				var scrollH = menuH;
			}else {
				var scrollH = 46;
			}
			$(window).scroll(function () {
				var next = $(this).scrollTop();
				if ($(this).scrollTop() <= scrollH) {
					header_wp.removeClass('bg-sticky is-sticky');
					header_wp.addClass('fix-top');
				}else {
					header_wp.removeClass('fix-top');
					var next = $(this).scrollTop();
					if ((current - next) > 0){
						header_wp.addClass('is-sticky bg-sticky').removeClass('menu-hidden fix-top');
					} else {
						header_wp.addClass('menu-hidden').removeClass('is-sticky bg-sticky fix-top');
					}
					current = next;
				}
			})
		}
		/*
		* if header sticky and header not fix => #page padding-top = height header
		* */
		if ((arangi_params.header_sticky == 1 && !page.hasClass('header-fixed'))) {
			header_wp.addClass('fix-top');
			$('#page').css('padding-top',menuH);
			$(window).resize(function () {
				$('#page').css('padding-top',menuH);
			})
		}
	}
	// arangiMegamenu
	function arangiMegamenu() {
		var headerH = $(".site-header").height();
		var megamenu_sub = $(".megamenu_sub");
		var megamenu_subH = megamenu_sub.height();
		var height = $( window ).height();
		if ((megamenu_subH + headerH) >= height){
			var megamenuH = height - headerH;
			megamenu_sub.css( {
				'height':  megamenuH
			} );

			$('.megamenu-content').slimScroll({
				alwaysVisible: true,
				railVisible: true,
				railColor: '#f0f1f0',
				distance: '0',
				height: '100%',
				width: '100%',
				position: 'right',  size: '5px',
			});
		}
	}
	// Funcition Click
	function arangiClick(){
		// filter items on button click Gallery
		var $gridGallery = $('.isotope');
		$('.button-group').on( 'click', 'button', function() {
			var filterValueGallery = $(this).attr('data-filter');
			$gridGallery.isotope({ filter: filterValueGallery });
			$('.button-group button').removeClass('is-checked');
			$(this).addClass('is-checked');
		});

		// filter items on button click Blog
		var $grid = $('.grid-isotope');
		$('.button-group').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
			$('.button-group button').removeClass('is-checked');
			$(this).addClass('is-checked');
		});

		$('.cate-menu .title-cate').on('click', function() {
			$(this).toggleClass('active');
			$('.header-menu .cate-menu .product-categories').slideToggle();
		});

		$(".cart_label").on('click', function(event){
            event.preventDefault();
		});

		$(".thumbs_list a.view-img").on('click', function(event){
			event.preventDefault();
		});

		$('.mobile-tool .cart_label').on('click', function(e){
			$('.mobile-tool .cart-block').slideToggle();
		});

		$(".select-cate").on('click',function(){
			$(".category-list").toggleClass("active");
		});
		$('.toggle-contact').on('click', function() {
			$(this).toggleClass('active');
			if($('.humburger-content.contact-info').hasClass('active')){
				$('.humburger-content.contact-info').removeClass('active');
			}else{
				$('.humburger-content.contact-info').addClass('active');
			}
		});
		var wdw = $(window).width();
		if(wdw > 767){
			var  widthformAll = $(".widget_mc4wp_form_widget:not(.add-socia)").width();
			$('#btn-show-social').on('click',function() {
			      if($('.list-social').hasClass('show')) {
			             $('.list-social').removeClass('show');
			       } else {
			              $('.list-social').addClass('show');
			       }
			       if($('.widget_mc4wp_form_widget').hasClass('add-social')) {
			             $('.widget_mc4wp_form_widget').removeClass('add-social');
			             $('.widget_mc4wp_form_widget').css({
						    "width": 100 + "%"
						});
			       } else {
			       	 
			            $('.widget_mc4wp_form_widget').addClass('add-social');
			            var widthListsocial = $('.social-footer').width();
			            $('.widget_mc4wp_form_widget.add-social').css({
						    "width": widthformAll -  widthListsocial + 'px'
						});
			       }
			});
		}
	}
	// Submenu hover left
	function arangiFixSubMenu(){
		$('.mega-menu > li:not(.megamenu)').mouseover(function(){
			var wapoMainWindowWidth = $(window).width();
			// checks if third level menu exist
			var subMenuExist = $(this).children('.sub-menu').length;
			if( subMenuExist > 0){
				var subMenuWidth = $(this).children('.sub-menu').width();
				var subMenuOffset = $(this).children('.sub-menu').parent().offset().left + subMenuWidth;
				// if sub menu is off screen, give new position
				if((subMenuOffset + subMenuWidth + 50) > wapoMainWindowWidth){
					var newSubMenuPosition = subMenuWidth;
					$(this).addClass('left_side_menu');
				}else{
					var newSubMenuPosition = subMenuWidth;
					$(this).removeClass('left_side_menu');
				}
			}
		});
	}
	// Search, cart click body remove
	function arangiRemoveActive(){
		$(".select-cate").on('click',function(e) {
			e.stopPropagation();
		});
		$('body').on('click', function(e){
			if (!$(e.target).is('.category-list, .category-list *')) {
				$(".category-list").removeClass('active');
			}
		});
		if($(window).width() < 992){
			$(".cart-header .cart_label").on('click',function(e) {
				e.stopPropagation();
			});

			$('body').on('click', function(e){
				if (!$(e.target).is('.content-filter, .content-filter *')) {
					$(".content-filter").removeClass('active');
				}
			});
		}
	}
	// Fillter Isotop
	function arangiFillterIsotop(){
		var filterValue = $('.active_cat').attr('data-filter');
		var container = $('.isotope').isotope({
            itemSelector: '.item',
			filter: filterValue,
            layoutMode: 'fitRows',
            getSortData: {
                name: '.item'
            }
        });
		$('.btn-filter').on( 'click', '.button', function() {
            var filterValue = $(this).attr('data-filter');
            container.isotope({ filter: filterValue });
        });
        $('.btn-filter').each( function( i, buttonGroup ) {
            var buttonGroup = $(buttonGroup);
            buttonGroup.on( 'click', '.button', function() {
                buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
		});
	}
	// Fix Height Content
	function arangiHeightContent(){
		// Fix Height Blog
		var wdw = $(window).width();
		var widthInstagram = $('.footer-instagram .widget.instagram .instagram-gallery .instagram-img').width();
		$('.footer-instagram .widget.instagram .instagram-gallery .instagram-img').css('height', widthInstagram + 'px');
		var widthInstagram1 = $('.footer-top .widget.instagram .instagram-gallery .instagram-img').width();
		$('.footer-top .widget.instagram .instagram-gallery .instagram-img').css('height', widthInstagram1 + 'px');
		var widthInstagram2 = $('.active-sidebar .widget.instagram .instagram-gallery .instagram-img').width();
		$('.active-sidebar .widget.instagram .instagram-gallery .instagram-img').css('height', widthInstagram2 + 'px');
		var heightHeader = $('.site-header').height();
		var heightFooter = $('footer').height();
		if($(window).width() < 992){
			if($('.site-header').hasClass('header-bottom')){
				$('footer').css('margin-bottom', heightHeader + 'px');
			}
		}
		if($(window).width() > 767){
			if($('#page').hasClass('footer-fixed')){
				$('#page').css('margin-bottom', heightFooter + 'px');
			}
		}

		// Fix Height menu vertical
		var height = $(window).height();
		var width = $(window).width();
		var heightNav = $('.header-sidebar').height();
		var heightNavMenu = $('.mega-menu').height();
		if( heightNav > height ){
			$('.header-ver').addClass('header-scroll');
		}
		if(width < 992){
			if( heightNavMenu > height ){
				$('.header-center').addClass('header-scroll');
			}
		}
		$( window ).resize( function () {
			var widthInstagram = $('.footer-instagram .instagram-img').width();
			$('.footer-instagram .instagram-img').css('height', widthInstagram + 'px');
        } );
	
	}
	// Menu
	function arangiMenu(){
		$(".mega-menu .caret-submenu").on('click', function(e){
		   $(this).toggleClass('active');
		   $(this).siblings('.sub-menu').toggle(300);
		   $(this).parent().toggleClass('sub-menu-active');
		});
		if($('.menu-item').hasClass('menu_open_box')){
			$('body').addClass('fancybox-on');
		}
		$('ul.mega-menu > li.megamenu .menu-bottom').hide();
		$('ul.mega-menu > li.megamenu .menu-bottom').each(function(){
			var className = $(this).parent().parent().attr('id');
				if($(this).hasClass(className)){
					$(this).show();
				}
		});

		//Add class category
		$('.widget_categories ul').each(function(){
			if($(this).hasClass('children')) {
				$(this).parent().addClass('cat-item-parent');
			}
		});
		// Title Atrribute Sidebar
		$(".widget_product_categories > .widget-title").append('<span class="ti-minus"></span>');

		var $title_cat = $(".widget_product_categories > .widget-title ");
		$title_cat.on('click',function () {
			var $div_cate = $(".widget_product_categories ul.product-categories");
			if ($div_cate.is(':hidden') === true) {

				$div_cate.slideDown();
				$title_cat.find('span').remove();
				$title_cat.append('<span class= "ti-plus"></span>');
				$(this).find('span').remove();
				$(this).append('<span class= "ti-minus"></span>');
			}
			else {
				$div_cate.slideUp();
				$(this).find('span').remove();
				$(this).append('<span class= "ti-plus"></span>');
			}
		});
		$(".filter_color  .widget-title").append('<span class="icon ti-minus"></span>');
		var $title_color = $(".filter_color  .widget-title ");
		var $div_color = $(".filter_color .widget_berocket_aapf_single ul");
		$div_color.addClass('open_color');
		$title_color.on('click',function () {
			if ($div_color.hasClass('open_color')) {
				$div_color.removeClass('open_color');
				$div_color.addClass('remove_color');
				$title_color.append('<span class= "icon ti-minus"></span>');
				$(this).find('span.icon').remove();
				$(this).append('<span class= "icon ti-plus"></span>');
			}
			else {
				$div_color.removeClass('remove_color');
				$div_color.addClass('open_color');
				$(this).find('span.icon').remove();
				$(this).append('<span class= "icon ti-minus"></span>');
			}
		});
		$(".filter_price .widget-title").append('<span class=" icon ti-minus"></span>');
		var $title_price = $(".filter_price  .widget-title ");
		var $div_price = $(".filter_price ul");
		$div_price.addClass('open_price');
		$title_price.on('click',function () {
			if ($div_price.hasClass('open_price')) {
				$div_price.removeClass('open_price');
				$div_price.addClass('remove_price');
				$title_color.append('<span class= "icon ti-minus"></span>');
				$(this).find('span.icon').remove();
				$(this).append('<span class= "icon ti-plus"></span>');
			}
			else {
				$div_price.removeClass('remove_price');
				$div_price.addClass('open_price');
				$(this).find('span.icon').remove();
				$(this).append('<span class= "icon ti-minus"></span>');
			}
		});
		$(".brand .widget-title").append('<span class="ti-minus"></span>');
		var $title_brand = $(".brand  .widget-title");
		$title_brand.on('click',function () {
			var $div_brand = $(".brand ul");
			if ($div_brand.is(':hidden') === true) {

				$div_brand.slideDown();
				$title_brand.find('span').remove();
				$title_brand.append('<span class= "ti-angle-up"></span>');
				$(this).find('span').remove();
				$(this).append('<span class= "ti-minus"></span>');
			}
			else {
				$div_brand.slideUp();
				$(this).find('span').remove();
				$(this).append('<span class= "ti-plus"></span>');
			}
		});
		
		var $title_box_shipping = $(".box-shipping .title-hdwoo");
		$title_box_shipping.on('click',function () {
			var $div_shipping = $(".box-shipping .form-shipping-cs");
			if ($div_shipping.is(':hidden') === true) {

				$div_shipping.slideDown();
				$title_box_shipping.find('span').remove();
				$title_box_shipping.append('<span class= "ti-angle-up"></span>');
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-down"></span>');
			}
			else {
				$div_shipping.slideUp();
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-up"></span>');
			}
		});

		// Menu Category Sidebar
		$("<p></p>").insertAfter(".widget_product_categories ul.product-categories > li > a");
		var $p = $(".widget_product_categories ul.product-categories > li p");
		$(".widget_product_categories ul.product-categories > li:not(.current-cat):not(.current-cat-parent) p").append('<span class= "ti-angle-down"></span>');
		$(".widget_product_categories ul.product-categories > li.current-cat p").append('<span class= "ti-angle-down"></span>');
		$(".widget_product_categories ul.product-categories > li.current-cat-parent p").append('<span class= "ti-angle-down"></span>');
		$(".widget_product_categories ul.product-categories > li:not(.current-cat):not(.current-cat-parent) > ul").hide();

		$(".widget_product_categories ul.product-categories > li").each(function () {
			if ($(this).find("ul > li").length == 0) {
				$(this).find('p').remove();
			}

		});

		$p.on('click',function () {
			var $accordion = $(this).nextAll('ul');

			if ($accordion.is(':hidden') === true) {

				$(".widget_product_categories ul.product-categories > li > ul").slideUp();
				$accordion.slideDown();

				$p.find('span').remove();
				$p.append('<span class= "ti-angle-down"></span>');
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-up"></span>');
			}
			else {
				$accordion.slideUp();
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-down"></span>');
			}
		});

		// Menu Lever 2
		$("<p></p>").insertAfter(".widget_product_categories ul.product-categories > li > ul > li > a");
		var $pp = $(".widget_product_categories ul.product-categories > li > ul > li p");
		$(".widget_product_categories ul.product-categories > li >ul >li > ul").hide();
		$(".widget_product_categories ul.product-categories > li > ul > li p").append('<span class= "ti-angle-down"></span>');

		$(".widget_product_categories ul.product-categories > li > ul > li").each(function () {
			if ($(this).find("ul > li").length == 0) {
				$(this).find('p').remove();
			}
		});

		$pp.on('click',function () {
			var $accordions = $(this).nextAll('ul');

			if ($accordions.is(':hidden') === true) {

				$(".widget_product_categories ul.product-categories > li > ul > li > ul").slideUp();
				$accordions.slideDown();

				$pp.find('span').remove();
				$pp.append('<span class= "ti-angle-down"></span>');
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-up"></span>');
			}
			else {
				$accordions.slideUp();
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-down"></span>');
			}
		});

		// Menu Lever 3
		$("<p></p>").insertAfter(".widget_product_categories ul.product-categories > li > ul > li > ul > li > a");
		var $ppp = $(".widget_product_categories ul.product-categories > li > ul > li > ul > li p");
		$(".widget_product_categories ul.product-categories > li > ul > li > ul > li > ul").hide();
		$(".widget_product_categories ul.product-categories > li > ul > li > ul > li p").append('<span class= "ti-angle-down"></span>');

		$(".widget_product_categories ul.product-categories > li > ul > li > ul > li").each(function () {
			if ($(this).find("ul > li").length == 0) {
				$(this).find('p').remove();
			}
		});

		$ppp.on('click',function () {
			var $accordions = $(this).nextAll('ul');

			if ($accordions.is(':hidden') === true) {

				$(".widget_product_categories ul.product-categories > li > ul > li > ul > li > ul").slideUp();
				$accordions.slideDown();

				$ppp.find('span').remove();
				$ppp.append('<span class= "ti-angle-down"></span>');
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-up"></span>');
			}
			else {
				$accordions.slideUp();
				$(this).find('span').remove();
				$(this).append('<span class= "ti-angle-down"></span>');
			}
		});
		// Categories Blog Sidebar
		$('.widget.widget_categories .cat-item-parent > a, .widget_pages .page_item_has_children > a, .widget.widget_nav_menu .menu-item-has-children > a').after('<i class="fa fa-angle-right"></i>');
		$('.widget.widget_categories .cat-item-parent i, .widget.widget_pages .page_item_has_children i,  .widget.widget_nav_menu .menu-item-has-children i').on( "click", function() {
			$(this).toggleClass('fa-angle-down');
			$(this).parent().find('> .children').toggleClass('opening');
			$(this).parent().find('> .sub-menu').toggleClass('opening');
		})

		// Vertical Menu
		var $bdy = $('html');
		if($('.site-header').hasClass('header-02')) {
			$('html').addClass('page-overlay');
		}
		$('.menu-icon').on('click',function(e){
			$('.overlay').addClass('overlay-menu');
			if($bdy.hasClass('openmenu')) {
				arangiJsAnimateMenu2('close');
			} else {
				arangiJsAnimateMenu2('open');
				if($('.site-header').hasClass('header-02')) {
					arangiJsAnimateMenu1('open');
				}
			}
		});
		$('.close-menu-mobile').on('click',function(e){
			if($bdy.hasClass('openmenu')) {
				arangiJsAnimateMenu2('close');
				if($('.site-header').hasClass('header-02')) {
					arangiJsAnimateMenu1('close');
				}
			} else {
			  arangiJsAnimateMenu2('open');
			}
		});

		$('a[href$="#"]').on('click', function(e){
			e.preventDefault();
		});

		$('.overlay').on('click', function(){
			if($('html').hasClass('openmenu')){
				arangiJsAnimateMenu2('close');
				if($('.site-header').hasClass('header-02')) {
					arangiJsAnimateMenu1('close');
				}
			}
		});
	}
    function arangiHumburgerMenu() {
		$( '.site-header' ).on( 'click', '.btn-humburger', function( e ) {
			e.preventDefault();
			$( 'body' ).addClass( 'side-humburger_menu-active' );
		} );
		$( '.close-humburger-menu, .overlay' ).on( 'click', function() {
			$( 'body' ).removeClass( 'side-humburger_menu-active' );
		} );
	}
	//Tooltip
	function arangiTooltip(){
		$('[data-toggle="tooltip"]').tooltip();
	}
	// Preloader
	function arangiPreloader() {
	  $('.preloader').fadeOut(500,function(){$(this).remove();});
	}
	// FancyBox
	function arangiFancyBox(){
		$('.menu_open_box > a').fancybox({});
		$('.fancybox-link').fancybox({});
        $('img').on("hover",function(e){
            $(this).data("title", $(this).attr("title")).removeAttr("title");
		});
		$('.iframe_fancybox').fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'elastic',
            closeEffect : 'none'
        });
		// Choose what buttons to display by default
		$.fancybox.defaults.buttons = [
			'slideShow',
			'fullScreen',
			'thumbs',
			'close'
		];
		$('[data-fancybox]').fancybox({
			preload : "auto",
			thumbs : {
				autoStart : true
			},
			touch: false
		});


		if(arangi_params.arangi_woo_enable == 'yes'){
    		$(".fancybox-zoomcontainer").fancybox({
    			helpers : {
    			  title : {
    			   type : 'inside'
    			  },
    			  buttons : {},
    			  thumbs : {
    			   width : 50,
    			   height : 50
    				}
    			},
    			afterShow: function() {
    		        $('.zoomContainer').remove();
    		        $('img.fancybox-image').elevateZoom({
    		            zoomType: "inner",
    		            cursor: "crosshair",
    		            zoomWindowFadeIn: 500,
    		            zoomWindowFadeOut: 750
    		        });
    		    },
    		    afterClose: function() {
    		        $('.zoomContainer').remove();
    				$('img.zoom').elevateZoom({
    		            zoomType: "inner",
    		            cursor: "crosshair",
    		            zoomWindowFadeIn: 500,
    		            zoomWindowFadeOut: 750
    		        });
    		    }
    		});
		}
	}
	//Validate Form
	function arangiValidateForm(){
		if(arangi_params.arangi_valid_form == 'yes'){
		  $('#commentform').validate();
		}
	}
	//Animation

	function arangiAnimation(){
		if ($(window).width() > 991){
	        var wow = new WOW({
	                mobile: false
	        });
	        wow.init();
	    }
		if ( $(window).width() < 767) {
	     $('div').removeClass('tm-animation');
	    }
		if(arangi_params.arangi_animation == 'yes'){
	        $('.animated').appear(function() {
	            var item = $(this);
	            var animation = item.data('animation');
	            if ( !item.hasClass('visible') ) {
	                var animationDelay = item.data('animation-delay');
	                if ( animationDelay ) {
	                    setTimeout(function(){
	                        item.addClass( animation + " visible" );
	                    }, animationDelay);
	                } else {
	                    item.addClass( animation + " visible" );
	                }
	            }
			});
	    }
	}
	//One Page
	function arangiOnePage(){
        $('.main-navigation ul.mega-menu > li > a[href*="#"]:not([href="#"]), .site-header .mega-menu .children li a[href*="#"]:not([href="#"])').on('click', function(){
			$('.main-navigation ul.mega-menu > li > a[href*="#"]:not([href="#"]), .site-header .mega-menu .children li a[href*=#]:not([href="#"])').removeClass('active');
			$(this).addClass('active');
			$('html').removeClass('openmenu');
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
				|| location.hostname == this.hostname){
				var target = $(this.hash),
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length){
					$('html,body').animate({
					  scrollTop: target.offset().top - 90
					}, 500);
					return false;
				}
			}
        });
        $('.text-map a[href*="#"]:not([href="#"])').on('click', function(){
			$('.text-map a[href*="#"]:not([href="#"])').removeClass('active');
			$(this).addClass('active');
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
				|| location.hostname == this.hostname){
				var target = $(this.hash),
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length){
					$('html,body').animate({
					  scrollTop: target.offset().top - 90
					}, 500);
					return false;
				}
			}
        });
	}
	// Fix Height Content
    function arangi_HeightContentResize() {
    	var h = $(window).height();
		var heightHeader = $('.site-header').height();
		var heightFooter = $('footer').height();
		var widthInstagram = $('.footer-instagram .widget.instagram .instagram-gallery .instagram-img').width();
		$('.footer-instagram .widget.instagram .instagram-gallery .instagram-img').css('height', widthInstagram + 'px');
		var widthInstagram1 = $('.footer-top .widget.instagram .instagram-gallery .instagram-img').width();
		$('.footer-top .widget.instagram .instagram-gallery .instagram-img').css('height', widthInstagram1 + 'px');
		var widthInstagram2 = $('.active-sidebar .widget.instagram .instagram-gallery .instagram-img').width();
		$('.active-sidebar .widget.instagram .instagram-gallery .instagram-img').css('height', widthInstagram2 + 'px');
		var wdw = $(window).width();
		if($(window).width() < 992){
			if($('.site-header').hasClass('header-bottom')){
				$('footer').css('margin-bottom', heightHeader + 'px');
			}
		}
		if($(window).width() > 767){
			if($('#page').hasClass('footer-fixed')){
				$('#page').css('margin-bottom', heightFooter + 'px');
			}
		}
		// Fix height header vertical
		var height = $(window).height();
		var width = $(window).width();
		var heightNav = $('.header-sidebar').height();
		var heightNavMenu = $('.mega-menu').height();

		if( heightNav > height ){
			$('.header-ver').addClass('header-scroll');
		}
		if(width < 992){
			if( heightNavMenu > height ){
				$('.header-center').addClass('header-scroll');
			}
		}
		// Fix Height Category Menu Home 1
		var heightSliderHomeResize = $('.slider-home .rev_slider_wrapper').height();
		if($(window).width() > 991){
			$('.wpb_text_column .product-categories').css('height', heightSliderHomeResize + 'px');
		}
    }
	
	function  arangiInsertTags(){
		//$(".post-single .single-img").insertAfter( $( ".post-single .blog_post_desc .elementor-section-wrap > .elementor-section:first-child" ) );
		if($('div').hasClass('blog-list')) {$('.archive').addClass('blog-bg')};
		if($('div').hasClass('blog-masonry')) {$('.archive').addClass('blog-bg')};
		if($('div').hasClass('right-sidebar')) {$('.main-sidebar').addClass('has-right-sidebar')};

		$('.comment-list .comment ul').find('children').each(function(){
			var container = $(this);
			container .find('.children').addClass('comment-parent');
		})

		$('.blog-grid.grid-style2 .blog-item').each(function(){
			var container = $(this);
			container .find('.custom-date').appendTo(container.find('.blog-img'));
		})
		$('.blog-masonry .blog-item').each(function(){
			var container = $(this);
			container .find('.custom-date').appendTo(container.find('.blog-img'));
		})

		$('.comment-item').each(function(){
			var container = $(this);
			container .find('.wpulike.wpulike-default ').appendTo(container.find('.comment-actions'));

		})
		$('.post-single').each(function(){
			var container = $(this);
			container .find('.wpulike.wpulike-robeen').appendTo(container.find('.action'));
		})
	}
	function createCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}

	//Read cookie
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	function eraseCookie(name) {
		createCookie(name,"",-1);
	}
	function arangiPopup(){
	    var delay = 300;
		var visits = $.cookie('visits') || 0;
		visits++;
		$.cookie('visits', visits, { expires: 1, path: '/' });
		var $form = $('form');
		$("input#not_show_popup_again").change(function () {
			if ($(this).is( ":checked" )){
				document.cookie = "dont_show = Don't show this popup again";
			}
		})
		if (readCookie('dont_show')) {
			$(".popup-sale-off, #list-builder").hide();
		}else {
			$("#list-builder").delay(delay).fadeIn("fast", function(e) {
				$(".popup-sale-off").fadeIn("fast", function(e) {});
			});

			$(".close-popup").on('click',function(e){
				$(".popup-sale-off, #list-builder").hide();
			});
		}
	}

	// Search box
	function arangiSearchBox() {

		$( '#page' ).on( 'click', '.btn-search', function( e ) {
			e.preventDefault();
			$('.search-box').slideToggle();
		} );

		$( '.search-box' ).on( 'click', '.close-search-box', function() {
			$('.search-box').slideToggle();
		} );

		$( '.menu-mobile' ).on( 'click', '.mobile-tool .account-header > a', function() {
			$('.account-header ul.content-filter').slideToggle();
		} );

		$( '.mobile-tool-right .lang-1' ).on( 'click', function() {
			$('.mobile-tool-right .content-filter').slideToggle();
		} );
		$( ".product-number > .arrow-item" ).on( "click", function() {
			$('#order_review tbody').slideToggle();
			$(this).toggleClass("active");
		});
	}
    function arangiPopup_login() { 
		//Add view password into checkbox field
		$('.login-password').append('<span class="show_pass"><i class="fa fa-eye"></i></span>');
		$(document).on('click', '.show_pass', function() {
			var el = $(this),
				account_pass = el.parents('.login-password').find('>input');
			if (el.hasClass('active')) {
				account_pass.attr('type', 'password');
				$('.show_pass .fa').addClass('fa-eye').removeClass('fa-eye-slash');

			} else {
				account_pass.attr('type', 'text');
				$('.show_pass .fa').addClass('fa-eye-slash').removeClass('fa-eye');

			}
			el.toggleClass('active');
		});
	}

	function arangiHandlerPageNotFound() {
		var page   = $( '#page' ).find( '.error-page' );
		var height = $( window ).height();
		var width = $( window ).width();
		var h_content = $('.coming-soon').height();
		page.css( {
			'min-height': height
		} );
		if (height <= h_content){
			$( '#page' ).find( '.coming-soon-container' ).css( {
				'min-height': h_content + 200
			} );
		}
	}
	function arangiStickySidebar() {
		if ($('.main-sidebar.has-sidebar').height() > $('.active-sidebar .sticky-sidebar').height() ) {
			$('.left-sidebar .sticky-sidebar, .right-sidebar .sticky-sidebar').stick_in_parent({offset_top: 130});
		}
	}

	/**
	 * DOMready event.
	 */

	$( document ).ready( function() {
		arangiWoocommer();
		arangiStickyMenu();
		arangiClick();
		arangiFillterIsotop();
		arangiRemoveActive();
		arangiHeightContent();
		arangiMenu();
		arangiFixSubMenu(); 
		arangiCounter();
		arangiTooltip();
		arangiScroll_bar_tab();
		if(arangi_params.arangi_preloader == 'yes'){
			arangiPreloader();
		}
		if(arangi_params.arangi_slick_enable == 'yes'){
			arangiTestimonial();
			postGallery();
			gallerySlider(1);
		}
		arangiFancyBox();
		arangiValidateForm();
		arangiAnimation();
		arangiOnePage();
		arangiAutocompleteSearch();
		arangiPopup();
        arangiInsertTags();
		arangiComing_soon_countdown();
		arangiHumburgerMenu();
		arangiSearchBox();
		arangiPopup_login();
		arangiHandlerPageNotFound();
		arangiMegamenu();
		arangiStickySidebar();
	});
	$(window).resize(function () {
		arangi_HeightContentResize();
		arangiLoadMore();
		if($(window).width() < 992){
			arangiRemoveActive();
		}
		arangiHandlerPageNotFound();
		arangiMegamenu();
		arangiStickyMenu();
	});
	$(window).load(function() {
		arangiScrollTop();
		arangiFilterIsotopLoad();
		arangiLoadMore();
	});
})(jQuery);

function arangiJsAnimateMenu1(tog) {
	if(tog == 'open') {
	  jQuery('html').addClass('openmenu openmenu-ver');
	}
	if(tog == 'close') {
	  jQuery('html').removeClass('openmenu openmenu-ver');
	}
}
function arangiJsAnimateMenu2(tog) {
	if(tog == 'open') {
	  jQuery('html').addClass('openmenu');
	}
	if(tog == 'close') {
	  jQuery('html').removeClass('openmenu');
	}
}
// Active Cart, Search
function arangiToggleFilter(obj){
    if(jQuery(window).width() < 1199){
		if(jQuery(obj).parent().find('> .content-filter').hasClass('active')){
			jQuery(obj).parent().find('> .content-filter').removeClass('active');
			jQuery(obj).removeClass('btn-active');
		}else{
			jQuery('.cart_label, .languges-flags > a').removeClass('btn-active');
			jQuery('.content-filter').removeClass('active');
			jQuery(obj).parent().find(' > .content-filter').addClass('active');
			jQuery(obj).addClass('btn-active');
		}
    }
}