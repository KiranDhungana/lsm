<div data-type="component-text"
     data-preview="{{!function_exists('themeAsset')?'':themeAsset('img/snippets/preview/course/featured.jpg')}}"
     data-aoraeditor-title="Course Featured Section" data-aoraeditor-categories="Courses;Home Page">

    <style>
        .featured-inner {
            position: relative;
            top: -180px;
            margin-bottom: -160px;
        }

        .featured-slider .owl-stage-outer {
            padding-bottom: 60px;
            margin-bottom: -60px
        }

        @media only screen and (max-width: 767px) {
            .featured-slider .owl-stage-outer {
                padding-bottom: 40px
            }
        }

        /* .featured-slider .owl-dots {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 0
        } */

        .featured-item {
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0px 4px 40px rgba(0, 0, 0, 0.08);
            background-color: #fff
        }

        .featured-img {
            height: 100%;
            padding-bottom: 20px;
            background-image: var(--featured-img);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat
        }

        @media only screen and (max-width: 767px) {
            .featured-img {
                padding-top: 60%
            }
        }

        .featured-play {
            --play-width: 100px;
            width: var(--play-width);
            height: var(--play-width);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            color: var(--system_primery_color);
            border-radius: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            font-size: 24px
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-play {
                --play-width: 80px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-play {
                --play-width: 80px
            }
        }

        .featured-play:hover {
            background: var(--system_primery_color);
            background-size: 200% auto;
            color: #fff
        }

        .featured-play i {
            margin-left: 12px
        }

        html[dir=rtl] .featured-play i {
            margin-left: 0;
        }

        .featured-content {
            padding-top: 36px;
            padding-right: 50px;
            padding-bottom: 50px;
            padding-left: 44px
        }

        html[dir=rtl] .featured-content {
            padding-left: 50px;
            padding-right: 44px;
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content {
                padding-right: 36px;
                padding-left: 40px;
                padding-bottom: 40px
            }

            html[dir=rtl] .featured-content {
                padding-left: 36px;
                padding-right: 40px;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content {
                padding: 35px;
                padding-top: 30px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-content {
                padding: 20px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-content {
                padding: 24px
            }
        }

        .featured-content h3 {
            font-size: 40px;
            line-height: 1.25;
            margin-bottom: 30px;
            min-height: 100px;
            color: var(--system_secendory_color);
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .featured-content h3:hover {
            color: var(--system_primery_color);
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content h3 {
                font-size: 36px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content h3 {
                font-size: 32px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-content h3 {
                font-size: 28px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-content h3 {
                font-size: 26px
            }
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content h3 {
                font-size: 34px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content h3 {
                margin-bottom: 24px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-content h3 {
                margin-bottom: 20px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-content h3 {
                font-size: 22px
            }
        }

        .featured-content .author {
            margin-bottom: 35px
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content .author {
                margin-bottom: 25px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content .author {
                margin-bottom: 24px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-content .author {
                margin-bottom: 20px
            }
        }

        .featured-content > p {
            font-size: 18px;
            line-height: 1.66667;
            color: var(--system_paragraph_color);
            margin-bottom: 45px
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content > p {
                margin-bottom: 35px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content > p {
                margin-bottom: 30px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-content > p {
                margin-bottom: 26px;
                font-size: 16px
            }
        }

        .featured-content .theme-btn {
            min-width: 160px;
            font-size: 20px;
            line-height: 1.5
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content .theme-btn {
                font-size: 18px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-content .theme-btn {
                font-size: 18px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-content .theme-btn {
                min-width: max-content
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-content .theme-btn {
                --btn-padding-y: 10px
            }
        }

        .featured-content strong {
            font-size: 48px;
            line-height: 1.25;
            color: var(--system_secendory_color)
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content strong {
                font-size: 42px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content strong {
                font-size: 36px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-content strong {
                font-size: 32px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-content strong {
                font-size: 28px
            }
        }

        .featured-content del {
            font-size: 36px;
            line-height: 1.52778;
            margin-left: 6px;
            color: var(--system_secendory_color)
        }

        html[dir=rtl] .featured-content del {
            margin-left: 0;
            margin-right: 6px;
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-content del {
                font-size: 32px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-content del {
                font-size: 30px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-content del {
                font-size: 28px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-content del {
                font-size: 24px
            }
        }

        .featured-info {
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: calc(49px / 2 * -1);
            position: relative;
            z-index: 9;
            border-radius: 10px
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-info {
                padding: 10px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-info {
                justify-content: space-between
            }
        }

        .featured-info > * {
            font-size: 12px;
            font-family: var(--fontFamily2);
            font-weight: 500;
            padding: 4px 10px;
            background-color: #fff;
            color: var(--system_secendory_color);
            border-radius: 6px;
            min-width: 90px;
            text-align: center
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-info > * {
                min-width: max-content
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-info > * {
                min-width: max-content;
                font-size: 10px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-info > * {
                min-width: max-content;
                font-size: 10px
            }
        }

        @media only screen and (max-width: 479px) {
            .featured-info > * {
                min-width: max-content
            }
        }

        .featured-info > *:not(:last-child) {
            margin-right: 12px
        }

        html[dir=rlt] .featured-info > *:not(:last-child) {
            margin-right: 0;
            margin-left: 12px;
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-info > *:not(:last-child) {
                margin-right: 6px
            }

            html[dir=rtl] .featured-info > *:not(:last-child) {
                margin-right: 0;
                margin-left: 6px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-info > *:not(:last-child) {
                margin-right: 4px
            }

            html[dir=rtl] .featured-info > *:not(:last-child) {
                margin-right: 0;
                margin-left: 4px;
            }
        }

        .featured-wrap {
            border-radius: 12px;
            padding: 45px 100px;
            position: relative;
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-wrap {
                padding: 40px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-wrap {
                padding: 25px 20px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-wrap {
                padding: 25px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-wrap {
                padding: 30px 25px
            }
        }

        @media only screen and (max-width: 479px) {
            .featured-wrap {
                padding: 20px 15px
            }
        }

        .featured-wrap .row {
            --bs-gutter-x: 50px
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-wrap .row {
                --bs-gutter-x: 40px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-wrap .row {
                --bs-gutter-x: 30px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-wrap .row {
                --bs-gutter-x: 1.5rem
            }
        }

        .featured-card {
            padding: 30px 35px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: #fff;
            margin-top: 24px
        }

        @media only screen and (min-width: 1280px) and (max-width: 1439px) {
            .featured-card {
                padding: 20px
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-card {
                padding: 16px
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .featured-card {
                padding: 20px 25px
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-card {
                padding: 20px
            }
        }

        .featured-card p, .featured-card h4 {
            color: currentColor !important
        }

        .featured-card h4 {
            font-size: 20px;
            line-height: 1.5;
            margin-bottom: 5px
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-card h4 {
                font-size: 18px
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-card h4 {
                font-size: 18px
            }
        }

        .featured-card p {
            font-size: 14px;
            line-height: 1.14286
        }

        .featured-card .icon {
            margin-right: 18px
        }

        html[dir=rtl] .featured-card .icon {
            margin-right: 0;
            margin-left: 18px;
        }

        @media only screen and (min-width: 992px) and (max-width: 1279px) {
            .featured-card .icon {
                margin-right: 10px
            }

            html[dir=rtl] .featured-card .icon {
                margin-right: 0;
                margin-left: 10px;
            }
        }

        @media only screen and (max-width: 767px) {
            .featured-card .icon {
                margin-right: 10px
            }

            html[dir=rtl] .featured-card .icon {
                margin-right: 0;
                margin-left: 10px;
            }
        }

        @media only screen and (max-width: 991px) {
            .featured-card .icon > * {
                width: 30px;
                height: 30px
            }
        }

    </style>

    <section class="featured bg-white">
        <div class="featured-inner">
            <div data-type="component-nonExisting"
                 data-preview=""
                 data-table=""
                 data-select="id,type,slug,title,thumbnail,price,discount_price,mode_of_delivery,duration,total_enrolled,total_rating,user_id,category_id,level,total_rating,about"
                 data-order="id"
                 data-limit="6"
                 data-where-status="1"
                 data-where-type="1"
                 data-where-feature="1"
                 data-view="_single_course_featured"
                 data-model="Modules\CourseSetting\Entities\Course"
                 data-with="courseLevel,user,category"
            >
                <div class="dynamicData"
                     data-dynamic-href="{{routeIsExist('getDynamicData')?route('getDynamicData'):''}}"></div>
            </div>
        </div>

        <div class="container">
            <div class="featured-wrap bg-primary section-margin-lg">
                <div class="row -mt-24  row-gap-24">
                    <div class="col-lg-4 col-sm-6 d-flex">
                        <div class="featured-card d-flex align-items-center w-100">
                            <div class="icon">
                                <svg width="52" height="52" viewBox="0 0 52 52" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M42.172 27.382V21.332L43.137 20.932C43.3565 20.8413 43.5441 20.6875 43.6761 20.4901C43.8082 20.2926 43.8786 20.0605 43.8786 19.823C43.8786 19.5855 43.8082 19.3534 43.6761 19.1559C43.5441 18.9585 43.3565 18.8047 43.137 18.714L26.108 11.586C25.9611 11.5244 25.8033 11.4927 25.644 11.4927C25.4847 11.4927 25.3269 11.5244 25.18 11.586L8.15101 18.711C7.93153 18.8017 7.7439 18.9555 7.61189 19.1529C7.47987 19.3504 7.4094 19.5825 7.4094 19.82C7.4094 20.0575 7.47987 20.2896 7.61189 20.4871C7.7439 20.6845 7.93153 20.8383 8.15101 20.929L14.531 23.599V34.011C14.5315 35.5455 15.1411 37.017 16.2257 38.1024C17.3104 39.1879 18.7815 39.7984 20.316 39.8H30.536C32.0695 39.7981 33.5396 39.1882 34.6239 38.1039C35.7082 37.0196 36.3182 35.5494 36.32 34.016V23.781L39.768 22.338V27.382C39.1649 27.6561 38.6738 28.1285 38.3765 28.7205C38.0792 29.3125 37.9935 29.9885 38.1337 30.636C38.274 31.2835 38.6317 31.8634 39.1473 32.2793C39.663 32.6952 40.3055 32.9221 40.968 32.9221C41.6305 32.9221 42.273 32.6952 42.7887 32.2793C43.3043 31.8634 43.662 31.2835 43.8023 30.636C43.9425 29.9885 43.8569 29.3125 43.5595 28.7205C43.2622 28.1285 42.7711 27.6561 42.168 27.382H42.172ZM33.916 34.011C33.915 34.9071 33.5585 35.7662 32.9249 36.3999C32.2912 37.0335 31.4321 37.3899 30.536 37.391H20.316C19.4199 37.3899 18.5608 37.0335 17.9272 36.3999C17.2935 35.7662 16.9371 34.9071 16.936 34.011V24.6L25.181 28.05C25.3279 28.1116 25.4857 28.1433 25.645 28.1433C25.8043 28.1433 25.9621 28.1116 26.109 28.05L33.917 24.783L33.916 34.011ZM25.644 25.642L11.729 19.82L25.644 14L39.559 19.82L25.644 25.642ZM40.97 30.527C40.8711 30.527 40.7745 30.4977 40.6922 30.4427C40.61 30.3878 40.5459 30.3097 40.5081 30.2183C40.4702 30.127 40.4603 30.0264 40.4796 29.9295C40.4989 29.8325 40.5465 29.7434 40.6165 29.6734C40.6864 29.6035 40.7755 29.5559 40.8725 29.5366C40.9695 29.5173 41.07 29.5272 41.1614 29.5651C41.2527 29.6029 41.3308 29.667 41.3857 29.7492C41.4407 29.8314 41.47 29.9281 41.47 30.027C41.47 30.1596 41.4173 30.2868 41.3236 30.3806C41.2298 30.4743 41.1026 30.527 40.97 30.527ZM25.644 0C20.5721 0 15.6141 1.50399 11.397 4.32179C7.17983 7.13959 3.89298 11.1446 1.95204 15.8305C0.0111111 20.5163 -0.496726 25.6724 0.492754 30.6469C1.48223 35.6213 3.92459 40.1907 7.51097 43.777C11.0973 47.3634 15.6667 49.8058 20.6411 50.7953C25.6156 51.7847 30.7717 51.2769 35.4575 49.336C40.1434 47.395 44.1484 44.1082 46.9662 39.891C49.784 35.6739 51.288 30.7159 51.288 25.644C51.2803 18.8451 48.5761 12.327 43.7686 7.51943C38.9611 2.71191 32.4429 0.0076756 25.644 0ZM25.644 48.884C21.0476 48.884 16.5544 47.521 12.7326 44.9674C8.91076 42.4137 5.93203 38.7841 4.17305 34.5376C2.41407 30.291 1.95384 25.6182 2.85056 21.1101C3.74728 16.602 5.96068 12.461 9.21085 9.21084C12.461 5.96067 16.602 3.74727 21.1101 2.85055C25.6182 1.95383 30.291 2.41406 34.5376 4.17304C38.7841 5.93202 42.4137 8.91075 44.9674 12.7325C47.521 16.5543 48.884 21.0476 48.884 25.644C48.8771 31.8055 46.4264 37.7127 42.0696 42.0696C37.7127 46.4264 31.8055 48.8771 25.644 48.884Z"
                                        fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="content">
                                <h4>50K + Online Course</h4>
                                <p>Enjoy lifetime access to course</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 d-flex">
                        <div class="featured-card d-flex align-items-center w-100">
                            <div class="icon">
                                <svg width="36" height="46" viewBox="0 0 36 46" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M31.052 0H6.58C5.33405 0.00185154 4.13966 0.497623 3.25864 1.37864C2.37762 2.25966 1.88185 3.45405 1.88 4.7V9.4H0.939C0.689962 9.4 0.451123 9.49893 0.275027 9.67503C0.0989301 9.85112 0 10.09 0 10.339C0 10.588 0.0989301 10.8269 0.275027 11.003C0.451123 11.1791 0.689962 11.278 0.939 11.278H4.702C4.95104 11.278 5.18988 11.1791 5.36597 11.003C5.54207 10.8269 5.641 10.588 5.641 10.339C5.641 10.09 5.54207 9.85112 5.36597 9.67503C5.18988 9.49893 4.95104 9.4 4.702 9.4H3.763V4.7C3.76379 3.95127 4.06158 3.23344 4.59101 2.70401C5.12044 2.17458 5.83827 1.87679 6.587 1.876H31.059C31.8077 1.87679 32.5256 2.17458 33.055 2.70401C33.5844 3.23344 33.8822 3.95127 33.883 4.7V40.463C33.8822 41.2117 33.5844 41.9296 33.055 42.459C32.5256 42.9884 31.8077 43.2862 31.059 43.287H6.587C5.83827 43.2862 5.12044 42.9884 4.59101 42.459C4.06158 41.9296 3.76379 41.2117 3.763 40.463V35.763C3.763 35.6397 3.73871 35.5176 3.69152 35.4037C3.64433 35.2897 3.57517 35.1862 3.48797 35.099C3.40078 35.0118 3.29726 34.9427 3.18334 34.8955C3.06942 34.8483 2.94731 34.824 2.824 34.824C2.70069 34.824 2.57859 34.8483 2.46466 34.8955C2.35074 34.9427 2.24722 35.0118 2.16003 35.099C2.07283 35.1862 2.00367 35.2897 1.95648 35.4037C1.90929 35.5176 1.885 35.6397 1.885 35.763V40.463C1.88685 41.709 2.38262 42.9033 3.26364 43.7844C4.14466 44.6654 5.33905 45.1611 6.585 45.163H31.059C32.305 45.1611 33.4993 44.6654 34.3804 43.7844C35.2614 42.9033 35.7572 41.709 35.759 40.463V4.702C35.7561 3.45498 35.2591 2.25994 34.3768 1.37863C33.4946 0.497322 32.299 0.00158416 31.052 0Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M0.939 26.349H4.702C4.95104 26.349 5.18988 26.2501 5.36597 26.074C5.54207 25.8979 5.641 25.6591 5.641 25.41C5.641 25.161 5.54207 24.9222 5.36597 24.7461C5.18988 24.57 4.95104 24.471 4.702 24.471H3.763V20.708C3.763 20.5847 3.73871 20.4626 3.69152 20.3487C3.64433 20.2348 3.57517 20.1313 3.48797 20.0441C3.40078 19.9569 3.29726 19.8877 3.18334 19.8405C3.06942 19.7933 2.94731 19.769 2.824 19.769C2.70069 19.769 2.57859 19.7933 2.46466 19.8405C2.35074 19.8877 2.24722 19.9569 2.16003 20.0441C2.07283 20.1313 2.00367 20.2348 1.95648 20.3487C1.90929 20.4626 1.885 20.5847 1.885 20.708V24.471H0.939C0.689962 24.471 0.451123 24.57 0.275027 24.7461C0.0989301 24.9222 0 25.161 0 25.41C0 25.6591 0.0989301 25.8979 0.275027 26.074C0.451123 26.2501 0.689962 26.349 0.939 26.349Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M4.702 33.8832C4.95104 33.8832 5.18988 33.7843 5.36597 33.6082C5.54207 33.4321 5.641 33.1933 5.641 32.9442C5.641 32.6952 5.54207 32.4563 5.36597 32.2802C5.18988 32.1042 4.95104 32.0052 4.702 32.0052H3.763V28.2422C3.763 28.1189 3.73871 27.9968 3.69152 27.8829C3.64433 27.769 3.57517 27.6654 3.48797 27.5782C3.40078 27.4911 3.29726 27.4219 3.18334 27.3747C3.06942 27.3275 2.94731 27.3032 2.824 27.3032C2.70069 27.3032 2.57859 27.3275 2.46466 27.3747C2.35074 27.4219 2.24722 27.4911 2.16003 27.5782C2.07283 27.6654 2.00367 27.769 1.95648 27.8829C1.90929 27.9968 1.885 28.1189 1.885 28.2422V32.0052H0.939C0.689962 32.0052 0.451123 32.1042 0.275027 32.2802C0.0989301 32.4563 0 32.6952 0 32.9442C0 33.1933 0.0989301 33.4321 0.275027 33.6082C0.451123 33.7843 0.689962 33.8832 0.939 33.8832H4.702Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M10.3516 23.525C10.3514 23.6484 10.3756 23.7705 10.4228 23.8845C10.4699 23.9985 10.5391 24.1021 10.6263 24.1893C10.7135 24.2765 10.8171 24.3457 10.9311 24.3928C11.0451 24.44 11.1672 24.4642 11.2906 24.464H26.3506C26.4739 24.4642 26.5961 24.44 26.7101 24.3928C26.824 24.3457 26.9276 24.2765 27.0148 24.1893C27.1021 24.1021 27.1712 23.9985 27.2184 23.8845C27.2655 23.7705 27.2897 23.6484 27.2896 23.525C27.2884 21.8388 26.784 20.1913 25.8411 18.7934C24.8982 17.3955 23.5596 16.3108 21.9966 15.678C22.6954 15.0385 23.1847 14.2027 23.4003 13.2803C23.6158 12.3578 23.5476 11.3917 23.2046 10.5087C22.8615 9.62571 22.2596 8.86697 21.4779 8.33199C20.6961 7.797 19.7709 7.51074 18.8236 7.51074C17.8763 7.51074 16.9511 7.797 16.1693 8.33199C15.3875 8.86697 14.7856 9.62571 14.4426 10.5087C14.0995 11.3917 14.0313 12.3578 14.2469 13.2803C14.4624 14.2027 14.9517 15.0385 15.6506 15.678C14.0868 16.3103 12.7472 17.3947 11.8032 18.7926C10.8592 20.1905 10.3538 21.8383 10.3516 23.525ZM15.9926 12.235C15.9926 11.6765 16.1582 11.1305 16.4685 10.6661C16.7788 10.2017 17.2198 9.83973 17.7359 9.62599C18.2519 9.41225 18.8197 9.35633 19.3675 9.46529C19.9153 9.57425 20.4185 9.84321 20.8134 10.2382C21.2084 10.6331 21.4773 11.1363 21.5863 11.6841C21.6953 12.2319 21.6393 12.7997 21.4256 13.3157C21.2119 13.8317 20.8499 14.2728 20.3855 14.5831C19.9211 14.8934 19.3751 15.059 18.8166 15.059C18.0678 15.0582 17.35 14.7605 16.8206 14.231C16.2911 13.7016 15.9934 12.9838 15.9926 12.235ZM18.8166 16.935C20.4004 16.938 21.9304 17.51 23.1278 18.5467C24.3251 19.5834 25.1101 21.0159 25.3396 22.583H12.3006C12.5289 21.0167 13.3125 19.5845 14.5087 18.5478C15.7048 17.511 17.2337 16.9386 18.8166 16.935Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M11.2906 33.8829H26.3506C26.5996 33.8829 26.8384 33.7839 27.0145 33.6079C27.1906 33.4318 27.2896 33.1929 27.2896 32.9439C27.2896 32.6948 27.1906 32.456 27.0145 32.2799C26.8384 32.1038 26.5996 32.0049 26.3506 32.0049H11.2906C11.0415 32.0049 10.8027 32.1038 10.6266 32.2799C10.4505 32.456 10.3516 32.6948 10.3516 32.9439C10.3516 33.1929 10.4505 33.4318 10.6266 33.6079C10.8027 33.7839 11.0415 33.8829 11.2906 33.8829Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M15.0562 35.7607C14.8072 35.7607 14.5683 35.8597 14.3922 36.0358C14.2161 36.2119 14.1172 36.4507 14.1172 36.6997C14.1172 36.9488 14.2161 37.1876 14.3922 37.3637C14.5683 37.5398 14.8072 37.6387 15.0562 37.6387H22.5822C22.8312 37.6387 23.0701 37.5398 23.2462 37.3637C23.4223 37.1876 23.5212 36.9488 23.5212 36.6997C23.5212 36.4507 23.4223 36.2119 23.2462 36.0358C23.0701 35.8597 22.8312 35.7607 22.5822 35.7607H15.0562Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M2.817 12.2358C2.69365 12.2357 2.57149 12.2599 2.45751 12.3071C2.34352 12.3542 2.23995 12.4234 2.15273 12.5106C2.06551 12.5978 1.99635 12.7014 1.94921 12.8153C1.90207 12.9293 1.87787 13.0515 1.878 13.1748V16.9378H0.939C0.689962 16.9378 0.451123 17.0368 0.275027 17.2129C0.0989301 17.389 0 17.6278 0 17.8768C0 18.1259 0.0989301 18.3647 0.275027 18.5408C0.451123 18.7169 0.689962 18.8158 0.939 18.8158H4.702C4.95104 18.8158 5.18988 18.7169 5.36597 18.5408C5.54207 18.3647 5.641 18.1259 5.641 17.8768C5.641 17.6278 5.54207 17.389 5.36597 17.2129C5.18988 17.0368 4.95104 16.9378 4.702 16.9378H3.763V13.1748C3.76168 12.925 3.66136 12.6859 3.48404 12.5099C3.30671 12.3338 3.06685 12.2353 2.817 12.2358Z"
                                        fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="content">
                                <h4>Teacher Directory</h4>
                                <p>Learn from industry experts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 d-flex">
                        <div class="featured-card d-flex align-items-center w-100">
                            <div class="icon">
                                <svg width="48" height="52" viewBox="0 0 48 52" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M47.8393 13.194C47.8229 12.3543 47.5061 11.5482 46.9463 10.9221C46.3866 10.2959 45.621 9.89107 44.7883 9.78098C37.6921 8.7653 31.0733 5.61321 25.8123 0.743985C25.2981 0.265807 24.622 0 23.9198 0C23.2177 0 22.5415 0.265807 22.0273 0.743985C16.7677 5.6123 10.1508 8.76432 3.05632 9.78098C2.22377 9.89127 1.45827 10.2962 0.898559 10.9223C0.338847 11.5484 0.0219586 12.3543 0.00532474 13.194C-0.104675 20.877 1.28633 46.382 23.6123 51.962C23.8145 52.0127 24.0261 52.0127 24.2283 51.962C46.5563 46.382 47.9453 20.877 47.8393 13.194ZM23.9203 49.421C3.69832 44.131 2.44232 20.405 2.54132 13.229C2.54665 12.9996 2.63402 12.7798 2.78759 12.6093C2.94116 12.4389 3.15075 12.3291 3.37832 12.3C11.0005 11.2122 18.1107 7.82878 23.7623 2.59999C23.8055 2.55968 23.8623 2.53717 23.9213 2.53699C23.9801 2.53692 24.0367 2.55948 24.0793 2.59999C29.7312 7.82841 36.8412 11.2118 44.4633 12.3C44.6906 12.3291 44.9 12.4387 45.0534 12.609C45.2067 12.7793 45.294 12.9989 45.2993 13.228C45.3993 20.404 44.1433 44.128 23.9193 49.42L23.9203 49.421Z"
                                        fill="currentColor"/>
                                    <path
                                        d="M32.0838 20.3759C32.086 18.9904 31.7356 17.6272 31.0656 16.4146C30.3955 15.202 29.4278 14.1799 28.2537 13.4445C27.0795 12.7092 25.7375 12.2847 24.354 12.2112C22.9706 12.1377 21.5911 12.4175 20.3457 13.0243C19.1002 13.631 18.0296 14.5448 17.2348 15.6796C16.44 16.8143 15.947 18.1327 15.8024 19.5106C15.6578 20.8884 15.8662 22.2804 16.4081 23.5555C16.95 24.8305 17.8075 25.9467 18.8998 26.7989V34.7669C18.8998 36.0982 19.4287 37.3751 20.3701 38.3165C21.3116 39.258 22.5884 39.7869 23.9198 39.7869C25.2512 39.7869 26.528 39.258 27.4695 38.3165C28.4109 37.3751 28.9398 36.0982 28.9398 34.7669V26.7989C29.9179 26.0379 30.7095 25.0638 31.2543 23.9508C31.7991 22.8378 32.0828 21.6151 32.0838 20.3759ZM26.3998 34.7679C26.3998 35.4257 26.1385 36.0567 25.6733 36.5218C25.2081 36.987 24.5772 37.2484 23.9193 37.2484C23.2614 37.2484 22.6305 36.987 22.1653 36.5218C21.7001 36.0567 21.4388 35.4257 21.4388 34.7679V28.1519C23.0521 28.6689 24.7865 28.6689 26.3998 28.1519V34.7679ZM23.9198 25.9989C22.8075 25.9989 21.7201 25.669 20.7953 25.051C19.8704 24.4331 19.1496 23.5547 18.7239 22.5271C18.2982 21.4994 18.1869 20.3686 18.4039 19.2777C18.6209 18.1867 19.1565 17.1846 19.943 16.3981C20.7296 15.6116 21.7317 15.0759 22.8226 14.8589C23.9136 14.6419 25.0444 14.7533 26.072 15.179C27.0997 15.6046 27.978 16.3255 28.596 17.2503C29.214 18.1752 29.5438 19.2625 29.5438 20.3749C29.5422 21.8659 28.9492 23.2955 27.8948 24.3499C26.8405 25.4042 25.4109 25.9973 23.9198 25.9989Z"
                                        fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="content">
                                <h4>Unlimited access</h4>
                                <p>Learn on your schedule</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>
