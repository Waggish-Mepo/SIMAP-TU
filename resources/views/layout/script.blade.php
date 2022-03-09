<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script>
    $('.btn-mobile-sidebar').click(function(){
        $('aside').toggleClass("-translate-x-full relative");
    });

    function toast(message, type) {
        $('#toast-' + type).toggleClass('hidden flex');
        $(`#toast-${type} > .msg`).html(message);
        setTimeout(function () {
            $('#toast-' + type).toggleClass('hidden flex');
        }, 3000);
    }
</script>

