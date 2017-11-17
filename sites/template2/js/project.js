$(function () {
  
  "use strict";

  var timer;
  var tweets = function () {
    $('#tweets').tweetable({
        username: 'teslathemes', 
        time: true,
        rotate: true,
        speed: 4000, 
        limit: 4,
        replies: false,
        position: 'append',
        failed: "Sorry, twitter is currently unavailable for this user.",
        html5: false,
      });
  };

  tweets();

  var maps = function () {

    function initialize() {
        var mapOptions = {
                  center: new google.maps.LatLng(45.789537,13.538504),
                  zoom: 12,
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  scrollwheel: true,
                };
        var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        var marker = new google.maps.Marker({
                  map:map,
                  animation: google.maps.Animation.DROP,
                  position: new google.maps.LatLng(45.789537,13.538504)
                });
      }

    if (document.getElementById('map-canvas')) {
      google.maps.event.addDomListener(window, 'load', initialize);
    }
  };

  maps();

  var photoShow = function () {
    if($(".show-image").length > 0){
      $(".show-image").swipebox();
    }
  };

  photoShow();

  var testimonialsMedpark = function(){
    var container = $('.testimonials-widget'),
      slider = $(".testimonials-sliders"),
      slides = slider.children("li"),
      bullets,
      i = 0,
      i_max = slides.length-1,
      time = 5000,
      j,
      action,
      maxHeight = 0;

    slides.eq(0).addClass("active");
    setTimeout(function(){slider.height(slides.eq(0).height())},10);
    action = function(prev){
      slides.eq(i).removeClass("active");
      slides.eq(i).addClass("hide");
      if(prev){
        i = --i % slides.length;
        if (i < 0){
          i = i_max;
        }
      }else{
        i = ++i % slides.length;
      }
      slider.height(slides.eq(i).height());
      slides.eq(i).addClass("active");
      slides.eq(i).removeClass("hide");
    };
    //timer = setInterval(action, time);

    $('.testimonials-nav .next').click(function(e){
      e.preventDefault();
      action(false);
    });
    $('.testimonials-nav .prev').click(function(e){
      e.preventDefault();
      action(true);
    });

  };
  
  testimonialsMedpark();

  var calendarMedpark = function(){

    function updateMonthYear() {        
      $month.html( cal.getMonthName() );
      $year.html( cal.getYear() );
    }

    if($('.calendar-nav').length){


      var cal = $( '#calendar' ).calendario( {
        onDayClick : function( $el, $contentEl, dateProperties ) {

        },
        caldata : codropsEvents
      } ),
      $month = $( '#custom-month' ).html( cal.getMonthName() ),
      $year = $( '#custom-year' ).html( cal.getYear() );

      $( '#custom-next' ).on( 'click', function() {
        cal.gotoNextMonth( updateMonthYear );
      } );
      $( '#custom-prev' ).on( 'click', function() {
        cal.gotoPreviousMonth( updateMonthYear );
      } );
      $( '#custom-current' ).on( 'click', function() {
        cal.gotoNow( updateMonthYear );
      } );

      

    }
  };

  calendarMedpark();

  var pickers = function () {

    $('#reservation').daterangepicker({
      classContainer: 'date-pick',
      onlyPicker: true,
      format: 'DD/MM/YYYY',
    });

    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 15,
      format: 'h:mm A',
      classContainer: 'time-pick',
      onlyPicker: false
    });

  };

  pickers();

  var sliderMedpark = function(){
    var container = $('.medpak-slider'),
      slider = $(".slider-medics"),
      slides = slider.children("li"),
      bullets,
      i = 0,
      i_max = slides.length-1,
      time = 5000,
      j,
      action,
      maxHeight = 0;

    slides.eq(0).addClass("active");
    slides.eq(0).css({'position': 'relative'});
    for (j = 0; j < slides.length; j++ ) {
      $('.slider-bullets').append("<li>" + j + "</li>");
    }
    bullets = $('.slider-bullets li');
    bullets.eq(0).addClass("active");
    action = function(prev){
      slides.eq(i).removeClass("active");
      slides.eq(i).addClass("hide");
      bullets.eq(i).removeClass("active");
      if(prev){
        i = --i % slides.length;
        if (i < 0){
          i = i_max;
        }
      }else{
        i = ++i % slides.length;
      }
      slides.eq(i).addClass("active");
      slides.eq(i).addClass("active");
      slides.eq(i).removeClass("hide");
      bullets.eq(i).addClass("active");
    };
    timer = setInterval(action, time);

    container.hover(function(){
       clearInterval(timer);
    }, function(){
        timer = setInterval(action, time);
    });

    bullets.click(function(){
      var i_new = bullets.index(this);
      if(i_new!==i){
        slides.eq(i).removeClass("active");
        bullets.eq(i).removeClass("active");
        i = i_new;
        slides.eq(i).addClass("active");
        bullets.eq(i).addClass("active");
      }
    });

    $('.slider-nav .next-slider').click(function(e){
      e.preventDefault();
      action(false);
    });
    $('.slider-nav .prev-slider').click(function(e){
      e.preventDefault();
      action(true);
    });

  };
  
  sliderMedpark();

  var mobileMenu = function(){
    var tar = $('.main-nav > ul > li'),
      cl = 0;

    if($(window).width() < 979){

      tar.find('a').click(function(e){
        if($(this).next('ul').length){
          e.preventDefault();

          if(cl === 0){
            $(this).next('ul').prepend('<li>' + $(this)[0].outerHTML + '</li>');
          }

          cl++;
        }
      });

    }
  };

  mobileMenu();

  var formValidation = function () {
    $( '.appoiment-form form, #commentform, #send-message' ).parsley();
  };

  formValidation();

  var placeholderIE = function () {
    $("textarea, input").textPlaceholder();
  };

  placeholderIE();


});