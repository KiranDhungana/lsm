<div>
    @php
        if (@$course->discount_price!=null) {
            $course_price=@$course->discount_price;
        } else {
            $course_price=@$course->price;
        }
        $showWaitList =false;
        $alreadyWaitListRequest =false;
        if(isModuleActive('WaitList') && $course->waiting_list_status == 1 && auth()->check()){
           $count = $course->waitList->where('user_id',auth()->id())->count();
            if ($count==0){
                $showWaitList=true;
            }else{
                $alreadyWaitListRequest =true;
            }
        }
    @endphp

    <div class="quiz__details">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-xl-12">
                    <!-- <div class="row">

                    </div> -->
                    <div class="row row-gap-24 position-relative">
                        <div class="col-xl-8 col-lg-8">
                            <div>
                                <div class="quiz_test_wrapper mb-4">
                                    <div class="quiz_test_header">
                                        <h3> {{$course->quiz->title}}</h3>
                                    </div>
                                    <div class="quiz_test_body">

                                        <ul class="quiz_test_info">

                                            @php

                                                $duration =0;

                                                                                        $type =$course->quiz->question_time_type;
                                                                                        if ($type==0){
                                                                                            $duration = $course->quiz->question_time*$course->quiz->total_questions;
                                                                                        }else{
                                                                                            $duration = $course->quiz->question_time;

                                                                                        }


                                            @endphp
                                            <li>
                                                <span>{{__('frontend.Questions')}} <span>:</span></span>{{$course->quiz->total_questions}}
                                                {{__('frontend.Question')}}.
                                            </li>
                                            <li class="nowrap">
                                                <span>{{__('frontend.Duration')}}   <span>:</span></span> {{MinuteFormat($duration)}}
                                            </li>
                                        </ul>
                                        @if($course->is_upcoming_course && $course->publish_status == 'pending')
                                        @else

                                            @if (Auth::check() && $isEnrolled)

                                                @if($alreadyJoin == 0 || $course->quiz->multiple_attend == 1)
                                                    <a href="{{route('quizStart',[$course->id,$course->quiz->id,$course->slug])}}"
                                                       class="theme_btn mr_15 m-auto mt-4 text-center"
                                                    >{{__('frontend.Start Quiz')}}</a>
                                                @endif


                                                @if(count($preResult)!=0)
                                                    <button type="button"
                                                            class="theme_line_btn mr_15 m-auto mt-4  text-center  showHistory ">{{__('frontend.View History')}}</button>
                                                @endif

                                                @if($alreadyJoin == 1 && $certificate)
                                                    @if($isPass==1)
                                                        <a href="{{$isPass==1?route('getCertificate',[$course->id,$course->title]):'#'}}"
                                                           class="theme_line_btn mr_15 m-auto mt-4  text-center">
                                                            {{__('frontend.Get Certificate')}}
                                                        </a>
                                                    @endif
                                                @endif
                                            @else
                                                @if(!onlySubscription())
                                                    @if($isFree)
                                                        @if($is_cart == 1)
                                                            <a href="javascript:void(0)"
                                                               class="theme_btn text-center height_50 mb_10">{{__('common.Added To Cart')}}</a>
                                                        @else
                                                            <a href="{{route('addToCart',[@$course->id])}}"
                                                               class="theme_btn text-center height_50 mb_10">{{__('common.Add To Cart')}}</a>
                                                        @endif
                                                    @else
                                                        <a href="{{route('buyNow',[@$course->id])}}"
                                                           class="theme_btn mr_15 m-auto mt-4 text-center"
                                                        >{{__('frontend.Buy Now')}}</a>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif


                                        @if(count($preResult)!=0)
                                            <div id="historyDiv" class="pt-5 " style="display:none;">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>{{__('common.Date')}}</th>
                                                        <th>{{__('quiz.Marks')}}</th>
                                                        <th>{{__('quiz.Percentage')}}</th>
                                                        <th>{{__('common.Rating')}}</th>
                                                        <th>{{__('common.Details')}}</th>
                                                    </tr>
                                                    @foreach($preResult as $pre)
                                                        <tr>
                                                            <td>{{$pre['date']}}</td>
                                                            <td>{{$pre['publish']==1?$pre['score']:'--'}}
                                                                /{{$pre['totalScore']}}</td>
                                                            <td>
                                                                {{$pre['publish']==1?$pre['mark']:'--'}} %
                                                            </td>
                                                            @if($pre['publish']==1)
                                                                <td class="{{$pre['text_color']}}">{{$pre['status']}}</td>
                                                            @else
                                                                <td class="">{{__('quiz.Pending')}}</td>
                                                            @endif

                                                            <td>
                                                                <a href="{{$course->quiz->show_ans_sheet==1?route('quizResultPreview',$pre['quiz_test_id']):'#'}}"
                                                                   data-quiz_test_id="{{$pre['quiz_test_id']}}"
                                                                   title="{{$course->quiz->show_ans_sheet!=1?__('quiz.Answer Sheet is currently locked by Teacher'):''}}"
                                                                   class=" font_1 font_16 f_w_600 theme_text3 submit_q_btn">{{__('student.See Answer Sheet')}}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>

                                                @if($course->quiz->show_ans_with_explanation==1)
                                                    <x-quiz-details-question-list :quiz="$course->quiz"/>
                                                @endif
                                            </div>

                                        @endif


                                    </div>
                                </div>
                            </div>
                            <div class="bg-white quiz_border">
                                <div class="course_tabs gradient">
                                    <ul class="nav lms_tabmenu gradient_border" role="tablist" id="quiz_tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" id="Overview-tab"
                                               href="#Overview"
                                               role="tab" aria-controls="Overview"
                                               aria-selected="true">{{__('frontend.Overview')}}</a>
                                        </li>
                                        @if(Settings('hide_review_section')!='1')
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" id="Reviews-tab"
                                                   href="#Reviews"
                                                   role="tab" aria-controls="Instructor"
                                                   aria-selected="false">{{__('frontend.Reviews')}}</a>
                                            </li>
                                        @endif
                                        @if(Settings('hide_qa_section')!='1')
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" id="QA-tab" href="#QASection"
                                                   role="tab" aria-controls="Instructor"
                                                   aria-selected="false">{{__('frontend.QA')}}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="px-4 pb-4 lms_tab_content tab-content"  >
                                    <div class="tab-pane fade show active" id="Overview"
                                         aria-labelledby="Overview-tab">
                                        <!-- content  -->
                                        @if(isModuleActive('Installment') && $course_price > 0)
                                            @includeIf(theme('partials._installment_plan_details'), ['course' => $course,'position'=>'top_of_page'])
                                        @endif
                                        <div class="course_overview_description">
                                            <div class="single_overview">
                                                <h4 class="font_22 f_w_700 mb_20">{{__('frontend.Instructions')}}</h4>
                                                <div class="theme_border"></div>
                                                <p class="mb_25">  {{$course->quiz->instruction}} </p>

                                                @if(!empty($course->requirements))
                                                    <h4 class="font_22 f_w_700 mb_20">{{__('frontend.Course Requirements')}}</h4>
                                                    <div class="theme_border"></div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                {!! $course->requirements !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <p class="mb_20">
                                                    </p>
                                                @endif
                                                @if(!empty($course->about))
                                                    <h4 class="font_22 f_w_700 mb_20">{{__('frontend.Course Description')}}</h4>
                                                    <div class="theme_border"></div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                {!! $course->about !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb_20">
                                                    </p>
                                                @endif

                                                @if(!empty($course->outcomes))
                                                    <h4 class="font_22 f_w_700 mb_20">{{__('frontend.Course Outcomes')}}</h4>
                                                    <div class="theme_border"></div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                {!! $course->outcomes !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mb_20">
                                                    </p>
                                                @endif

                                            </div>


                                        </div>
                                        @if(isModuleActive('Installment') && $course_price > 0)
                                            @includeIf(theme('partials._installment_plan_details'), ['course' => $course,'position'=>'bottom_of_page'])
                                        @endif
                                        <!--/ content  -->
                                    </div>
                                    <div class="tab-pane fade" id="Reviews"
                                         aria-labelledby="Reviews-tab">
                                        <!-- content  -->
                                        <div class="course_review_wrapper">
                                            <div class="details_title">
                                                <h4 class="font_22 f_w_700">{{__('frontend.Student Feedback')}}</h4>
                                                <p class="font_16 f_w_400">{{$course->title}}</p>
                                            </div>
                                            <div class="course_feedback">
                                                <div class="course_feedback_left">
                                                    <h2>{{$course->total_rating}}</h2>
                                                    <div class="feedmak_stars">
                                                        @php

                                                            $main_stars=$course->total_rating;
                                                            $stars=intval($main_stars);

                                                        @endphp
                                                        @for ($i = 0; $i <  $stars; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                        @if ($main_stars>$stars)
                                                            <i class="fas fa-star-half"></i>
                                                        @endif
                                                        @if($main_stars==0)
                                                            @for ($i = 0; $i <  5; $i++)
                                                                <i class="far fa-star"></i>
                                                            @endfor
                                                        @endif
                                                    </div>
                                                    <span>{{__('frontend.Course Rating')}}</span>
                                                </div>
                                                <div class="feedbark_progressbar">
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{getPercentageRating($course->starWiseReview,5)}}%"
                                                                 aria-valuenow="{{getPercentageRating($course->starWiseReview,5)}}"
                                                                 aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <span>{{getPercentageRating($course->starWiseReview,5)}}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{getPercentageRating($course->starWiseReview,4)}}%"
                                                                 aria-valuenow="{{getPercentageRating($course->starWiseReview,4)}}"
                                                                 aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{getPercentageRating($course->starWiseReview,4)}}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{getPercentageRating($course->starWiseReview,3)}}%"
                                                                 aria-valuenow="{{getPercentageRating($course->starWiseReview,3)}}"
                                                                 aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>

                                                            </div>
                                                            <span>{{getPercentageRating($course->starWiseReview,3)}}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{getPercentageRating($course->starWiseReview,2)}}%"
                                                                 aria-valuenow="{{getPercentageRating($course->starWiseReview,2)}}"
                                                                 aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{getPercentageRating($course->starWiseReview,2)}}%</span>
                                                        </div>
                                                    </div>
                                                    <div class="single_progrssbar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 style="width: {{getPercentageRating($course->starWiseReview,1)}}%"
                                                                 aria-valuenow="{{getPercentageRating($course->starWiseReview,1)}}"
                                                                 aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="rating_percent d-flex align-items-center">
                                                            <div class="feedmak_stars d-flex align-items-center">
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <span>{{getPercentageRating($course->starWiseReview,1)}}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="course_review_header mb_20 mt-3">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="review_poients">
                                                            @if ($course->reviews->count()<1)
                                                                @if (Auth::check() && $isEnrolled)
                                                                    <p class="theme_color font_16 mb-0">{{ __('frontend.Be the first reviewer') }}</p>
                                                                @else

                                                                    <p class="theme_color font_16 mb-0">{{ __('frontend.No Review found') }}</p>
                                                                @endif

                                                            @else


                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="rating_star text-end">

                                                            @php
                                                                $PickId=$course->id;
                                                            @endphp
                                                            @if (Auth::check() && Auth::user()->role_id==3)
                                                                @if (!in_array(Auth::user()->id,$reviewer_user_ids) && $isEnrolled)

                                                                    <div
                                                                        class="star_icon d-flex align-items-center justify-content-end">
                                                                        <a class="rating">
                                                                            <input type="radio" id="star5" name="rating"
                                                                                   value="5"
                                                                                   class="rating"/><label
                                                                                class="full" for="star5" id="star5"
                                                                                title="Awesome - 5 stars"
                                                                                onclick="Rates(5, {{@$PickId }})"></label>

                                                                            <input type="radio" id="star4" name="rating"
                                                                                   value="4"
                                                                                   class="rating"/><label
                                                                                class="full" for="star4"
                                                                                title="Pretty good - 4 stars"
                                                                                onclick="Rates(4, {{@$PickId }})"></label>

                                                                            <input type="radio" id="star3" name="rating"
                                                                                   value="3"
                                                                                   class="rating"/><label
                                                                                class="full" for="star3"
                                                                                title="Meh - 3 stars"
                                                                                onclick="Rates(3, {{@$PickId }})"></label>

                                                                            <input type="radio" id="star2" name="rating"
                                                                                   value="2"
                                                                                   class="rating"/><label
                                                                                class="full" for="star2"
                                                                                title="Kinda bad - 2 stars"
                                                                                onclick="Rates(2, {{@$PickId }})"></label>

                                                                            <input type="radio" id="star1" name="rating"
                                                                                   value="1"
                                                                                   class="rating"/><label
                                                                                class="full" for="star1"
                                                                                title="Bad  - 1 star"
                                                                                onclick="Rates(1,{{@$PickId }})"></label>

                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @else

                                                                <p class="font_14 f_w_400 mt-0"><a
                                                                        href="{{url('login')}}"
                                                                        class="theme_color2">{{__('frontend.Sign In')}}</a>
                                                                    {{__('frontend.or')}} <a
                                                                        class="theme_color2"
                                                                        href="{{url('register')}}">{{__('frontend.Sign Up')}}</a>
                                                                    {{__('frontend.as student to post a review')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="course_cutomer_reviews">
                                                <div class="details_title">
                                                    <h4 class="font_22 f_w_700">{{__('frontend.Reviews')}}</h4>

                                                </div>
                                                <div class="customers_reviews" id="customers_reviews">


                                                </div>
                                            </div>

                                            <div class="author_courses">
                                                <div>
                                                    <h4 class="font_40 f_w_700 mb_20">{{__('frontend.Course you might like')}}</h4>
                                                </div>
                                                <div class="row row-gap-24">
                                                    @foreach(@$related as $r)
                                                        <div class="col-md-6">
                                                            <div class="course-item">
                                                                <a href="{{courseDetailsUrl(@$r->id,@$r->type,@$r->slug)}}">
                                                                    <div class="course-item-img lazy">
                                                                        <img class="w-100"
                                                                             src="{{ file_exists($r->thumbnail) ? asset($r->thumbnail) : asset('public/\uploads/course_sample.png') }}"
                                                                             alt="">
                                                                        <span
                                                                            class="course-tag"><span>Static</span></span>
                                                                    </div>
                                                                </a>

                                                                <div class="course-item-info">
                                                                    <a href="{{courseDetailsUrl(@$r->id,@$r->type,@$r->slug)}}"
                                                                       class="title">
                                                                        {{@$r->title}}
                                                                    </a>
                                                                    <div
                                                                        class="d-flex align-itemes-center justify-content-between meta">
                                                                        <div class="rating">
                                                                            <svg width="16" height="15"
                                                                                 viewBox="0 0 16 15" fill="none"
                                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M14.9922 5.21624L10.2573 4.53056L8.1344 0.242104C8.09105 0.168678 8.02784 0.10754 7.9513 0.0649862C7.87476 0.0224321 7.78764 0 7.69892 0C7.6102 0 7.52308 0.0224321 7.44654 0.0649862C7.37 0.10754 7.3068 0.168678 7.26345 0.242104L5.14222 4.52977L0.40648 5.21624C0.31946 5.22916 0.237852 5.2645 0.170564 5.31841C0.103275 5.37231 0.0528901 5.44272 0.0249085 5.52194C-0.00307309 5.60116 -0.00757644 5.68614 0.01189 5.76762C0.0313563 5.8491 0.0740445 5.92394 0.135295 5.98398L3.57501 9.33111L2.76146 14.0591C2.74696 14.1436 2.75782 14.2304 2.79281 14.3094C2.8278 14.3883 2.88549 14.4564 2.95932 14.5058C3.03314 14.5551 3.12011 14.5838 3.2103 14.5886C3.30049 14.5933 3.39026 14.5739 3.46936 14.5325L7.6985 12.3153L11.9276 14.5333C12.0068 14.5746 12.0965 14.5941 12.1867 14.5893C12.2769 14.5846 12.3639 14.5559 12.4377 14.5066C12.5115 14.4572 12.5692 14.3891 12.6042 14.3101C12.6392 14.2311 12.6501 14.1444 12.6356 14.0599L11.822 9.3319L15.2634 5.98398C15.3253 5.92392 15.3685 5.84885 15.3883 5.76699C15.4082 5.68515 15.4039 5.59969 15.3758 5.52003C15.3478 5.44036 15.2972 5.36956 15.2295 5.31541C15.1618 5.26126 15.0797 5.22586 14.9922 5.21308V5.21624Z"
                                                                                    fill="#FFC107"/>
                                                                            </svg>
                                                                            <span>{{$r->totalReview}} ({{$r->total_rating}} {{__("frontend.Ratings")}})</span>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                        <div class="enrolled-student">
                                                                            @if(!Settings('hide_total_enrollment_count') == 1)
                                                                                <a href="#">
                                                                                    <svg width="16" height="18"
                                                                                         viewBox="0 0 16 18" fill="none"
                                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M14.2508 3.87484L9.30078 1.0165C8.49245 0.549837 7.49245 0.549837 6.67578 1.0165L1.73411 3.87484C0.925781 4.3415 0.425781 5.20817 0.425781 6.14984V11.8498C0.425781 12.7832 0.925781 13.6498 1.73411 14.1248L6.68411 16.9832C7.49245 17.4498 8.49245 17.4498 9.30911 16.9832L14.2591 14.1248C15.0674 13.6582 15.5674 12.7915 15.5674 11.8498V6.14984C15.5591 5.20817 15.0591 4.34984 14.2508 3.87484ZM7.99245 5.1165C9.06745 5.1165 9.93411 5.98317 9.93411 7.05817C9.93411 8.13317 9.06745 8.99984 7.99245 8.99984C6.91745 8.99984 6.05078 8.13317 6.05078 7.05817C6.05078 5.9915 6.91745 5.1165 7.99245 5.1165ZM10.2258 12.8832H5.75911C5.08411 12.8832 4.69245 12.1332 5.06745 11.5748C5.63411 10.7332 6.73411 10.1665 7.99245 10.1665C9.25078 10.1665 10.3508 10.7332 10.9174 11.5748C11.2924 12.1248 10.8924 12.8832 10.2258 12.8832Z"
                                                                                            fill="#292D32"/>
                                                                                    </svg>
                                                                                    {{$r->total_enrolled}}
                                                                                    {{__('frontend.Students')}} </a>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="course-item-info-description">
                                                                        {{Str::limit(strip_tags($r->about), 100)}}
                                                                    </div>

                                                                    <div
                                                                        class="course-item-footer d-flex justify-content-between">
                                                                        <x-price-tag :price="$r->price"
                                                                                     :discount="$r->discount_price"/>

                                                                        @if(!onlySubscription())
                                                                            @auth()
                                                                                @if(!$r->isLoginUserEnrolled && !$r->isLoginUserCart)
                                                                                    <a href="#" class="cart_store"
                                                                                       data-id="{{$r->id}}">
                                                                                        <img src="{{asset('public/frontend/infixlmstheme/svg/cart.svg')}}" alt="cart">
                                                                                    </a>
                                                                                @endif
                                                                            @endauth
                                                                            @guest()
                                                                                @if(!$r->isGuestUserCart)
                                                                                    <a href="#" class="cart_store"
                                                                                       data-id="{{$r->id}}">
                                                                                        <img src="{{asset('public/frontend/infixlmstheme/svg/cart.svg')}}" alt="cart">
                                                                                    </a>
                                                                                @endif
                                                                            @endguest
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content  -->
                                    </div>
                                    <div class="tab-pane fade" id="QASection" aria-labelledby="QA-tab">
                                        <!-- content  -->

                                        <div class="conversition_box">
                                            <div id="conversition_box"></div>

                                            <div class="row">
                                                @if ($isEnrolled)
                                                    <div class="col-lg-12 " id="mainComment">
                                                        <form action="{{route('saveComment')}}" method="post" class="">
                                                            @csrf
                                                            <input type="hidden" name="course_id"
                                                                   value="{{@$course->id}}">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="section_title3 mb_20">
                                                                        <h3>{{__('frontend.Leave a question/comment') }}</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="single_input mb_25">
                                                                                            <textarea
                                                                                                placeholder="{{__('frontend.Leave a question/comment') }}"
                                                                                                name="comment"
                                                                                                class="primary_textarea gray_input"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mb_30">

                                                                    <button type="submit"
                                                                            class="theme_btn height_50">
                                                                        <i class="fas fa-comments"></i>
                                                                        {{__('frontend.Question') }}/
                                                                        {{__('frontend.comment') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="col-lg-12 text-center" id="mainComment">
                                                        <h4>{{__('frontend.You must be enrolled to ask a question')}}</h4>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="course_sidebar mt-0">

                                <div class="quiz_details_thumb">
                                    <img src="{{asset($course->image)}}" alt="image">
                                </div>

                                <div class="sidebar__widget quiz_sidebar__widget mb_30">
                                    @if(isModuleActive('EarlyBird') && Auth::check() && !$isEnrolled)
                                        @includeIf(theme('partials._early_bird_offer'), ['price_plans' => $course->pricePlans, 'product' => $course])
                                    @endif

                                    <div class="sidebar__title gap-2">
                                        <div id="price-container">
                                            <h3 id="price_show_tag">

                                                {{getPriceFormat($course_price)}}
                                            </h3>
                                            <div class="price_loader"></div>
                                        </div>

                                        <p>
                                            @if (Auth::check() && $isBookmarked )
                                                <i class="fas fa-heart"></i>
                                                <a href="{{route('bookmarkSave',[$course->id])}}"
                                                   class=" mr_10 sm_mb_10">{{__('frontend.Already In Wishlist')}}
                                                </a>
                                            @elseif (Auth::check() && !$isBookmarked )
                                                <a href="{{route('bookmarkSave',[$course->id])}}"
                                                   class="">
                                                    <i
                                                        class="far fa-heart"></i>
                                                    {{__('frontend.Add To Wishlist')}}  </a>
                                        @endif
                                    </div>
                                    @if($showWaitList)
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#courseWaitList"
                                           class="theme_btn d-block text-center height_50 mb_10">
                                            {{ __('frontend.Enter to Wait List') }}
                                        </a>
                                        @include(theme('partials._course_wait_list_form'),['course' => $course])
                                    @endif
                                    @if($alreadyWaitListRequest)
                                        <a href="#"
                                           class="theme_btn d-block text-center height_50 mb_10">
                                            {{ __('frontend.Already In Wait List') }}
                                        </a>
                                    @endif
                                    @if(!onlySubscription())

                                        @if($course->is_upcoming_course && $course->publish_status == 'pending')
                                            <x-upcoming-course-action :course="$course"/>
                                        @else
                                            @if (Auth::check())
                                                @if ($isEnrolled)
                                                    <a href="#"
                                                       class="theme_btn d-block text-center height_50 mb_10">{{__('common.Already Enrolled')}}</a>
                                                @else
                                                    @if($isFree)
                                                        @if($is_cart == 1)
                                                            <a href="javascript:void(0)"
                                                               class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a>
                                                        @else
                                                            <a href="{{route('addToCart',[@$course->id])}}"
                                                               class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a>
                                                        @endif
                                                    @else
                                                        @if($is_cart == 1)
                                                            <a href="javascript:void(0)"
                                                               class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a>
                                                        @else
                                                            <a href=" {{route('addToCart',[@$course->id])}} "
                                                               class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a>
                                                            <a href="{{route('buyNow',[@$course->id])}}"
                                                               class="theme_line_btn d-block text-center height_50 mb_20">{{__('common.Buy Now')}}</a>
                                                        @endif
                                                    @endif
                                                @endif

                                            @else
                                                @if($isFree)
                                                    @if($is_cart == 1)
                                                        <a href="javascript:void(0)"
                                                           class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a>
                                                    @else
                                                        <a href=" {{route('addToCart',[@$course->id])}} "
                                                           class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a>
                                                    @endif
                                                @else
                                                    @if($is_cart == 1)
                                                        <a href="javascript:void(0)"
                                                           class="theme_btn d-block text-center height_50 mb_10">{{__('common.Added To Cart')}}</a>
                                                    @else
                                                        <a href=" {{route('addToCart',[@$course->id])}} "
                                                           class="theme_btn d-block text-center height_50 mb_10">{{__('common.Add To Cart')}}</a>
                                                        <a href="{{route('buyNow',[@$course->id])}}"
                                                           class="theme_line_btn d-block text-center height_50 mb_20">{{__('common.Buy Now')}}</a>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                    @includeIf('gift::buttons.course_details_page_button', ['course' => $course])
                                    @if(isModuleActive('Installment') && $course_price > 0)
                                        @includeIf(theme('partials._installment_plan_button'), ['course' => $course])
                                    @endif
                                    @if(isModuleActive('Cashback'))
                                        @includeIf(theme('partials._cashback_card'), ['product' => $course])
                                    @endif

                                    <h4 class="f_w_700 mb_10">{{__('frontend.This course includes')}}:</h4>
                                    <ul class="course_includes">
                                        <li>
                                            <!-- <i class="ti-thumb-up"></i> -->
                                            <img src="{{asset('public/frontend/infixlmstheme/svg/file.svg')}}" alt="">
                                            <p>{{__('frontend.Skill Level')}}
                                                @foreach($levels as $level)
                                                    @if (@$course->level==$level->id)
                                                        {{ $level->title}}
                                                    @endif
                                                @endforeach
                                            </p>
                                        </li>
                                        <li>
                                            <!--<i class="ti-agenda"></i> -->
                                            <img src="{{asset('public/frontend/infixlmstheme/svg/question.svg')}}" alt="">
                                            <p>{{__('frontend.Questions')}} {{$course->quiz->total_questions}} </p></li>
                                        @if(!Settings('hide_total_enrollment_count') == 1)
                                            <li>
                                                <!-- <i class="ti-user"></i> -->
                                                <img src="{{asset('public/frontend/infixlmstheme/svg/student.svg')}}"
                                                     alt="">
                                                <p>{{__('frontend.Enrolled')}} {{$course->total_enrolled}} {{__('frontend.students')}}</p>
                                            </li>
                                        @endif
                                        @if($course->certificate)
                                            <li>
                                                <!-- <i class="ti-user"></i> -->
                                                <img src="{{asset('public/frontend/infixlmstheme/svg/trophy.svg')}}" alt="">
                                                <p>{{__('frontend.Certificate of Completion')}}</p></li>
                                        @endif

                                        <li>
                                            <!-- <i class="ti-blackboard"></i> -->
                                            <img src="{{asset('public/frontend/infixlmstheme/svg/lock-open.svg')}}" alt="">
                                            @if($course->access_limit>0)
                                                <p>{{$course->access_limit}} {{__('frontend.Days')}} {{__('frontend.Access')}}</p>
                                            @else
                                                <p>{{__('frontend.Full lifetime access')}}</p>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal cs_modal fade admin-query" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('frontend.Review') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i
                            class="ti-close "></i></button>
                </div>

                <form action="{{route('submitReview')}}" method="Post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="course_id" id="rating_course_id"
                               value="">
                        <input type="hidden" name="rating" id="rating_value" value="">

                        <div class="text-center">
                                                                <textarea class="lms_summernote" name="review" id=""
                                                                          placeholder="{{__('frontend.Write your review') }}"
                                                                          cols="30"
                                                                          rows="10">{{old('review')}}</textarea>
                            <span class="text-danger" role="alert">{{$errors->first('review')}}</span>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <div class="mt-40 d-flex justify-content-between">
                            <button type="button" class="theme_line_btn me-2"
                                    data-bs-dismiss="modal">{{ __('common.Cancel') }}
                            </button>
                            <button class="theme_btn "
                                    type="submit">{{ __('common.Submit') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @include(theme('partials._delete_model'))

</div>

<script>
    $(document).ready(function () {
        "use strict";
        $(window).on("scroll", function () {
            const scrollTopPosition = $(window).scrollTop();
            if (scrollTopPosition > 200) {
                $(".quiz_details_thumb").hide();
            } else {
                $(".quiz_details_thumb").show();
            }
        });

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            setTimeout(function() {
                const headerHeight = $('header').outerHeight() || 0;
                const navTabHeight = $('.course_tabs').outerHeight() || 0;
                const activeTabPane = $('.tab-pane.active');
                if (activeTabPane.length) {
                    $('html, body').animate({
                        scrollTop: activeTabPane.offset().top - (headerHeight + navTabHeight + 50)
                    }, 100);
                }
            }, 50);
        });

</script>
