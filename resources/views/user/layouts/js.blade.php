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
                $("#amount").val(ui.values[0] + " đ" + " - " + ui.values[1] + " đ");

                $("#start_price").val(ui.values[0]);
                $("#end_price").val(ui.values[1]);
            }
        });
        $("#amount").val($("#slider-range").slider("values", 0) + " đ" + " - " +
            $("#slider-range").slider("values", 1) + " đ");
    });
</script>

<script>
    $(document).ready(function () {
        load_comment();
        //alert(product_id);
        function load_comment() {
            var id_product = $('.id_product').val();
            var id_user = $('.id_user').val();
            var status = $('.status').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment')}}",
                method: "POST",
                data: { status:status,id_product: id_product,id_user:id_user, _token: _token },
                success: function (data) {
                    $("#comment_show").html(data);
                }
            })
        }
        $('.send-comment').click(function () {
            var id_product = $('.id_product').val();
            var id_user = $('.id_user').val();
            //var comment_name=$('.comment_name').val('');
            var content = $('.content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-comment')}}",
                method: "POST",
                data: { id_user:id_user,id_product: id_product, content: content, _token: _token, },
                success: function (data) {
                    if(data=='Bình luận thành công')
                    {
                    $(".notify_comment").html('<span class="text text-success">Thêm bình luận thành công, vui lòng chờ xét duyệt</span>');
                    load_comment();
                    $(".notify_comment").fadeOut(4000);
                    //$('.comment_name').val('');
                    $('.content').val('');
                    }
                    else
                    {
                        alert("Vui lòng đăng nhập để gửi bình luận !");
                    }
                }
            })
        });
        function remove_background(product_id)
        {
            for(var count=1;count<=5;count++)
            {
                $('#'+product_id+'-'+count).css('color','#ccc');
            }
        }
        //hover tang sao
        $(document).on('mouseenter','.rating',function(){
            var index=$(this).data("index");
            var product_id=$(this).data('product_id');
            // alert(index);
            // alert(product_id);
            remove_background(product_id);
            for(var count=1;count<=index;count++)
            {
                $('#'+product_id+'-'+count).css('color','#ffcc00');
            }
        });

        //nha chuot giam
        $(document).on('mouseleave','.rating',function(){
            var index=$(this).data("index");
            var product_id=$(this).data('product_id');
            var rating=$(this).data("rating");
            // alert(index);
            // alert(product_id);
            remove_background(product_id);
            for(var count=1;count<=rating;count++)
            {
                $('#'+product_id+'-'+count).css('color','#ffcc00');
            }
        });

        $(document).on('click','.rating',function(){
            var index=$(this).data("index");
            var product_id=$(this).data('product_id');
            var _token=$('input[name="_token"]').val();
            // alert(index);
            // alert(product_id);
            $.ajax({
                url: "{{url('/insert-rating')}}",
                method: "POST",
                data: { index: index, product_id: product_id, _token: _token},
                success: function (data) {
                   if(data=='Đánh giá thành công')
                   {
                    alert("Bạn đã đánh giá "+index+" trên 5 sao");
                   }
                   else
                   {
                    alert("Lỗi đánh giá. Vui lòng đăng nhập để đánh giá sản phẩm!");
                   }
                }
            })
        });
    });

</script>