<!-- Library other -->
<script src="{{ asset('assets/admin/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.js') }}"></script>
{{-- <script src="{{asset('assets/admin/simplenotify/simple-notify.js')}}"></script> --}}
<script src="{{ asset('assets/admin/js/priceFormat.js') }}"></script>
<script src="{{ asset('assets/admin/js/select2/select2.full.js') }}"></script>
{{-- <script src="{{asset('assets/admin/js/confirm/confirm.js')}}"></script> --}}
<script src="{{ asset('assets/admin/ckeditor/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/sumoselect/jquery.sumoselect.js') }}"></script>
<script src="{{ asset('assets/admin/filer/jquery.filer.js') }}"></script>
<script src="{{ asset('assets/admin/filer/jquery.filer.js') }}"></script>
<script src="{{ asset('assets/admin/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('adminate/js/chart.umd.js') }}"></script>
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- Theme app -->
<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>

<script>
$(document).ready(function () {
    $('.comment_duyet_btn').click(function(){
        var comment_status= $(this).data('comment_status');
        var comment_id= $(this).data('comment_id');
        var id_product= $(this).attr('id');
        // alert(comment_status);
        // alert(comment_id);
        // alert(id_product);
        if(comment_status==0)
        {
            var alert="Thay doi thanh duyet thanh cong";
        }
        else
        {
            var alert="Thay doi thanh chua duyet thanh cong";
        }
        $.ajax({
                url: "{{url('/allow-comment')}}",
                method: "POST",
                data: {comment_status:comment_status,comment_id:comment_id,id_product:id_product},
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    location.reload();
                    // $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');
                }
            })
         });
    });
    $('.btn-reply-comment').click(function(){
        var comment_id= $(this).data('comment_id');
        var comment= $('.reply_comment_'+comment_id).val();
        var id_product= $(this).data('id');

        //var alert="Tra loi binh luan thanh cong";
        // alert(comment);
        // alert(comment_id);
        // alert(id_product);
        
        $.ajax({
                url: "{{url('/reply-comment')}}",
                method: "POST",
                data: {comment:comment,comment_id:comment_id,id_product:id_product},
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    $('.reply_comment').val('');
                     $('#notify_comment').html('<span class="text text-alert">Tra loi binh luan thanh cong</span>');
                    location.reload();
                }
            })
    });
</script>

