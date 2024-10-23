<div class="category-slider owl-carousel">
    @if(isset($result ))
        @foreach($result  as $category)
            <a href="{{route('courses')}}?category_id[]={{$category->id}}"

     class="category-slider-item">
                <div class="category-slider-item-inner">
                    <div class="category-slider-item-icon">
                        <img src="{{asset($category->image)}}" alt="">
                    </div>
                    <div class="category-slider-item-title">
                        {{$category->name}}
                    </div>
                </div>
            </a>
        @endforeach
    @endif
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

            $('.category-slider').owlCarousel({
                loop: true,
                margin: 0,
                responsiveClass: true,
                nav: false,
                dots: false,
                // center: true,
                // autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                rtl: isRtl,
                responsive: {
                    300:{
                        items: 2,
                    },
                    400: {
                        items: 3,
                    },
                    500: {
                        items: 4,
                    },
                    1000: {
                        items: 5,
                    },
                    1400: {
                        items: 8,
                    }
                }

            });

        })
    })();
</script>
