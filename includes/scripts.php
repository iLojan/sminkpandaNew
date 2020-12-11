         <script src="./dist/assets/js/jquery/jquery.min.js"></script>
         <script src="./dist/assets/js/jquery/jquery-migrate.min.js"></script>
         <script src="./dist/assets/js/jquery/popper.min.js"></script>
         <script src="./dist/assets/js/jquery/bootstrap.min.js"></script>

         <!-- JS Implementing Plugins -->
         <script src="./dist/assets/js/appear.js"></script>
         <script src="./dist/assets/js/jquery.countdown.min.js"></script>
         <script src="./dist/assets/js/hs.megamenu.js"></script>
         <script src="./dist/assets/js/svg-injector.min.js"></script>
         <script src="./dist/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
         <script src="./dist/assets/js/jquery.validate.min.js"></script>
         <script src="./dist/assets/js/jquery.fancybox.min.js"></script>
         <script src="./dist/assets/js/typed.min.js"></script>
         <script src="./dist/assets/js/slick.js"></script>
         <script src="./dist/assets/js/bootstrap-select.min.js"></script>

         <!-- JS Electro -->
         <script src="./dist/assets/js/hs.core.js"></script>
         <script src="./dist/assets/js/hs.countdown.js"></script>
         <script src="./dist/assets/js/hs.header.js"></script>
         <script src="./dist/assets/js/hs.hamburgers.js"></script>
         <script src="./dist/assets/js/hs.unfold.js"></script>
         <script src="./dist/assets/js/hs.focus-state.js"></script>
         <script src="./dist/assets/js/hs.malihu-scrollbar.js"></script>
         <script src="./dist/assets/js/hs.validation.js"></script>
         <script src="./dist/assets/js/hs.fancybox.js"></script>
         <script src="./dist/assets/js/hs.onscroll-animation.js"></script>
         <script src="./dist/assets/js/hs.slick-carousel.js"></script>
         <script src="./dist/assets/js/hs.show-animation.js"></script>
         <script src="./dist/assets/js/hs.svg-injector.js"></script>
         <script src="./dist/assets/js/hs.go-to.js"></script>
         <script src="./dist/assets/js/hs.selectpicker.js"></script>

         <script>
$(window).on('load', function() {
    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        direction: 'horizontal',
        pageContainer: $('.container'),
        breakpoint: 767.98,
        hideTimeOut: 0
    });

    // initialization of svg injector module
    $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
});

$(document).on('ready', function() {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#header'));

    // initialization of animation
    $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
        afterOpen: function() {
            $(this).find('input[type="search"]').focus();
        }
    });

    // initialization of popups
    $.HSCore.components.HSFancyBox.init('.js-fancybox');

    // initialization of countdowns
    var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
        yearsElSelector: '.js-cd-years',
        monthsElSelector: '.js-cd-months',
        daysElSelector: '.js-cd-days',
        hoursElSelector: '.js-cd-hours',
        minutesElSelector: '.js-cd-minutes',
        secondsElSelector: '.js-cd-seconds'
    });

    // initialization of malihu scrollbar
    $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

    // initialization of forms
    $.HSCore.components.HSFocusState.init();

    // initialization of form validation
    $.HSCore.components.HSValidation.init('.js-validate', {
        rules: {
            confirmPassword: {
                equalTo: '#signupPassword'
            }
        }
    });

    // initialization of show animations
    $.HSCore.components.HSShowAnimation.init('.js-animation-link');

    // initialization of fancybox
    $.HSCore.components.HSFancyBox.init('.js-fancybox');

    // initialization of slick carousel
    $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    // initialization of hamburgers
    $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
        beforeClose: function() {
            $('#hamburgerTrigger').removeClass('is-active');
        },
        afterClose: function() {
            $('#headerSidebarList .collapse.show').collapse('hide');
        }
    });

    $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
        e.preventDefault();

        var target = $(this).data('target');

        if ($(this).attr('aria-expanded') === "true") {
            $(target).collapse('hide');
        } else {
            $(target).collapse('show');
        }
    });

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

    // initialization of select picker
    $.HSCore.components.HSSelectPicker.init('.js-select');
});
         </script>