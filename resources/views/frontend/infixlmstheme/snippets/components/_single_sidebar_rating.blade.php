<ul class="Check_sidebar">

    @php
        $hasItem=is_array(request('rating'));
        if ($hasItem){
            $reviews =request('rating');
        }
    @endphp
    <li>
        <label class="primary_checkbox d-flex">
            <input type="checkbox" class="rating"
                   value="5"
            @if($hasItem)
                {{in_array(5,$reviews)?'checked':''}}
                @endif
            >
            <span class="checkmark mr_15"></span>
            <span class="label_name d-flex align-items-center gap-12 rating_filter_star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
            </span>
        </label>
    </li>

    <li>
        <label class="primary_checkbox d-flex">
            <input type="checkbox" class="rating"
                   value="4"
            @if($hasItem)
                {{in_array(4,$reviews)?'checked':''}}
                @endif
            >
            <span class="checkmark mr_15"></span>
            <span class="label_name d-flex align-items-center gap-12 rating_filter_star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
            </span>
        </label>
    </li>

    <li>
        <label class="primary_checkbox d-flex">
            <input type="checkbox" class="rating"
                   value="3"
            @if($hasItem)
                {{in_array(3,$reviews)?'checked':''}}
                @endif
            >
            <span class="checkmark mr_15"></span>
            <span class="label_name d-flex align-items-center gap-12 rating_filter_star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
            </span>
        </label>
    </li>

    <li>
        <label class="primary_checkbox d-flex">
            <input type="checkbox" class="rating"
                   value="2"
            @if($hasItem)
                {{in_array(2,$reviews)?'checked':''}}
                @endif
            >
            <span class="checkmark mr_15"></span>
            <span class="label_name d-flex align-items-center gap-12 rating_filter_star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
            </span>
        </label>
    </li>

    <li>
        <label class="primary_checkbox d-flex">
            <input type="checkbox" class="rating"
                   value="1"
            @if($hasItem)
                {{in_array(1,$reviews)?'checked':''}}
                @endif
            >
            <span class="checkmark mr_15"></span>
            <span class="label_name d-flex align-items-center gap-12 rating_filter_star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/full_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
                <img src="{{asset('public/frontend/infixlmstheme/svg/empty_star.svg')}}" alt="star">
            </span>
        </label>
    </li>

</ul>
