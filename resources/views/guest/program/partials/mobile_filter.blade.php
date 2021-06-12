<form action="{{ route('guest.program.index') }}" class="form-inline addons mb-3">
    <div class="sidebar-widgets">


        <input type="hidden" name="order_by" value="{{ $selected['order_by'] }}" class="order_by">

        <!-- Search Form -->
        <input class="form-control" type="search" name="title" value="{{ $selected['title'] ?? old('title') }}" placeholder="Search Programs" aria-label="Search">

        <h4 class="side_title">{{ __('Provinces') }}</h4>
        <ul class="no-ul-list mb-3">
            @foreach($provinces as $province)
            <li>
                <input id="province_mobile_{{ $province->id }}" class="checkbox-custom" name="province[]" value="{{ $province->id }}" type="checkbox" @if(has_field($selected['province'], $province->id))checked @endif>
                <label for="province_mobile_{{ $province->id }}" class="checkbox-custom-label">{{ $province->name }}</label>
            </li>
            @endforeach
        </ul>

        {{-- <h4 class="side_title">{{ __('Faculties') }}</h4>
        <ul class="no-ul-list mb-3">
            @foreach($faculties as $faculty)
            <li>
                <input id="faculty_mobile_{{ $faculty->id }}" class="checkbox-custom" name="faculty[]" value="{{ $faculty->id }}" type="checkbox"  @if(has_field($selected['faculty'], $faculty->id))checked @endif>
                <label for="faculty_mobile_{{ $faculty->id }}" class="checkbox-custom-label">{{ $faculty->name }}</label>
            </li>
            @endforeach
        </ul> --}}

        <h4 class="side_title">{{ __('Tution Fees') }}</h4>
        <ul class="no-ul-list mb-3">
            <li>
                <input id="tution_fee_mobile_1" class="checkbox-custom" name="tution_fee[]" value="0-500" type="radio" @if(has_field($selected['tution_fee'], '0-500'))checked @endif>
                <label for="tution_fee_mobile_1" class="checkbox-custom-label">{{ 0 .' - '. 500 }} <sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></label>
            </li>
            <li>
                <input id="tution_fee_mobile_2" class="checkbox-custom" name="tution_fee[]" value="500-1000" type="radio" @if(has_field($selected['tution_fee'], '500-1000'))checked @endif>
                <label for="tution_fee_mobile_2" class="checkbox-custom-label">{{ 500 .' - '. 1000 }} <sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></label>
            </li>
            <li>
                <input id="tution_fee_mobile_3" class="checkbox-custom" name="tution_fee[]" value="1000-5000" type="radio" @if(has_field($selected['tution_fee'], '1000-5000'))checked @endif>
                <label for="tution_fee_mobile_3" class="checkbox-custom-label">{{ 1000 .' - '. 5000 }} <sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></label>
            </li>
            <li>
                <input id="tution_fee_mobile_4" class="checkbox-custom" name="tution_fee[]" value="5000-10000" type="radio" @if(has_field($selected['tution_fee'], '5000-10000'))checked @endif>
                <label for="tution_fee_mobile_4" class="checkbox-custom-label">{{ 5000 .' - '. 10000 }} <sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></label>
            </li>
            <li>
                <input id="tution_fee_5" class="checkbox-custom" name="tution_fee[]" value="10000-20000" type="radio" @if(has_field($selected['tution_fee'], '10000-20000'))checked @endif>
                <label for="tution_fee_5" class="checkbox-custom-label">{{ 10000 .' - '. 20000 }} <sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></label>
            </li>
            <li>
                <input id="tution_fee_mobile_6" class="checkbox-custom" name="tution_fee[]" value="20000-more" type="radio" @if(has_field($selected['tution_fee'], '20000-more'))checked @endif>
                <label for="tution_fee_mobile_6" class="checkbox-custom-label">{{ 'More then 20000' }} <sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></label>
            </li>
        </ul>

        <h4 class="side_title">{{ __('Degree Level') }}</h4>
        <ul class="no-ul-list mb-3">
            <li>
                <input id="degree_mobile_1" class="checkbox-custom" name="degree[]" value="phd" type="checkbox"  @if(has_field($selected['degree'], 'phd'))checked @endif>
                <label for="degree_mobile_1" class="checkbox-custom-label">{{ 'Phd' }}</label>
            </li>
            <li>
                <input id="degree_mobile_2" class="checkbox-custom" name="degree[]" value="post graduation" type="checkbox"  @if(has_field($selected['degree'], 'post graduation'))checked @endif>
                <label for="degree_mobile_2" class="checkbox-custom-label">{{ 'Post Graduation' }}</label>
            </li>
            <li>
                <input id="degree_mobile_3" class="checkbox-custom" name="degree[]" value="graduation" type="checkbox"  @if(has_field($selected['degree'], 'graduation'))checked @endif>
                <label for="degree_mobile_3" class="checkbox-custom-label">{{ 'Graduation' }}</label>
            </li>
            <li>
                <input id="degree_mobile_4" class="checkbox-custom" name="degree[]" value="diploma" type="checkbox"  @if(has_field($selected['degree'], 'diploma'))checked @endif>
                <label for="degree_mobile_4" class="checkbox-custom-label">{{ 'Diploma' }}</label>
            </li>
        </ul>

        <h4 class="side_title">{{ __('Program Duration') }}</h4>
        <ul class="no-ul-list mb-3">
            <li>
                <input id="mobile_program_duration1" class="checkbox-custom" name="program_duration[]" value="0-1" type="radio"  @if(has_field($selected['program_duration'], '0-1'))checked @endif>
                <label for="mobile_program_duration1" class="checkbox-custom-label">{{ 'Less Then 1 Year' }}</label>
            </li>
            <li>
                <input id="mobile_program_duration2" class="checkbox-custom" name="program_duration[]" value="1-2" type="radio"  @if(has_field($selected['program_duration'], '1-2'))checked @endif>
                <label for="mobile_program_duration2" class="checkbox-custom-label">{{ '1-2 Year\'s' }}</label>
            </li>
            <li>
                <input id="mobile_program_duration3" class="checkbox-custom" name="program_duration[]" value="2-0" type="radio"  @if(has_field($selected['program_duration'], '2-0'))checked @endif>
                <label for="mobile_program_duration3" class="checkbox-custom-label">{{ 'More then 2 Year\'s' }}</label>
            </li>
        </ul>

        <h4 class="side_title">{{ __('Scholarship') }}</h4>
        <ul class="no-ul-list mb-3">
            <li>
                <input id="mobile_scholarship1" class="checkbox-custom" name="scholarship[]" value="Yes" type="radio"  @if(has_field($selected['scholarship'], 'Yes'))checked @endif>
                <label for="mobile_scholarship1" class="checkbox-custom-label">{{ 'Yes' }}</label>
            </li>
            <li>
                <input id="mobile_scholarship2" class="checkbox-custom" name="scholarship[]" value="No" type="radio"  @if(has_field($selected['scholarship'], 'No'))checked @endif>
                <label for="mobile_scholarship2" class="checkbox-custom-label">{{ 'No' }}</label>
            </li>
        </ul>

        <h4 class="side_title">{{ __('Attendance Type') }}</h4>
        <ul class="no-ul-list mb-3">
            <li>
                <input id="mobile_attendance_type1" class="checkbox-custom" name="attendance_type[]" value="On Campus" type="radio"  @if(has_field($selected['attendance_type'], 'On Campus'))checked @endif>
                <label for="mobile_attendance_type1" class="checkbox-custom-label">{{ 'On Campus' }}</label>
            </li>
            <li>
                <input id="mobile_attendance_type2" class="checkbox-custom" name="attendance_type[]" value="Online" type="radio"  @if(has_field($selected['attendance_type'], 'Online'))checked @endif>
                <label for="mobile_attendance_type2" class="checkbox-custom-label">{{ 'Online' }}</label>
            </li>
        </ul>

        <h4 class="side_title">{{ __('Session Range') }}</h4>
        <ul class="no-ul-list mb-3">
            <li>
                <div class="input-group border-0">
                    <input type="text" value="{{ $selected['start_date'] }}" name="start_date" id="autoclose-date3" class="datepicker-here form-control @error('start_date') is-invalid @enderror" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2" style="width: 40%;"/>

                    <input type="button" value="To" class="form-control text-center text-bold text-white text-uppercase bg-ucap" readonly style="width: 10%; margin: 0px auto; display: block;">

                    <input type="text" value="{{ $selected['end_date'] }}" name="end_date" id="autoclose-date4" class="datepicker-here form-control @error('end_date') is-invalid @enderror" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2" style="width: 40%;"/>
                </div>
            </li>
        </ul>

        <button class="btn btn-theme full-width mb-2">{{ __('Filter Result') }}</button>

    </div>
</form>
