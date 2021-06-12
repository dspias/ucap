<form action="{{ route('guest.program.index') }}" id="tag-submit">
    <input type="hidden" name="order_by" value="{{ $selected['order_by'] }}" class="order_by">
    <div class="tag_cloud">
        @if(!is_null($selected['title']))
        <a href="javascript:void(0);" class="tag-cloud-lin"  style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ $selected['title'] }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="title" value="{{ $selected['title'] }}" id="">
        </a>
        @endif
        @foreach($selected['province'] as $value)

        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ optional($provinces->find($value))->name }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="province[]" id="" value="{{ $value }}">
        </a>
        @endforeach

        {{-- @foreach($selected['faculty'] as $value)
        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ optional($faculties->find($value))->name }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="faculty[]" id="" value="{{ $value }}">
        </a>
        @endforeach --}}

        @foreach($selected['tution_fee'] as $value)
        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ $value }}<sup>{{ ucap_get('currency_name') }}</sup>/<sub>{{ __('Year') }}</sub></span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="tution_fee[]" id="" value="{{ $value }}">
        </a>
        @endforeach

        @foreach($selected['degree'] as $value)
        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ $value }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="degree[]" id="" value="{{ $value }}">
        </a>
        @endforeach

        @foreach($selected['program_duration'] as $value)
        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ __('Program Duration: ') .$value }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="program_duration[]" id="" value="{{ $value }}">
        </a>
        @endforeach

        @foreach($selected['scholarship'] as $value)
        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ __('Scholarship: ') .$value }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="scholarship[]" id="" value="{{ $value }}">
        </a>
        @endforeach

        @foreach($selected['attendance_type'] as $value)
        @php if(is_null($value)) continue; @endphp
        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
            <span class="filter-title">{{ __('Attendance Type: ') .$value }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="attendance_type[]" id="" value="{{ $value }}">
        </a>
        @endforeach


        @if(!is_null($selected['start_date']))
        <a href="javascript:void(0);" class="tag-cloud-lin"  style="background-color: #f40808; color: #fff;">
            <span class="filter-title">From: {{ $selected['start_date'] }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="start_date" value="{{ $selected['start_date'] }}" id="">
        </a>
        @endif

        @if(!is_null($selected['end_date']))
        <a href="javascript:void(0);" class="tag-cloud-lin"  style="background-color: #f40808; color: #fff;">
            <span class="filter-title">To: {{ $selected['end_date'] }}</span>
            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
            <input type="hidden" name="end_date" value="{{ $selected['end_date'] }}" id="">
        </a>
        @endif
    </div>
</form>
