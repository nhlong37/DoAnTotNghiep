<script>
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
</script>
<script src="{{ asset('assets/user/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/user/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('assets/user/js/app.js') }}"></script>
<script src="{{ asset('assets/user/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/user/owlcarousel2/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/user/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/user/select2/select2.full.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script>
    $(document).ready(function() {
        $('.chay-sp').slick({
            lazyLoad: 'progressive',
            infinite: true,
            accessibility: true,
            vertical: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            arrows: true,
            centerMode: false,
            dots: false,
            draggable: true,
            responsive: [{
                breakpoint: 871,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: true
                }
            }]
        });
        $('.chay-yk').slick({
            lazyLoad: 'progressive',
            infinite: true,
            accessibility: true,
            vertical: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            arrows: false,
            centerMode: false,
            dots: false,
            draggable: true,
            responsive: [{
                breakpoint: 871,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }]
        });
        $('.chay-tt').slick({
            lazyLoad: 'progressive',
            infinite: true,
            accessibility: true,
            vertical: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            arrows: false,
            centerMode: false,
            dots: false,
            draggable: true,
            responsive: [{
                breakpoint: 871,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }]
        });
        $('.chay-photo').slick({
            lazyLoad: 'progressive',
            infinite: true,
            accessibility: true,
            vertical: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            arrows: false,
            centerMode: false,
            dots: false,
            draggable: true,
            asNavFor: '.chay-gallery',
            responsive: [{
                breakpoint: 871,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }]
        });
        $('.chay-gallery').slick({
            lazyLoad: 'progressive',
            infinite: true,
            accessibility: true,
            vertical: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            arrows: false,
            centerMode: false,
            dots: false,
            draggable: true,
            asNavFor: '.chay-photo',
            responsive: [{
                breakpoint: 871,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }]
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".show-dropdown").on("click", function() {
            $(this).parents(".dropdown").find(".dropdown-menu").slideToggle(500);
        });
    });
</script>

<script>
    $(function() {
        $("#slider-range").slider({
            orientation: "horizontal",
            range: true,
            min: {{ $min_price_range }},
            max: {{ $max_price_range }},
            values: [{{ $min_price }}, {{ $max_price }}],
            step: 500000,
            slide: function(event, ui) {
                $("#amount").val(ui.values[0] + "đ" + " - " + ui.values[1] + "đ");
                $("#start_price").val(ui.values[0]);
                $("#end_price").val(ui.values[1]);
            }
        });
        $("#amount").val($("#slider-range").slider("values", 0) + " đ" + " - " +
            $("#slider-range").slider("values", 1) + " đ");
    });
</script>
