@extends(theme('layouts.master'))
@section('title')
    {{Settings('site_title')  ? Settings('site_title')  : 'Infix LMS'}} | {{__('membership.Membership')}}
@endsection
@section('css') @endsection


@section('mainContent')

    <style>

        .section_tittle {
            text-align: center;
            margin-bottom: 50px;
        }

        @media (max-width: 991px) {
            .section_tittle {
                margin-bottom: 40px;
            }
        }

        @media only screen and (min-width: 991px) and (max-width: 1200px) {
            .section_tittle {
                margin-bottom: 50px;
            }
        }

        .section_tittle h2 {
            font-size: 28px;
            margin-bottom: 11px;
            line-height: 1.5;
        }

        @media (max-width: 991px) {
            .section_tittle h2 {
                margin-bottom: 15px;
                font-size: 25px;
            }
        }

        @media (max-width: 991px) {
            .section_tittle h2 {
                font-size: 30px;
            }
        }


        .pricing_plan .single_pricing_plan {
            border: 1px solid #e8e8e8;
            border-radius: 5px;
            text-align: center;
            padding: 40px 20px 36px;
            margin: 10px;
        }

        @media (max-width: 768px) {
            .pricing_plan .single_pricing_plan {
                margin-bottom: 20px;
            }
        }

        .pricing_plan .single_pricing_plan h5 {
            font-size: 28px;
            font-weight: 600;
            color: var(--system_primery_color);
            /*margin-bottom: 18px;*/
        }

        .pricing_plan .single_pricing_plan h2 {
            font-size: 50px;
            font-weight: 600;
            position: relative;
            padding-left: 15px;
            display: inline-block;
            margin-bottom: 2px;
        }

        .pricing_plan .single_pricing_plan h2 span {
            font-size: 20px;
            position: absolute;
            left: 0;
            top: -1px;
        }

        .pricing_plan .single_pricing_plan p a {
            color: #8f8f8f;
            text-decoration: underline;
        }

        .pricing_plan .single_pricing_plan .theme_btn small_btn2 {
            margin: 26px 0 16px;
        }


        .list_style {
            /*margin-top: 30px;*/
        }

        .list_style h5 {
            background-color: #f6f8fa;
            font-size: 20px;
            margin-bottom: 0;
            padding: 18px 30px;
            border-radius: 5px 5px 0 0;
        }

        .list_style h5 span {
            font-size: 12px;
            font-weight: 500;
            color: #8f8f8f;
            margin-left: 5px;
        }

        .list_style ul {
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px 30px;
            border: 1px solid #e8e8e8;
            border-radius: 0 0 5px 5px;
        }

        .list_style ul li {
            list-style: none;
            flex: 48% 0 0;
            color: var(--system_secendory_color);
            margin: 7px 0;
        }

        @media (max-width: 768px) {
            .list_style ul li {
                flex: 100% 0 0;
            }
        }

        .list_style ul li i {
            margin-right: 10px;
            color: var(--system_primery_color);
        }

        .theme_according .card .card-header button.collapsed {
            padding: 12px 26px 10px 30px;
        }

        .mb_100 {
            margin-bottom: 100px;
        }

        .mt_100 {
            margin-top: 100px;
        }

        .pb_100 {
            padding-bottom: 100px;
        }

        .pt_100 {
            padding-top: 100px;
        }

        .single_pricing_plan a {
            font-size: 16px;
            font-weight: 500;
            line-height: 35px;
            font-family: "Jost", sans-serif;
        }


        .single_pricing_plan a:hover {
            color: var(--system_primery_color);
        }
    </style>
    <x-breadcrumb :banner="trans('common.N/A')"
                  :title="trans('frontend.Explore Membership Plan Ebook')"
                  :subTitle="trans('frontend.Membership Ebook')"/>



    <x-membership-course-ebook-list-page-section :id="$plan_id"/>

@endsection
@section('js')

@endsection
