	$('.faculty').matchHeight();
	$('.theatre-box').matchHeight();
	$('.image-tile-box-inner').matchHeight();

	$('.gallery').photobox('a');

	$('#accordion-2 .panel-title div.collapsed').prepend('<i class="fa fa-plus"></i>');

	//Add alt/title tags to links
	$('a').each(function () {
	    if ($(this).attr('title') === undefined && $(this).attr('alt') === undefined) {
	        var linkTxt = $(this).text();
	        if (linkTxt.length >= 2) {
	            $(this).attr({
	                title: linkTxt,
	                alt: linkTxt
	            });
	        } else {
	            var linkLocation = $(this).attr('href');
	            if (linkLocation == undefined) {} else {
	                var sanitized = sanitize(linkLocation);
	                $(this).attr({
	                    title: sanitized,
	                    alt: sanitized
	                });
	            }
	        }
	    } else {
	        var title = $(this).attr('title');
	        var alt = $(this).attr('alt');
	        switch (title) {
	            case undefined:
	                $(this).attr({
	                    title: alt
	                });
	                break;
	        }
	        switch (alt) {
	            case undefined:
	                $(this).attr({
	                    alt: title
	                });
	                break;
	        }
	    }
	});

	function sanitize(str) {
	    var sani = str.replace(/[^A-Z0-9]/ig, " "); // Removes Special Charaters with Spaces 
	    sani = sani.replace(/^(\s*)([\W\w]*)(\b\s*$)/g, '$2');
	    return sani.replace(/\b[a-z]/gi, function (char) { // Caps First leter From Words 
	        return char.toUpperCase();
	    });
	}

	//FAQs Toggle
	$('.faq-toggle').click(function () {
	    $(this).parent().children('.faq-info').slideToggle('500');
	    $(this).toggleClass('active');
	});

	//Main Nav
	$('.dropdown-toggle .caret').click(function (event) {
	    event.preventDefault();
	    event.stopImmediatePropagation();
	    var dropdown = $(this).parent().parent().children('.dropdown-menu');
	    $(this).toggleClass('active');
	    dropdown.slideToggle();
	});

	//Mobile Nav Toggler
	$('#nav-toggler').click(function () {
	    $('#menu-wrap').slideToggle('300');
	    $('#nav-toggler').toggleClass('active');
	});

	//Mobile Dropdowns
	if ($(window).outerWidth() <= 767) {
	    //This adds class to a tag if there is a child named Dropdown Menu	
	    $('.sub-menu').parent().addClass('dropdown-toggle');
	    //This adds the back class to the Ul that has the dropdown class	
	    $('#menu-wrap .sub-menu').prepend('<span class="back"></span>');
	    //This adds the caret class to A tags with children that have the class Dropdown Toggle	
	    $('#menu-wrap .dropdown-toggle>a').prepend('<span class="caret"></span>');
	    $('#mobile-nav .dropdown-toggle>a').append('<span class="caret-2"></span>');
	    $('#mobile-nav .sub-menu').css('display', 'none');

	    $('.nav-toggler').click(function () {
	        //Makes sure the classes are removed when the Toggler is clicked
	        $('.sub-menu').removeClass('slide-in');
	        $('.sub-menu').removeClass('slide-out');

	        $('ul.mobile-list li').each(function () {
	            if ($(this).hasClass('active')) {
	                $(this).removeClass('active');
	                var dropdown = $(this).find('.sub-menu');
	                $(this).find('span.caret-2').toggleClass('active');
	                dropdown.toggleClass('active-dropdown');
	                dropdown.slideToggle('300');
	                $('#nav-toggler').addClass('active');
	            }

	        });

	    });

	    $('.caret').click(function (event) {
	        //Removes the slide out class. Then addes the Slide in class to the UL Dropdown Menu when the span caret is clicked.  
	        event.preventDefault();
	        event.stopImmediatePropagation();
	        var dropdown = $(this).parent().parent();
	        x = dropdown.children('.sub-menu');
	        x.removeClass('slide-out');
	        x.addClass('slide-in');
	    });
	    $('.back').click(function () {
	        //Removes the slide in class. And adds the slide out.
	        $(this).parent().toggleClass('slide-in');
	        $(this).parent().toggleClass('slide-out');

	    });

	    $('ul.mobile-list li.dropdown-toggle').each(function () {
	        $(this).click(function (event) {
	            $('#menu-wrap').slideUp('300');

	            $(this).toggleClass('active');

	            var dropdown = $(this).find('.sub-menu');
	            $(this).find('span.caret-2').toggleClass('active');
	            dropdown.toggleClass('active-dropdown');
	            dropdown.slideToggle('300');
	            dropdown.css('opacity', '1');

	            $('ul.mobile-list li.active').not(this).each(function () {
	                $(this).removeClass('active');
	                var dropdown = $(this).find('.sub-menu');
	                $(this).find('span.caret-2').toggleClass('active');
	                dropdown.toggleClass('active-dropdown');
	                dropdown.slideToggle('300');
	            });
	        });
	    });
	}

	/* Scroll To Code */
	$(window).on("load", function () {
	    $(document).ready(function () {
	        if (location.hash) {
	            scrollPageToAnchor(window.location.hash);
	        }
	        $('a').click(function (e) {
	            if ($(this).attr("href") != window.location.href && $(this)[0].host + $(this)[0].pathname == window.location.host + window.location.pathname && $(this).attr('data-toggle') == undefined) {
	                e.preventDefault();
	                scrollPageToAnchor($(this)[0].hash);
	                window.location.hash = $(this)[0].hash;
	                var noHashURL = window.location.href.replace(/#.*$/, '');
	                window.history.replaceState('', document.title, noHashURL);
	            }
	        });

	        function scrollPageToAnchor(anchor) {
	            anchor = anchor.replace('/', '');
	            var anchorMarginPadding = $(anchor).outerHeight(true) - $(anchor).innerHeight();
	            var scrollDuration = 1000;
	            var toggleContentHeight = $('.toggle-content').outerHeight();
	            var gallerySubtraction = toggleContentHeight * 2;
	            var mobileHeaderHeight = $('.c2a').outerHeight() + $('.main-nav').outerHeight();
	            if ($(window).outerWidth() > 767) {
	                $('html, body').animate({
	                    scrollTop: $(anchor).offset().top - anchorMarginPadding
	                }, scrollDuration);
	            } else {
	                $('html, body').animate({
	                    scrollTop: $(anchor).offset().top - anchorMarginPadding - mobileHeaderHeight
	                }, scrollDuration);
	            }

	        }
	    });
	});

	//Pull out side menu
	$('#side-pull-out').slideReveal({
	    trigger: $(".nav-trigger"),
	    position: "right",
	    push: false,
	    width: 400
	});

	//Pull out side menu trigger toggle
	$('.nav-trigger .btn').click(function () {
	    $(this).children('i').toggleClass('open');
	})

	//Banner Parallax Effect
	$(document).ready(function () {
	    if ($(window).outerWidth() > 991) {
	        $(window).on('load scroll', function () {
	            var scrolled = $(this).scrollTop();
	            $('.home #banner img').css('transform', 'translate3d(0, ' + -(scrolled * .5) + 'px, 0)');
	            $('.home #banner video').css('transform', 'translate3d(0, ' + -(scrolled * .5) + 'px, 0)');
	        });
	    }

	});

	//Banner Heights
	$(document).ready(function () {
	    if ($(window).outerWidth() > 991) {
	        function setHeight() {
	            windowHeight = $(window).innerHeight();
	            $('.home #banner').css('height', windowHeight - 150);
	        };
	        setHeight();
	        $(window).resize(function () {
	            setHeight();
	        });
	    }
	});

	//Object Fit IE Slider fix
	if ($(window).outerWidth() > 991) {
	    function ObjectFitIt() {
	        $('.home #banner img').each(function () {
	            var imgSrc = $(this).attr('src');
	            var fitType = 'cover';
	            if ($(this).data('fit-type')) {
	                fitType = $(this).data('fit-type');
	            }
	            $(this).parent().css({
	                'background': 'transparent url("' + imgSrc + '") fixed no-repeat center center/' + fitType,
	            });
	            $('.home #banner img').css('display', 'none');
	        });
	    }
	}
	if ('objectFit' in document.documentElement.style === false) {
	    ObjectFitIt();
	}



	//Class adding/removing responsively on home page
	$(document).ready(function () {
	    var $window = $(window);

	    function checkWidth() {
	        var windowsize = $window.outerWidth();
	        if (windowsize < 1201) {
	            $('.welcome-block').removeClass('flex-50');
	            $('.calendar-block').addClass('flex-50');
	            $('.calendar-block').removeClass('flex-25');
	            $('.additional-block').addClass('flex-50');
	            $('.additional-block').removeClass('flex-25');
	        } else {
	            $('.welcome-block').addClass('flex-50');
	            $('.calendar-block').removeClass('flex-50');
	            $('.calendar-block').addClass('flex-25');
	            $('.additional-block').removeClass('flex-50');
	            $('.additional-block').addClass('flex-25');
	        }
	    }
	    checkWidth();
	    $(window).resize(checkWidth);
	});

	//Logo Scroller
	$('#image-scroller').slick({
	    dots: false,
	    arrows: false,
	    infinite: false,
	    speed: 300,
	    slidesToShow: 2,
	    slidesToScroll: 1,
	    autoplay: true,
	    autoplaySpeed: 10000,
	    infinite: true,
	    swipeToSlide: true,
	    responsive: [{
	        breakpoint: 1200,
	        settings: {
	            slidesToShow: 2
	        }
        }, {
	        breakpoint: 991,
	        settings: {
	            slidesToShow: 1
	        }
        }, {
	        breakpoint: 767,
	        settings: {
	            slidesToShow: 1
	        }
        }]
	});

	//Directory Search Function
	$(document).ready(function () {
	    $("#myInput").on("keyup", function () {
	        var value = $(this).val().toLowerCase();
	        $(".staff-members .staff-member-box").filter(function () {
	            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	        });
	        $(".staff-members").each(function () {
	            var staffBoxes = $(this).children('.staff-members-container');
	            var staffBox = staffBoxes.children();
	            var staffBoxesCount = staffBoxes.children().length;
	            $(staffBox).each(function () {
	                if ($(this).is(':hidden')) {
	                    $(this).addClass('box-hidden');
	                } else {
	                    $(this).removeClass('box-hidden');
	                }
	            });
	            var hiddenStaffBoxes = $(this).children('.staff-members-container').children('.staff-member-box.box-hidden').length;
	            if (hiddenStaffBoxes === staffBoxesCount) {
	                var heading = $(this).find('h2');
	                heading.addClass('hidden');
	            }
	        });
	        if (value == "") {
	            $(".staff-members").each(function () {
	                $(this).children('.staff-member-box').css('display', 'block');
	                $(this).find('h2').removeClass('hidden');
	            });
	        }
	    });
	    $(window).on("load", function () {
	        var maxContentHeight = Math.max.apply(null, $('.staff-content p').map(function () {
	            return $(this).outerHeight();
	        }).get());
	        var maxBoxHeight = Math.max.apply(null, $(".staff-content-box").map(function () {
	            return $(this).outerHeight();
	        }).get());
	        $('.staff-content p').css('height', maxContentHeight);
	        $('.staff-content-box').css('height', maxBoxHeight + 20);
	    });
	});

	//Match Testimonial Heights
	function normalizeSlideHeights() {
	    $('#jobs-slider').each(function () {
	        var items = $('.item', this);
	        // reset the height
	        items.css('min-height', 0);
	        // set the height
	        var maxHeight = Math.max.apply(null,
	            items.map(function () {
	                return $(this).outerHeight()
	            }).get());
	        items.css('min-height', maxHeight + 'px');
	    })
	}
	$(window).on('load resize orientationchange', normalizeSlideHeights);

	//Form classes
	$('.form-phone, .form-email, .form-zip, .form-term').wrapAll('<div class="form-flex-display flex-wrap"></div>');

	//presidents newsletter code
	var newsletterList = $('#newsletters .newsletter-row:gt(7)');
	newsletterList.hide();

	//Apply Now Buttons
	$(document).ready(function () {
	    $('.btn:not(.job-box .btn)').each(function () {
	        var buttonText = $(this).text();
	        if (buttonText == "Apply Now") {
	            $(this).addClass("apply-now-button");
	        }
	    });
	    $('a .box-text').each(function () {
	        var linkText = $(this).text();
	        if (linkText == "Complete Application") {
	            $(this).parent('a').addClass("apply-now-button");
	        }
	    });
        $('a').each(function () {
	        var linkText = $(this).text();
	        if (linkText == "Click here to Apply Online") {
	            $(this).addClass("apply-now-button");
	        }
	    });
	    $('.apply-now-button').attr('data-toggle', 'modal');
	    $('.apply-now-button').attr('data-target', '#apply-now-popup');
	    $('.apply-now-button').removeAttr('href');
	    $('.apply-now-button').css('cursor', 'pointer');
	});


	//Menu select dropdowns
	$('.select-dropdown-menu-box li').contents().unwrap().wrap('<option/>');
	$('.select-dropdown-menu-box option').each(function () {
	    var dropdownLink = $(this).children('a').attr("href");
	    $(this).attr('value', dropdownLink);
	});
	$('.select-dropdown-menu-box option').wrapAll('<select onchange="location = this.value;"></select>');

	//Change content card width on containered sections
	$('#inner-page-content.flex-container .inner-section-contact-cards .contact-card-box').removeClass('flex-4-col-shrink');
	$('#inner-page-content.flex-container .inner-section-contact-cards .contact-card-box').addClass('flex-3-col-shrink');

	//Add pdf icon to pdf buttons
	$("a:not(.image-tile-box a):not(.btn)[href$='.pdf']").addClass('pdf-link-text');
	$(".btn[href$='.pdf']").addClass('pdf-link');
	$(".image-tile-box a[href$='.pdf'] .tile-heading").addClass('pdf-link');

	//Job application modals
	$('.job-application-btn').click(function (event) {
	    var jobTitle = $(this).parent().parent().children().children('.job-heading').text();
	    $('#input_4_4').val(jobTitle);
	});

	//Job Application Popup
	$(document).ready(function () {
	    $('.btn').each(function () {
	        var tileText = $(this).text();
	        if (tileText == "Apply For Job") {
	            $(this).addClass('job-application-popup')
	        }
	    });
	    $('.job-application-popup').attr('data-toggle', 'modal');
	    $('.job-application-popup').attr('data-target', '#job-application-popup');
	    $('.job-application-popup').removeAttr('href');
	    $('.job-application-popup').css('cursor', 'pointer');
	    $('.job-application-popup').click(function (event) {
	        var jobName = $('h2.job-name').text();
	        $('#input_4_4').val(jobName);
	    });
	});

	//Steps Feature
	$('.step-box ul li').prepend('<span class="check-mark"><i class="fas fa-check"></i></span>');
	$('.check-mark').hide();
	$('.step-box ul li').click(function (event) {
	    $(this).children('.check-mark').toggle();
	});

	//Alumni Stories Toggle
	$('.alumni-more').append('<a class="show-less">Show Less <span class="fas fa-chevron-up"></span></a>');
	$('.read-more-text').click(function () {
	    $(this).parent().parent().siblings('.alumni-more').show();
	    $(this).parent().parent('.full-text-excerpt').css('display', 'none');
	});
	$('.show-less').click(function () {
	    $(this).parent('.alumni-more').hide();
	    $(this).parent().siblings('.full-text-excerpt').css('display', 'block');
	});

	//Alumni Stories Lazy Load
	$(window).bind("load", function () {
	    $('.alumni-story-box').slice(3).hide();
	    $('.more-posts-btn').click(function () {
	        $('.alumni-story-box').slice(3).slideToggle();
	        $(this).text($(this).text() == "More Stories" ? "Less Stories" : "More Stories");
	    });
	});

    //Academic Buttons slide toggle
    $('.toggle-btn').click(function() {
        $(this).siblings('.toggle-content-box').slideToggle();
    });

	//Alumni Story Box Heights
	$(document).ready(function () {
	    $('.alumni-story-box').each(function () {
	        var postImageHeight = $(this).find('img').height() - 73;
	        $(this).find('.full-text-excerpt').css('height', postImageHeight);
	    });
	});

	//Class adding/removing on resize on interior pages
	$(document).ready(function () {
	    var $window = $(window);

	    function checkWidth() {
	        var windowsize = $window.width();
	        if (windowsize < 1600 && windowsize > 1210) {
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-4-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-2-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').addClass('flex-3-col-shrink');
	            $('.feature-box').addClass('flex-4-col-shrink');
	            $('.feature-box').removeClass('flex-2-col-shrink');
	            if ($('.image-tile-box').hasClass('four-col-tiles')) {
	                $('.image-tile-box').removeClass('flex-2-col-sm');
	                $('.image-tile-box').addClass('flex-4-col');
	                $('.image-tile-box').removeClass('four-col-tiles');
	            }
	            if ($('.image-tile-box').hasClass('three-col-tiles')) {
	                $('.image-tile-box').removeClass('flex-2-col-sm');
	                $('.image-tile-box').addClass('flex-3-col');
	                $('.image-tile-box').removeClass('three-col-tiles');
	            }
	        } else if (windowsize < 1210 && windowsize > 991) {
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-4-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-3-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').addClass('flex-2-col-shrink');
	            $('.feature-box').removeClass('flex-4-col-shrink');
	            $('.feature-box').addClass('flex-2-col-shrink');
	            if ($('.image-tile-box').hasClass('four-col-tiles')) {
	                $('.image-tile-box').removeClass('flex-2-col-sm');
	                $('.image-tile-box').addClass('flex-4-col');
	                $('.image-tile-box').removeClass('four-col-tiles');
	            }
	            if ($('.image-tile-box').hasClass('three-col-tiles')) {
	                $('.image-tile-box').removeClass('flex-2-col-sm');
	                $('.image-tile-box').addClass('flex-3-col');
	                $('.image-tile-box').removeClass('three-col-tiles');
	            }
	        } else if (windowsize < 991) {
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-4-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-3-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').addClass('flex-2-col-shrink');
	            $('.feature-box').removeClass('flex-4-col-shrink');
	            $('.feature-box').addClass('flex-2-col-shrink');
	            if ($('.image-tile-box').hasClass('flex-4-col')) {
	                $('.image-tile-box').addClass('flex-2-col-sm');
	                $('.image-tile-box').removeClass('flex-4-col');
	                $('.image-tile-box').addClass('four-col-tiles');
	            }
	            if ($('.image-tile-box').hasClass('flex-3-col')) {
	                $('.image-tile-box').addClass('flex-2-col-sm');
	                $('.image-tile-box').removeClass('flex-3-col');
	                $('.image-tile-box').addClass('three-col-tiles');
	            }
	        } else {
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-3-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').removeClass('flex-2-col-shrink');
	            $('#inner-page-content:not(.flex-container) .contact-card-box').addClass('flex-4-col-shrink');
	            $('.feature-box').addClass('flex-4-col-shrink');
	            $('.feature-box').removeClass('flex-2-col-shrink');
	            if ($('.image-tile-box').hasClass('four-col-tiles')) {
	                $('.image-tile-box').removeClass('flex-2-col-sm');
	                $('.image-tile-box').addClass('flex-4-col');
	                $('.image-tile-box').removeClass('four-col-tiles');
	            }
	            if ($('.image-tile-box').hasClass('three-col-tiles')) {
	                $('.image-tile-box').removeClass('flex-2-col-sm');
	                $('.image-tile-box').addClass('flex-3-col');
	                $('.image-tile-box').removeClass('three-col-tiles');
	            }
	        }
	    }
	    checkWidth();
	    $(window).resize(checkWidth);

	    //Home page event scroller
	    if ($('body').hasClass("home")) {

	        $('.scroll-up').css('visibility', 'hidden');
	        eventNum = 0;
	        $('.tribe-events-list-widget-events').each(function () {
	            items = $(this);

	            items.attr('event-pos', eventNum++);

	            if (items.is(":first-child")) {
	                items.addClass('first-event');
	            }
	            if (items.is(":last-child")) {
	                items.addClass('last-event');
	            }
	        });

	        $('.scrolls .fa-chevron-down').click(function () {
	            eventItems = $('.tribe-events-list-widget-events');
	            lastEventItem = $('.tribe-events-list-widget-events.last-event');
	            $(eventItems).each(function () {
	                items = $(this);

	                num = +$(items).attr('event-pos');
	                num = num - 1;
	                $(items).attr('event-pos', num);

	                height = items.outerHeight(true);
	                $(items).animate({
	                    "top": '-=' + height
	                }, "slow");
	            });

	            if ($(lastEventItem).attr('event-pos') == '1') {
	                $('.scroll-down').css('visibility', 'hidden');
	            }

	            if ($(lastEventItem).attr('event-pos') > '1') {
	                $('.scroll-down').css('visibility', 'visible');
	            }
	            $('.scroll-up').css('visibility', 'visible');

	        });
	        $('.scrolls .fa-chevron-up').click(function () {
	            eventItems = $('.tribe-events-list-widget-events');
	            firstEventItem = $('.tribe-events-list-widget-events.first-event');
	            lastEventItem = $('.tribe-events-list-widget-events.last-event');
	            $(eventItems).each(function () {

	                items = $(this);

	                num = +$(items).attr('event-pos');
	                num = num + 1;
	                $(items).attr('event-pos', num);

	                if ($(lastEventItem).attr('event-pos') > '1') {
	                    $('.scroll-down').css('visibility', 'visible');
	                }
	                if ($(firstEventItem).attr('event-pos') == '0') {
	                    $('.scroll-up').css('visibility', 'hidden');
	                }

	                height = items.outerHeight(true);
	                $(items).animate({
	                    "top": '+=' + height
	                }, "slow");
	            });
	        });

	    }

	    if ($('body').hasClass("page-template-page-main-inner")) {
	        //Item Scroller
	        $(window).on("load", function () {
	            $('.item-scroller').each(function () {
	                var itemsShown = $(this).attr('data-items-shown');
	                var itemsCount = $(this).children().children('.scroll-item-box').length;
	                var maxItemHeight = Math.max.apply(null, $(this).children().children('.scroll-item-box').map(function () {
	                    return $(this).outerHeight();
	                }).get());
	                $(this).children().children('.scroll-item-box').css('height', maxItemHeight);
	                $(this).children('.scroller-box').css('height', maxItemHeight * itemsShown);
	                if (itemsCount <= itemsShown) {
	                    $(this).children('.scrolls').css('display', 'none');
	                    $(this).children('.scroller-box').css('height', maxItemHeight * itemsCount);
	                }
	                $(this).children().children('.scroll-up').css('visibility', 'hidden');
	                itemNum = 0;
	                $(this).children().children('.scroll-item-box').each(function () {
	                    var items = $(this);
	                    items.attr('item-pos', itemNum++);
	                    if (items.is(":first-child")) {
	                        items.addClass('first-event');
	                    }
	                    if (items.is(":last-child")) {
	                        items.addClass('last-event');
	                    }
	                });
	                $(this).children().children().children('.fa-chevron-down').click(function () {
	                    var itemsGroup = $(this).parent().parent().siblings().children('.scroll-item-box');
	                    var lastItem = $(this).parent().parent().siblings().children('.scroll-item-box.last-event');
	                    var itemsShown = $(this).parent().parent().parent('[data-items-shown]').attr('data-items-shown');
	                    var itemPosition = itemsShown - 1;
	                    $(itemsGroup).each(function () {
	                        var items = $(this);
	                        num = +$(items).attr('item-pos');
	                        num = num - 1;
	                        $(items).attr('item-pos', num);

	                        height = items.outerHeight(true);
	                        $(items).animate({
	                            "top": '-=' + height
	                        }, "slow");
	                    });
	                    if ($(lastItem).attr('item-pos') == itemPosition) {
	                        $('.scroll-down').css('visibility', 'hidden');
	                    }
	                    if ($(lastItem).attr('item-pos') > itemPosition) {
	                        $('.scroll-down').css('visibility', 'visible');
	                    }
	                    $(this).parent().siblings('.scroll-up').css('visibility', 'visible');
	                });
	                $(this).children().children().children('.fa-chevron-up').click(function () {
	                    var itemsGroup = $(this).parent().parent().siblings().children('.scroll-item-box');
	                    var firstItem = $(this).parent().parent().siblings().children('.scroll-item-box.first-event');
	                    var lastItem = $(this).parent().parent().siblings().children('.scroll-item-box.last-event');
	                    $(itemsGroup).each(function () {
	                        var items = $(this);
	                        num = +$(items).attr('item-pos');
	                        num = num + 1;
	                        $(items).attr('item-pos', num);
	                        if ($(lastItem).attr('item-pos') > '1') {
	                            $('.scroll-down').css('visibility', 'visible');
	                        }
	                        if ($(firstItem).attr('item-pos') == '0') {
	                            $('.scroll-up').css('visibility', 'hidden');
	                        }
	                        height = items.outerHeight(true);
	                        $(items).animate({
	                            "top": '+=' + height
	                        }, "slow");
	                    });
	                });
	            });
	        });
	    }


	});
