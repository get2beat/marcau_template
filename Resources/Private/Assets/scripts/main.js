import Swiper, {EffectFade, Autoplay, Navigation, Pagination} from 'swiper';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
gsap.registerPlugin(ScrollTrigger);
import { ScrollToPlugin } from 'gsap/all'
gsap.registerPlugin(ScrollToPlugin);
import { TweenLite } from 'gsap';
gsap.registerPlugin(TweenLite);

Swiper.use([EffectFade,Autoplay,Pagination,Navigation]);
gsap.registerPlugin(ScrollTrigger);



//IE11
if (!!window.MSInputMethodContext && !!document.documentMode) { document.body.classList.add("IE11") };

//document ready
$(function() {

    let body = $('body');
    $(window).on('resize', function () {
        if ($(window).width() <= 640) {
            $(body).removeClass("isDesktop").addClass("isMobile");
        } else {
            $(body).removeClass("isMobile").addClass("isDesktop");
        }
    });
    if ($(window).width() <= 640) {
        $(body).removeClass("isDesktop").addClass("isMobile");
    } else {
        $(body).removeClass("isMobile").addClass("isDesktop");
    }



    $('#websharebutton').on('click', function (e) {
        e.preventDefault();
        $('#shareicons').addClass('active')
    });


    var galerieSwiper = null;
    //galerie slider
    if ($('.swiper-container__galerie').length) {
        galerieSwiper = new Swiper('.swiper-container__galerie', {
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            direction: 'horizontal',
            loop: false,
            allowTouchMove: true,
            autoHeight: true,
            autoplay: {
                delay: 4000,
            },
            speed: 1500,
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            on: {
                slideChange: function (swiper) {
                    $(swiper.slides.eq(swiper.previousIndex)).find('.m-slide__link').hide();
                    $(swiper.slides.eq(swiper.activeIndex)).find('.m-slide__link').show();
                },
                init: function (swiper) {
                    if (swiper.slides.length <= 1) {
                        swiper.params.loop = false;
                        swiper.params.autoplay = false;
                        swiper.params.pagination = false;
                    }
                },
            },
        })
    }

    var karussellSwiper = null;

    if ($('.swiper-container__karussell').length) {
        karussellSwiper = new Swiper('.swiper-container__karussell', {

            slidesPerView: 1,
            spaceBetween: 30,
            slidesPerGroup: 1,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }

        })
    }




    //video content
    $('.m-videoPlayContent').click( function(e) {
        let video = $(this).closest('section').find('video');
        let container = video.parent();
        $(this).fadeOut();
        container.removeClass('m-video__container');
        video.trigger('play');
        video.attr("controls","controls");
    });


    //nav
    $( ".m-nav__inner > ul > li").hover(

        function(e) {
            if($(e.target).find('> a').hasClass('has-children'))
            {
                $("header").addClass("active");
            }
        }, function() {
            $("header").removeClass("active");
        }
    );

    //accordeon single

    $('.m-modul-accordeon .m-modul-accordeon-header').on('click', function(e) {
        $('.m-modul-accordeon').not($(e.currentTarget).parent()).removeClass( "active" );
        $(e.currentTarget).parent().toggleClass( "active" );
    });


    //accordeon all
/*
    $('.m-modul-accordeon header').on('click', function(e) {
        $(e.currentTarget).parent().toggleClass( "active" );
    });
*/


    //map
    // Google Maps
    if($('.m-map').length){
        initMap();
    }

    // Parallax
    gsap.utils.toArray(".section-parallax .parallax-content").forEach((section, i) => {
        const heightDiff = section.offsetHeight - section.parentElement.offsetHeight;
        console.log(heightDiff);
        console.log('heightDiff');

        gsap.fromTo(section,{
            //y: -200
            yPercent: -50
        }, {
            scrollTrigger: {
                trigger: section.parentElement,
                scrub: true
            },
            //y: 0,
            yPercent: 0,
            ease: "none"
        });
    });




    gsap.to(".imgFix", {
        ease: "none",
        clearProps:"all",
        y: -100,
        scrollTrigger: {
            trigger: ".m-project-content",
            // start: "top bottom", // the default values
            // end: "bottom top",
            scrub: true
        },
    });


    gsap.to(".imgPar", {
        y: 50,
        ease: "none",
        scrollTrigger: {
            trigger: ".m-project-content",
            // start: "top bottom", // the default values
            // end: "bottom top",
            scrub: true
        },
    });

    /********************************************************************
     mouse scrolling
     */

    function goToSection(i, anim) {
        gsap.to(window, {
            scrollTo: {y: i*innerHeight, autoKill: false},
            //duration: 1,
           ease: "power4.inOut",
        });
    }

    gsap.utils.toArray("body .scrollpanel").forEach((panel, i) => {

        ScrollTrigger.create({
            trigger: panel,
            onEnter: () => goToSection(i)
        });

        ScrollTrigger.create({
            trigger: panel,
            start: "bottom bottom",
            onEnterBack: () => goToSection(i),
        });
    });


    //animation container element
    let revealcontainer = gsap.utils.toArray('.revealcontainer');

    revealcontainer.forEach(elem => {
        let revealcontainerelem = $(elem).find('.revealcontainerelem');

        gsap.from(revealcontainerelem, {
            stagger: 0.2,
            y: 50,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
        gsap.to(revealcontainerelem, {
            stagger: 0.2,
            autoAlpha: 1,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
    });

    //animation single element
    let revealelements = gsap.utils.toArray('.revealelem');

    revealelements.forEach(elem => {

        gsap.from(elem, {
            clearProps:"all",
            stagger: 0.2,
            y: 50,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
        gsap.to(elem, {
            clearProps:"all",
            stagger: 0.2,
            autoAlpha: 1,
            duration: 0.5,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
    });

    //animation single element - width
    let revealelementswidth = gsap.utils.toArray('.revealelemwitdh');

    revealelementswidth.forEach(elem => {

        gsap.from(elem, {
            clearProps:"all",
            width: "10%",
            duration: 0.75,
            scrollTrigger: {
                trigger: elem,
                //scrub: true
            }
        })
    });

    // Animation from site Config
    // check if is News
    let isNews = gsap.utils.toArray('.animationcontainer');
    let animationcontainer = '';
    let stager = '';
    if (isNews.length > 0) {
        animationcontainer = isNews;
        stager = 0.5;
    }

    //animation single element - fade
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animatefade');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimatefade');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 2.5,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });

    //animation single element - zoom
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animatezoom');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimatezoom');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            scale: 0.5,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 1.5,
            scale: 1,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });

    //animation single element - rotate x
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animaterotatex');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimaterotatex');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            scale: 0.5,
            rotationX: 180,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 1.5,
            rotationX: 0,
            scale: 1,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });
    //animation single element - rotate y
    if (isNews.length == 0) {
        animationcontainer = gsap.utils.toArray('.animaterotatey');
    }
    animationcontainer.forEach(animatezoomelem => {
        if (isNews.length > 0) {
            animatezoomelem = $(animatezoomelem).find('.newsanimaterotatey');
        }
        gsap.from(animatezoomelem, {
            stagger: stager,
            scale: 0.5,
            rotationY: 180,
            opacity:0,
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
        gsap.to(animatezoomelem, {
            stagger: stager,
            duration: 1.5,
            rotationY: 0,
            scale: 1,
            opacity:1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: animatezoomelem,
            }
        })
    });



});


function initMap() {

    var mapContainer = document.getElementsByClassName('m-map')[0];
    var mapLng = parseFloat(mapContainer.getAttribute('data-lng'));
    var mapLat = parseFloat(mapContainer.getAttribute('data-lat'));
    var markerSrc = mapContainer.getAttribute('data-marker-src');

    // Standort von Marcau AG
    var location = {lat: mapLat, lng: mapLng};
    // The map, centered at Uluru
    var map = new google.maps.Map(mapContainer, {
        zoom: 17,
        mapTypeControl: false,
        streetViewControl: false,
        center: location,
        styles:
            [
                {
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#bdbdbd"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#181818"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#1b1b1b"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#2c2c2c"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#8a8a8a"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#373737"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#3c3c3c"
                        }
                    ]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#4e4e4e"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#3d3d3d"
                        }
                    ]
                }
            ]});

    setMarkers(map, location);

}

function setMarkers(map, location) {


    let markerColor = encodeURIComponent("#ffffff");

    // Marker
    var image = {
        url: 'data:image/svg+xml;charset=utf-8,%3Csvg%20width%3D%2256%22%20height%3D%2269%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%3E%3Cdefs%3E%3Cfilter%20x%3D%22-50%25%22%20y%3D%22-50%25%22%20width%3D%22200%25%22%20height%3D%22200%25%22%20filterUnits%3D%22objectBoundingBox%22%20id%3D%22a%22%3E%3CfeOffset%20dx%3D%225%22%20dy%3D%225%22%20in%3D%22SourceAlpha%22%20result%3D%22shadowOffsetOuter1%22%2F%3E%3CfeGaussianBlur%20stdDeviation%3D%225%22%20in%3D%22shadowOffsetOuter1%22%20result%3D%22shadowBlurOuter1%22%2F%3E%3CfeColorMatrix%20values%3D%220%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200%200.5%200%22%20in%3D%22shadowBlurOuter1%22%2F%3E%3C%2Ffilter%3E%3Cpath%20d%3D%22M643.023%20196.002a6.978%206.978%200%20116.978-6.977%206.978%206.978%200%2001-6.978%206.977m18.026-6.978c0-9.938-8.086-18.024-18.026-18.024-9.938%200-18.023%208.086-18.023%2018.024%200%205.881%203.06%2010.244%208.137%2017.473%202.597%203.697%205.824%208.294%209.387%2014.221a.588.588%200%2000.5.282c.204%200%20.393-.11.5-.282%203.564-5.927%206.79-10.524%209.388-14.22%205.075-7.23%208.137-11.593%208.137-17.474%22%20id%3D%22b%22%2F%3E%3C%2Fdefs%3E%3Cg%20fill%3D%22'+markerColor+'%22%20transform%3D%22translate%28-620%20-166%29%22%20fill-rule%3D%22evenodd%22%3E%3Cuse%20filter%3D%22url%28%23a%29%22%20xlink%3Ahref%3D%22%23b%22%2F%3E%3Cuse%20xlink%3Ahref%3D%22%23b%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E',
        size: new google.maps.Size(56, 69),
        scaledSize: new google.maps.Size(56, 69),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(23, 56)
    }

    var marker = new google.maps.Marker({
        position: location,
        map: map,
        icon: image
    });
}
