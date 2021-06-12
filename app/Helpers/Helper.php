<?php

use App\Models\ApplicationProgram;
use App\Models\Country;
use App\Models\Role;
use App\Models\UcapInfo;
use App\Models\Wishlist;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('is_country_exist')) {

    /**
     * find country exist or not
     * @param
     * @return
     */
    function is_country_exist($key)
    {
        $country = Country::whereSlug($key)->first();
        return (is_null($country)) ? false : true;
    }
}

if (!function_exists('get_status')) {

    /**
     * check status active or not
     * @param
     * @return
     */
    function get_status($value)
    {
        if (is_null($value)) return null;
        return ($value == true) ? '<div class="badge badge-success">Active</div>' : '<div class="badge badge-danger">Inactive</div>';
    }
}

if (!function_exists('application_status')) {

    /**
     * check status active or not
     * @param
     * @return
     */
    function application_status($value, $reason = null)
    {
        if (is_null($value)) return null;
        $button = null;

        if($value == -1) $button =  '<span class="text-bold p-2 text-white badge badge-danger"  data-toggle="tooltip" data-title="'.$reason.'">Rejected</span>';
        elseif($value == 0) $button =  '<span class="text-bold p-2 text-white badge badge-dark">Pending</span>';
        elseif($value == 1) $button =  '<span class="text-bold p-2 text-white badge badge-warning">Processing</span>';
        elseif($value == 2) $button =  '<span class="text-bold p-2 text-white badge badge-success">Completed</span>';
        return $button;
    }
}


if (!function_exists('get_date')) {
    /**
     * Get Date
     * @param
     * @return
     */
    function get_date($date, $format = 'd M, Y')
    {
        if (is_null($date)) return null;
        $dd = new DateTime($date);
        return $dd->format($format);
    }
}

if (!function_exists('ago_time')) {
    function ago_time($date)
    {
        if (is_null($date)) return null;
        return Carbon::parse($date)->diffForHumans();
    }
}

if (!function_exists('get_age')) {
    function get_age($dob)
    {
        if (is_null($dob)) return null;
        return Carbon::parse($dob)->age;
    }
}


/**
 * ucap Info set
 */

if (!function_exists('ucap_set')) {
    function ucap_set($name, $type, $value)
    {
        $data = UcapInfo::where('name', $name)->first();
        if ($data == null) {
            $data = new UcapInfo();
            $data->name = $name;
            $data->type = $type;
        } else {
            $type = $data->type;
        }

        if ($type == 'avatar') {
            $path = storage_path('app/media/' . optional($data)->avatar);
            if (file_exists($path)) {
                @unlink($path);
            }
            $data->avatar = $value->store('ucapAvatar', 'media');
        } elseif ($type == 'json') {
            $en_value = json_encode($value);
            $data->json_data = $en_value;
        } elseif ($type == 'string') {
            $data->string_data = $value;
        } elseif ($type == 'integer') {
            $data->integer_data = $value;
        } elseif ($type == 'double') {
            $data->double_data = $value;
        } else {
            $data->text_data = $value;
        }
        if (!$data->save()) {
            toast(ucfirst($type) . ' did not create or updated.', 'success')->autoClose(2000)->timerProgressBar();
            return redirect()->back();
        }
    }
}


/**
 * ucap Info get
 */

if (!function_exists('ucap_get')) {
    function ucap_get($name)
    {
        $data = UcapInfo::where('name', $name)->first();
        $value = null;
        if ($data != null) {
            $type = $data->type;
            if ($type == 'avatar') {
                $value = env('IMG_STORE') . $data->avatar;
            } elseif ($type == 'json') {
                $value = json_decode($data->json_data, true);
                $value = (array) $value;
            } elseif ($type == 'string') {
                $value = $data->string_data;
            } elseif ($type == 'integer') {
                $value = $data->integer_data;
            } elseif ($type == 'double') {
                $value = $data->double_data;
            } else {
                $value = $data->text_data;
            }
        }
        return $value;
    }
}


/**
 * media has or not
 */

if (!function_exists('has_media')) {
    function has_media($model, $type = NULL, $conversion = NULL)
    {
        $url = null;
        if (!is_null($model)) {
            $file = $model->getFirstMedia($type);
            if ($file != null) {
                $url = (is_null($conversion)) ?  $file->getUrl() : $file->getUrl($conversion);
            }
        }
        return $url;
    }
}


/**
 * wishlist has or not
 */

if (!function_exists('has_wishlist')) {
    function has_wishlist($program_id)
    {
        if(Auth::check()){
            $user_id = auth()->user()->id;
        } else{
            $user_id = null;
        }
        $wishlist = Wishlist::whereUser_id($user_id)->whereProgram_id($program_id)->first();

        return (is_null($wishlist)) ? false : true;
    }
}

/**
 * show image
 */

if (!function_exists('show_image')) {
    function show_image($url)
    {
        if(is_null($url)) return null;
        if (env('DISK') == 'dropbox') return $url;
        return url($url);
    }
}


/**
 * ad show big
 */

if (!function_exists('total_applied')) {
    function total_applied($user_id)
    {
        return ApplicationProgram::whereHas('application', function ($builder) use ($user_id) {
            $builder->whereStudent_id($user_id);
        })->count();
    }
}


/**
 * ad show big
 */

if (!function_exists('get_roleid')) {
    function get_roleid($slug)
    {
        return $role_id = Role::whereSlug($slug)->firstOrFail()->id;
    }
}


/**
 * Get Name
 */

if (!function_exists('get_name')) {
    function get_name($name)
    {
        $name = str_replace(" ", "_", $name);
        $name = str_replace("/", "_", $name);
        $name = str_replace("'", "", $name);
        $name = preg_replace('/[^\p{L}\p{N}]/u', '_', $name);
        return $name;
    }
}


/**
 * Get Name
 */

if (!function_exists('yearmonth')) {
    function yearmonth($year)
    {
        return (!is_null($year)) ? $year * 12 : null;
    }
}
/**
 * Get Name
 */

if (!function_exists('messenger_route')) {
    function messenger_route()
    {
        return url(config('chatify.path'));
    }
}

/**
 * Get Name
 */

if (!function_exists('show_price')) {
    function show_price($amount, $point = 2)
    {
        return number_format($amount, $point, ',', ' ');
    }
}

/**
 * Get Name
 */

if (!function_exists('show_logo')) {
    function show_logo($type)
    {
        $url = show_image(ucap_get($type));

        if($url == null && $type == 'main_logo'){
            $url = asset('assets/images/logo.png');
        } elseif($url == null){
            $url = asset('assets/images/small_logo.png');
        }

        return $url;
    }
}


/**
 * Get Name
 */

if (!function_exists('upcomming_sessions')) {
    function upcomming_sessions($program)
    {
        $sessions = $program->sessions()->where('session_start', '>', date('Y-m-d'))->orderBy('session_start')->get();

        return $sessions;
    }
}
