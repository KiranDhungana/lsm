<div>
    @php
        if ($quiz->random_question==1){
        $questions =$quiz->assignRand;
        }else{
        $questions =$quiz->assign;
        }
      $losing_count =$quiz->losing_focus_acceptance_number;
      $question_time_type =$quiz->question_time_type;
      $losing_type =$quiz->losing_type;
    @endphp
    <input type="hidden" name="quiz_assign" class="quiz_assign" value="{{count($questions)}}">
    <input type="hidden" name="" class="losing_count" value="{{$losing_count}}">
    <input type="hidden" name="" class="question_time_type" value="{{$question_time_type}}">
    <input type="hidden" name="" class="losing_question_time_type" value="{{$losing_type}}">
    <input type="hidden" name="" class="losing_count_message" value="{{trans('quiz.times you have been out of quiz')}}">
    <input type="hidden" name="" class="losing_message"
           value="{{trans('quiz.times you have been out of quiz').' '.trans('quiz.Your answer has been submitted')}}">

    <div class="quiz__details">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="quiz_questions_wrapper mb_30">
                                <!-- quiz_test_header  -->

                                @if($alreadyJoin!=0 && $quiz->multiple_attend==0)
                                    <div class="quiz_test_header d-flex justify-content-between align-items-center">
                                        <div class="quiz_header_left text-center">
                                            <h3>{{__('frontend.Sorry! You already attempted this quiz')}}</h3>
                                        </div>


                                    </div>
                                @else
                                    <div class="quiz_test_header d-flex justify-content-between align-items-center">
                                        <div class="quiz_header_left">
                                            <h3>{{$quiz->title}}</h3>
                                        </div>

                                        <div class="quiz_header_right">

                                            <span class="question_time">
                                @php
                                    $timer =0;
                                        if (!empty($course->duration)){
                                            $timer =$course->duration;
                                        }else{
                                            if(!empty($quiz->question_time_type==1)){
                                            $timer=$quiz->question_time;
                                        }else{
                                           $timer= $quiz->question_time*count($questions);
                                        }
                                        }

                                @endphp
                                             <span class="me-2">{{__('frontend.Remaining')}}:</span>
                                                <span id="timer">{{ $timer }}:00</span>
                                                {{ __('quiz.Min') }}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- quiz_test_body  -->
                                    <form action="{{ route('quizSubmit') }}" method="POST" id="quizForm">
                                        <input type="hidden" name="quizType" value="2">
                                        <input type="hidden" name="courseId" value="{{ $course->id }}">
                                        <input type="hidden" name="quizId" value="{{ $quiz->id }}">
                                        <input type="hidden" name="question_review" id="question_review"
                                               value="{{ $quiz->question_review }}">
                                        <input type="hidden" name="start_at" value="">
                                        <input type="hidden" name="quiz_test_id" value="">
                                        <input type="hidden" name="quiz_start_url"
                                               value="{{ route('quizTestStart') }}">
                                        <input type="hidden" name="single_quiz_submit_url"
                                               value="{{ route('singleQuizSubmit') }}">
                                        <input type="hidden" name="show_ans"
                                               value="{{ $quiz->question_review != 1 && $quiz->show_result_each_submit == 1 ? 1 : 0 }}">
                                        <input type="hidden" name="show_ans_success"
                                               value="{{ __('quiz.Correct Answer') }}">
                                        <input type="hidden" name="show_ans_failed"
                                               value="{{ __('quiz.Wrong Answer') }}">
                                        @csrf

                                        <div class="quiz_test_body ">
                                            <div class="tabControl">
                                                <div class="row">

                                                    <div class="col-xl-12">

                                                        @php
                                                            $count2 = 1;
                                                        @endphp


                                                        <div class="question_list_header">
                                                            <div class="question_list_top">
                                                                <p>{{ __('quiz.Question') }} <span
                                                                        id="currentNumber">{{ $count2 }}</span>
                                                                    {{ __('common.out of') }} {{ count($questions) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="nav question_number_lists" id="nav-tab"
                                                             role="tablist">
                                                            {{--                                                            <a class="nav-link arrow">--}}
                                                            {{--                                                                <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                                            {{--                                                                    <path d="M7.995 1.267L9.502 2.7535L4.741 7.5537L3.8938 8.4062H5.0938H22V10.5312H5.0938H3.8866L4.7402 11.3848L9.5379 16.1825L8.0049 17.6728L0.6875 10.3554V8.5821L7.995 1.267Z" fill="currentColor" stroke="currentColor"/>--}}
                                                            {{--                                                                </svg>--}}
                                                            {{--                                                            </a>--}}

                                                            @if (isset($questions))
                                                                @foreach ($questions as $key2 => $assign)
                                                                    <a class="nav-link questionLink link_{{ $assign->id }} {{ $key2 == 0 ? 'skip_qus' : 'pouse_qus' }}"
                                                                       data-bs-toggle="tab"
                                                                       href="#pills-{{ $assign->id }}"
                                                                       role="tab" aria-controls="nav-home"
                                                                       data-qus="{{ $assign->id }}"
                                                                       aria-selected="true">{{ $count2 }}</a>
                                                                    @php
                                                                        $count2++;
                                                                    @endphp
                                                                @endforeach
                                                            @endif
                                                            {{--                                                            <a class="nav-link arrow">--}}
                                                            {{--                                                                <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                                            {{--                                                                    <path d="M14.9975 17.733L13.4898 16.2465L18.2609 11.4463L19.1082 10.5938H17.9062H1V8.46879H17.9062H19.1134L18.2598 7.61523L13.4621 2.81753L14.9951 1.32716L22.3125 8.64464V10.4179L14.9975 17.733Z" fill="currentColor" stroke="currentColor"/>--}}
                                                            {{--                                                                </svg>--}}
                                                            {{--                                                            </a>--}}
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="tab-content" id="pills-tabContent">
                                                            @php
                                                                $count = 1;
                                                            @endphp
                                                            @if (isset($questions))
                                                                @foreach ($questions as $key => $assign)
                                                                    @php
                                                                        $options = [];
                                                                        if (isset($assign->questionBank->questionMu)) {
                                                                            $options = $assign->questionBank->questionMu;
                                                                        }

                                                                           $totalCurrentAns = count($options->where('status',1));


                                                            $qusBank =$assign->questionBank;
                                                            $already=null;
                                                            if (isset($previous)){
                                                                $already=$previous->where('qus_id',$qusBank->id)->first();
                                                            }
                                                                    @endphp
                                                                    <div
                                                                        class="tab-pane fade  {{ $key == 0 ? 'active show' : '' }} singleQuestion"
                                                                        data-qus-id="{{ $assign->id }}"
                                                                        data-qus-type="{{ $assign->questionBank->type }}"
                                                                        id="pills-{{ $assign->id }}" role="tabpanel"
                                                                        aria-labelledby="pills-home-tab{{ $assign->id }}">
                                                                        <!-- content  -->
                                                                        <div class="question_list_header">


                                                                        </div>
                                                                        <div class="multypol_qustion mb_30">
                                                                            <h4 class="question_title_quiz">
                                                                                {!! @$assign->questionBank->question !!}</h4>
                                                                            @if(@$quiz->show_total_correct_answer == 1)
                                                                                <small>({{ __('quiz.Choose') }} <span
                                                                                        class="questionAnsTotal text-danger fw-bold">
                                                                                        {{ count($options->where('status', 1)) }}</span>
                                                                                    @if (count($options->where('status', 1)) <= 1)
                                                                                        {{ __('quiz.answer') }})
                                                                                    @else
                                                                                        {{ __('quiz.answers') }})
                                                                                    @endif
                                                                                </small>
                                                                            @endif

                                                                        </div>
                                                                        <input type="hidden" class="question_type"
                                                                               name="type[{{$assign->questionBank->id}}]"
                                                                               value="{{ @$assign->questionBank->type}}">
                                                                        <input type="hidden" class="question_id"
                                                                               name="question[{{$assign->questionBank->id}}]"
                                                                               value="{{ @$assign->questionBank->id}}">

                                                                        @if($assign->questionBank->type=="M")
                                                                            <ul class="quiz_select">
                                                                                @foreach($options as $option)

                                                                                    <li>
                                                                                        <label
                                                                                            class="primary_bulet_checkbox d-flex">
                                                                                            <input class="quizAns"
                                                                                                   name="ans[{{$option->question_bank_id}}][]"
                                                                                                   type="checkbox"
                                                                                                   value="{{$option->id}}">

                                                                                            <span
                                                                                                class="checkmark mr_10"></span>
                                                                                            <span
                                                                                                class="label_name">{{$option->title}} </span>
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach

                                                                            </ul>
                                                                        @elseif($assign->questionBank->type=="X")

                                                                            @include(theme('partials._quiz_matching_type'),compact('qusBank','already'))

                                                                        @else
                                                                            <div style="margin-bottom: 20px;">
                                                                                <textarea
                                                                                    class="textArea lms_summernote quizAns"
                                                                                    id="editor{{ $assign->id }}"
                                                                                    cols="30" rows="10"
                                                                                    name="ans[{{ $assign->questionBank->id }}]"></textarea>
                                                                            </div>
                                                                        @endif
                                                                        @if (!empty($assign->questionBank->image))
                                                                            <div class="ques_thumb mb_50">
                                                                                <img
                                                                                    src="{{ asset($assign->questionBank->image) }}"
                                                                                    class="img-fluid" alt="">
                                                                            </div>
                                                                        @endif
                                                                        <div
                                                                            class="sumit_skip_btns d-flex align-items-center mb_50">
                                                                            @if (count($questions) != $count)
                                                                                <span
                                                                                    class="quiz_primary_btn  mr_20 next"
                                                                                    data-question_id="{{ $assign->questionBank->id }}"
                                                                                    data-assign_id="{{ $assign->id }}"
                                                                                    data-question_type="{{ $assign->questionBank->type }}"
                                                                                    id="next">{{ __('common.Confirm') }}</span>
                                                                                <span
                                                                                    class=" font_1 quiz_secondary_btn theme_text3 submit_q_btn skip"
                                                                                    id="skip">{{ __('student.Skip') }}
                                                                                    {{ __('frontend.Question') }}</span>
                                                                            @else
                                                                                <button type="button"
                                                                                        data-question_id="{{ $assign->questionBank->id }}"
                                                                                        data-assign_id="{{ $assign->id }}"
                                                                                        data-question_type="{{ $assign->questionBank->type }}"
                                                                                        class="submitBtn theme_btn small_btn  mr_20">
                                                                                    {{ __('student.Submit') }}
                                                                                </button>
                                                                            @endif
                                                                        </div>


                                                                        <!-- content::end  -->
                                                                    </div>
                                                                    @php
                                                                        $count++;
                                                                    @endphp
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
