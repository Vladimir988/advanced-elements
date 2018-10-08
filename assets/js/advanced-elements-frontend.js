( function( $, elementor ) {

	"use strict";

	var AdvancedWidget = {

		advancedInit: function() {
			var widgets = {
					'advanced-posts.default'           : AdvancedWidget.initPostsOwl,
					'advanced-map.default'             : AdvancedWidget.initMap,
					'advanced-animated-box.default'    : AdvancedWidget.initAnimatedBox,
					'advanced-carousel.default'        : AdvancedWidget.initAdvancedCarousel,
					'advanced-countdown-timer.default' : AdvancedWidget.initCountdownTimer,
					'advanced-circle-carousel.default' : AdvancedWidget.initCircleCarousel,
					'advanced-slider.default'          : AdvancedWidget.initSlider,
					'advanced-image-gallery.default'   : AdvancedWidget.initGallery,
					'advanced-testimonials.default'    : AdvancedWidget.testiSlider,
					'advanced-progress-bar.default'    : AdvancedWidget.progressBar,
					'advanced-circle-bar.default'      : AdvancedWidget.circleProgressBar,
				};
				$.each( widgets, function( widget, callback ) {
					window.elementorFrontend.hooks.addAction( 'frontend/element_ready/' + widget, callback );
				});
		},
		initPostsOwl: function( $scope ) {
			var $carousels_collection = $( '.posts-owl', $scope );
			if( $carousels_collection.length && 'function' == typeof $.fn.owlCarousel ) {
				$carousels_collection.each( function( el, index ) {
					var $this = $( this ),
							$options = $this.data( 'posts-options' ),
							$defaults = {
								loop:true,
								margin:20,
								nav:true,
								responsive:{
									0:{
										items:1
									},
									767:{
										items:2
									},
									1025:{
										items:3
									}
								}
							};
						$options = $.extend( {}, $defaults, $options );
					$this.owlCarousel( $options );
				});
			}
		},
		initMap: function( $scope ) {
			var $container = $scope.find( '.advanced-map' ), map, settings, markers;
			if ( !window.google || !$container.length ) { return; }

			settings = $container.data( 'settings' );
			markers = $container.data( 'markers' );
			map  = new google.maps.Map( $container[0], settings );

			if ( markers ) {
				$.each( markers, function( index, pin ) {
					var marker, infowindow,
						pinData = {
						position: pin.position,
						map: map
					};
					if ( '' !== pin.image ) {
						pinData.icon = pin.image;
					}
					marker = new google.maps.Marker( pinData );
					if ( '' !== pin.desc ) {
						infowindow = new google.maps.InfoWindow({
							content: pin.desc,
							disableAutoPan: true
						});
					}
					marker.addListener( 'click', function() {
						infowindow.setOptions({ disableAutoPan: false });
						infowindow.open( map, marker );
					});
					if ( 'visible' === pin.state && '' !== pin.desc ) {
						infowindow.open( map, marker );
					}
				});
			}
		},
		initAnimatedBox: function( $scope ) {
			var $target = $scope.find( '.advanced-animated-box' );
			if ( ! $target.length ) {
				return;
			}
			$target.mouseenter(function() {
				$( this ).addClass( 'flipped' );
			});
			$target.mouseleave(function() {
				$( this ).removeClass( 'flipped' );
			});
		},
		initAdvancedCarousel: function( $scope ) {
			var $carousels_collection = $( '.advanced-carousel', $scope );
			if( $carousels_collection.length && 'function' == typeof $.fn.owlCarousel ) {
				$carousels_collection.each( function( el, index ) {
					var $this = $( this ),
							$options = $this.data( 'carousel-settings' ),
							$defaults = {
								loop:true,
								margin:20,
								nav:true,
								responsive:{
									0:{
										items:1
									},
									767:{
										items:2
									},
									1025:{
										items:3
									}
								}
							};
						$options = $.extend( {}, $defaults, $options );
					$this.owlCarousel( $options );
				});
			}
		},
		initCountdownTimer: function( $scope ) {

			var countSetInterval,
					$coutDown = $scope.find( '[data-get-date]' ),
					endTime = new Date( $coutDown.data( 'get-date' ) ),
					elements = {
						days: $coutDown.find( '[data-value="days"]' ),
						hours: $coutDown.find( '[data-value="hours"]' ),
						minutes: $coutDown.find( '[data-value="minutes"]' ),
						seconds: $coutDown.find( '[data-value="seconds"]' )
					};

			AdvancedWidget.initCountdownTimer.initClock = function() {
				AdvancedWidget.initCountdownTimer.upDateClock();
				countSetInterval = setInterval( AdvancedWidget.initCountdownTimer.upDateClock, 1000 );
			};

			AdvancedWidget.initCountdownTimer.upDateClock = function() {
				var timeRemaining = AdvancedWidget.initCountdownTimer.getTimeRemaining( endTime );
				$.each( timeRemaining.timeParts, function( timePart ) {
					var $elementsTime = elements[ timePart ];
					if( $elementsTime.length ) {
						$elementsTime.html( this );
					}
				} );
				if( timeRemaining.total <= 0 ) { clearInterval( countSetInterval ); }
			};

			AdvancedWidget.initCountdownTimer.getTimeRemaining = function( endTime ) {
				var timeRemaining = endTime - new Date(),
						days          = Math.floor( timeRemaining / ( 1000 * 60 * 60 * 24 ) ),
						hours         = Math.floor( ( timeRemaining % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) ),
						minutes       = Math.floor( ( timeRemaining % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) ),
						seconds       = Math.floor( ( timeRemaining % ( 1000 * 60 ) ) / 1000 );

				if ( days < 0 || hours < 0 || minutes < 0 ) { seconds = minutes = hours = days = 0; }

				return {
					total: timeRemaining,
					timeParts: {
						days    : AdvancedWidget.initCountdownTimer.splitTheNumbers( days ),
						hours   : AdvancedWidget.initCountdownTimer.splitTheNumbers( hours ),
						minutes : AdvancedWidget.initCountdownTimer.splitTheNumbers( minutes ),
						seconds : AdvancedWidget.initCountdownTimer.splitTheNumbers( seconds )
					}
				};
			};

			AdvancedWidget.initCountdownTimer.splitTheNumbers = function( Numbers ) {
				var Numbers  = Numbers.toString(),
						numArray = [],
						Result   = '';

				if ( 1 === Numbers.length ) {
					Numbers = 0 + Numbers;
				}

				numArray = Numbers.match(/\d{2}/g);

				$.each(numArray, function( index, value ) {
					Result += '<span class="advanced-countdown-timer-digit">' + value + '</span>';
				});

				return Result;
			};

			AdvancedWidget.initCountdownTimer.initClock();
		},
		initCircleCarousel: function( $scope ) {
			var plugins = {
				customCarousel: document.querySelectorAll( '.advanced-circle-carousel' )
			};
			if( plugins.customCarousel.length ) {
				for ( var i = 0; i < plugins.customCarousel.length; i++ ) {
					var carousel = initCarousel({
						node: plugins.customCarousel[i],
						speed: plugins.customCarousel[i].getAttribute( 'data-speed' ),
						autoplay: plugins.customCarousel[i].getAttribute( 'data-autoplay' )
					});
				}
			}
		},
		initSlider: function( $scope ) {
			var $slider_collection = $( '.advanced-slider', $scope );
			if( $slider_collection.length && 'function' == typeof $.fn.sliderPro ) {
				$slider_collection.each( function( el, index ) {
					var $this = $( this ),
							$options = $this.data( 'slider-settings' ) || {},
							$defaults = {
								width: '100%',
								height: 600,
								arrows: true,
								buttons: false,
								fullScreen: true,
								thumbnailArrows: true,
								autoplay: false
							};
						$options = $.extend( {}, $defaults, $options );
					$this.sliderPro( {
						width                  : $options['width'],
						height                 : $options['height'],
						thumbnailWidth         : $options['thumbnailWidth'],
						thumbnailHeight        : $options['thumbnailHeight'],
						breakpoints            : $options['breakpoints'],
						arrows                 : $options['arrows'],
						buttons                : $options['buttons'],
						fullScreen             : $options['fullScreen'],
						arrows                 : $options['arrows'],
						buttons                : $options['buttons'],
						autoplay               : $options['autoplay'],
						autoplayDelay          : $options['autoplayDelay'],
						autoplayOnHover        : $options['autoplayOnHover'],
						slideAnimationDuration : $options['slideAnimationDuration'],
						shuffle                : $options['shuffle'],
						loop                   : $options['loop'],
						thumbnailsPosition     : $options['thumbnailsPosition'],
						fadeArrows             : $options['fadeArrows'],
						imageScaleMode         : 'exact',
						waitForLayers          : false,
						grabCursor             : false,
						init: function() {
							$( '.sp-previous-arrow' ).append( '<i class="' + ( $options['arrows_icon'] ) + '"></i>' );
							$( '.sp-next-arrow' ).append( '<i class="' + ( $options['arrows_icon'] ) + '"></i>' );
							$( '.sp-full-screen-button' ).append( '<i class="' + ( $options['fullscreen_icon'] ) + '"></i>' );
						}
					} );
				});
			}
		},
		initGallery: function( $scope ) {
			var $current  = $scope.find( '.advanced-image-gallery' ),
					$instance = null,
					$settings = {};

			if ( !$current.length ) { return; }

			$settings = $current.data( 'options' );
			$instance = new advancedImageGallery( $current, $settings );
			$instance.init();
		},
		testiSlider: function( $scope ) {
			var $carousels_collection = $( '.advanced-testimonials', $scope );
			if( $carousels_collection.length && 'function' == typeof $.fn.owlCarousel ) {
				$carousels_collection.each( function( el, index ) {
					var $this = $( this ),
							$options = $this.data( 'options' ),
							$defaults = {
								loop:true,
								margin:20,
								nav:true,
								responsive:{
									0:{
										items:1
									},
									767:{
										items:2
									},
									1025:{
										items:3
									}
								}
							};
						$options = $.extend( {}, $defaults, $options );
					$this.owlCarousel( $options );
				});
			}
		},
		progressBar: function( $scope ) {
			var $target      = $scope.find( '.advanced-progress-bar' ),
					percent      = $target.data( 'percent' ),
					type         = $target.data( 'type' ),
					deltaPercent = percent * 0.01;

			elementorFrontend.waypoint( $target, function( direction ) {
				var $this       = $( this ),
						animeObject = { charged: 0 },
						$statusBar  = $( '.advanced-progress-bar-status-bar', $this ),
						$percent    = $( '.advanced-progress-bar-percent-value', $this ),
						animeProgress,
						animePercent;
				if ( 'template_type_7' == type ) {
					$statusBar.css( { 'height': percent + '%' } );
				} else {
					$statusBar.css( { 'width': percent + '%' } );
				}
				animePercent = anime( {
					targets  : animeObject,
					charged  : percent,
					round    : 1,
					duration : 1000,
					easing   : 'easeInOutQuad',
					update   : function() {
						$percent.html( animeObject.charged );
					}
				} );
			} );
		},
		circleProgressBar: function( $scope ) {
			var $progress = $scope.find( '.svg-circle-progress' );
			if ( ! $progress.length ) {
				return;
			}
			var $value        = $progress.find( '.circle-progress-value' ),
					percent       = parseInt( $value.data( 'value' ) ),
					radius        = parseInt( $progress.data( 'radius' ) ),
					circumference = parseInt( $progress.data( 'circumference' ) ),
					progress      = percent / 100,
					dashoffset    = circumference * ( 1 - progress ),
					duration      = $scope.find( '.advanced-circle-progress-bar-wrap' ).data( 'duration' );

			$value.css({
				'transitionDuration': duration + 'ms'
			});
			elementorFrontend.waypoint( $scope, function() {
				var $number = $scope.find( '.circle-counter-number' ),
						data    = $number.data();
				var decimalDigits = data.toValue.toString().match( /\.(.*)/ );
				if ( decimalDigits ) {
					data.rounding = decimalDigits[1].length;
				}
				data.duration = duration;
				$number.numerator( data );
				$value.css({
					'strokeDashoffset': dashoffset
				});
			}, { offset: 'bottom-in-view' } );
		},
	};

	$( window ).on( 'elementor/frontend/init', AdvancedWidget.advancedInit );

	window.advancedImageGallery = function( $current, $settings ) {
		var $instanceList    = $( '.advanced-image-gallery-list', $current ),
				$itemsList       = $( '.advanced-image-gallery-item', $current ),
				$settings        = $settings || {},
				$defaultSettings = {
					layoutType: 'masonry',
					columns: 3,
					columnsTablet: 2,
					columnsMobile: 1,
					justifyHeight: 300
				};
		$.extend( $defaultSettings, $settings );
		this.layoutBuild = function() {
			switch ( $settings['layoutType'] ) {
				case 'masonry':
					salvattore.init();
				break;
				case 'justify':
					$itemsList.each( function() {
						var $this          = $( this ),
								$imageInstance = $( '.advanced-gallery-img', $this ),
								imageWidth     = $imageInstance.data( 'width' ),
								imageHeight    = $imageInstance.data( 'height' ),
								imageRatio     = +imageWidth / +imageHeight,
								flexValue      = imageRatio * 100,
								newWidth       = +$settings['justifyHeight'] * imageRatio,
								newHeight      = 'auto';
								
						$this.css( {
							'flex-grow': flexValue,
							'flex-basis': newWidth
						} );
					} );
				break;
			}

			/*$( '.advanced-gallery-img-wrap', $itemsList ).imagesLoaded().progress( function( instance, image ) {
				var $image      = $( image.img ),
						$parentItem = $image.closest( '.advanced-images-layout__item' ),
						$loader     = $( '.advanced-images-layout__image-loader', $parentItem );

				$parentItem.addClass( 'image-loaded' );

				$loader.fadeTo( 500, 0, function() {
					$( this ).remove();
				} );

			});*/
		}

		this.init = function() {
			this.layoutBuild();
		}
	}

}( jQuery, window.elementorFrontend ) );