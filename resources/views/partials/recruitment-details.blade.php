<div
    class="grid grid-cols-[80px,1fr] md:grid-cols-[100px,1fr] gap-x-1 gap-y-3 md:gap-x-6 md:gap-y-5 text-xs md:text-base  items-start">

    <div class="font-bold text-right flex justify-between items-center ">
        @php
            $textLength = mb_strlen($recruitment->employment_type["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->employment_type["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->employment_type["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->employment_type["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->job_description["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->job_description["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->job_description["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->job_description["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 dashed01 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->required_qualifications["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->required_qualifications["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->required_qualifications["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->required_qualifications["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->salary["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->salary["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->salary["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->salary["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->salary_notes["view_name"]);
            $justifyStyleMobile = $textLength == 6 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 6 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->salary_notes["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->salary_notes["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->salary_notes["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->treatment["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->treatment["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->treatment["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->treatment["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->working_hours["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->working_hours["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->working_hours["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->working_hours["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    <div class="font-bold text-right flex justify-between items-center">
        @php
            $textLength = mb_strlen($recruitment->holiday["view_name"]);
            $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
            $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
        @endphp
        <span class="block md:hidden"
            style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->holiday["view_name"] }}</span>
        <span class="hidden md:block"
            style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->holiday["view_name"] }}</span>
        <span>：</span>
    </div>
    <div>{!! nl2br(e($recruitment->holiday["value"])) !!}</div>

    <!-- 区切り線 -->
    <hr class="col-span-2 border-white border-dashed border-t-1 mb-3">

    @if(isset($recruitment->application_requirements["value"]))
        <div class="font-bold text-right flex justify-between items-center">
            @php
                $textLength = mb_strlen($recruitment->application_requirements["view_name"]);
                $justifyStyleMobile = $textLength == 5 ? 'letter-spacing: 0.1em; text-align: center;' : 'letter-spacing: 0.15em; text-align-last: justify;';
                $justifyStyleDesktop = $textLength == 5 ? 'letter-spacing: 0.15em; text-align: center;' : 'letter-spacing: 0.3em; text-align-last: justify;';
            @endphp
            <span class="block md:hidden"
                style="{{ $justifyStyleMobile }} flex: 1;">{{ $recruitment->application_requirements["view_name"] }}</span>
            <span class="hidden md:block"
                style="{{ $justifyStyleDesktop }} flex: 1;">{{ $recruitment->application_requirements["view_name"] }}</span>
            <span>：</span>
        </div>
        <div>{!! nl2br(e($recruitment->application_requirements["value"])) !!}</div>
    @endif
</div>