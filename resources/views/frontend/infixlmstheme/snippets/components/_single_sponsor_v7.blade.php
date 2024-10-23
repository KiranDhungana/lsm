<div class="mx-5">
    <div class="clients-area-slider owl-carousel">
        @foreach ($result as $sponsor)
            <div class="clients-area-slider-item">
                <img src="{{asset($sponsor->image)}}" alt="{{$sponsor->title}}">
            </div>
        @endforeach

    </div>
</div>


<script>
    (function () {
        'use strict'
        jQuery(document).ready(function () {

            let isRtl;
            if ($('html').attr('dir') === "rtl") {
                isRtl = true;
            } else {
                isRtl = false;
            }

            // clients area slider

            $('.clients-area-slider').owlCarousel({
                loop: false,
                margin: 40,
                // responsiveClass: true,
                nav: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                rtl: isRtl,
                items: 50,
                autoWidth: true,
            });

        })
    })();
</script>
