<?php

namespace App\Http\Controllers\SuperAdmin\Settings\UCAP\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function __construct()
    {
        // Constructors
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = (array) ucap_get('faq');
        return view('superadmin.settings.ucap.website.index', compact(['faqs']));
    }

    /**
     * Display a listing of the resource.
     *
     * UCAP Setting Page
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // App cover_photo store and update
        if ($request->cover_photo != null) {
            $this->validate($request, array(
                'cover_photo' => 'required | dimensions:min_width=1920,min_height=650,max_width=1920,max_height=650|max:3000',
            ));
            ucap_set('cover_photo', 'avatar', $request->cover_photo);
        }

        // App about_photo store and update
        if ($request->about_photo != null) {
            $this->validate($request, array(
                'about_photo' => 'required | dimensions:min_width=550,min_height=490,max_width=550,max_height=490|max:2000',
            ));
            ucap_set('about_photo', 'avatar', $request->about_photo);
        }

        // App cover_heading store and update
        if ($request->cover_heading != null) {
            $this->validate($request, array(
                'cover_heading' => 'required | string',
            ));
            ucap_set('cover_heading', 'string', $request->cover_heading);
        }

        // App moto_ucap store and update
        if ($request->moto_ucap != null) {
            $this->validate($request, array(
                'moto_ucap' => 'required | string',
            ));
            ucap_set('moto_ucap', 'text', $request->moto_ucap);
        }

        // App max_university store and update
        if ($request->max_university != null) {
            $this->validate($request, array(
                'max_university' => 'required | integer',
            ));
            ucap_set('max_university', 'integer', $request->max_university);
        }

        // App max_program store and update
        if ($request->max_program != null) {
            $this->validate($request, array(
                'max_program' => 'required | integer',
            ));
            ucap_set('max_program', 'integer', $request->max_program);
        }

        // App about_ucap store and update
        if ($request->about_ucap != null) {
            $this->validate($request, array(
                'about_ucap' => 'required | string',
            ));
            ucap_set('about_ucap', 'text', $request->about_ucap);
        }

        // App ucap_address store and update
        if ($request->ucap_address != null) {
            $this->validate($request, array(
                'ucap_address' => 'required | string',
            ));
            ucap_set('ucap_address', 'text', $request->ucap_address);
        }


        // App contact_email store and update
        if ($request->contact_email != null) {
            $this->validate($request, array(
                'contact_email' => 'required | string | email',
            ));
            ucap_set('contact_email', 'string', $request->contact_email);
        }

        // App support_email_one store and update
        if ($request->support_email_one != null) {
            $this->validate($request, array(
                'support_email_one' => 'required | string | email',
            ));
            ucap_set('support_email_one', 'string', $request->support_email_one);
        }

        // App support_email_two store and update
        if ($request->support_email_two != null) {
            $this->validate($request, array(
                'support_email_two' => 'required | string | email',
            ));
            ucap_set('support_email_two', 'string', $request->support_email_two);
        }

        // App support_contact_one store and update
        if ($request->support_contact_one != null) {
            $this->validate($request, array(
                'support_contact_one' => 'required | string',
            ));
            ucap_set('support_contact_one', 'string', $request->support_contact_one);
        }

        // App support_contact_two store and update
        if ($request->support_contact_two != null) {
            $this->validate($request, array(
                'support_contact_two' => 'required | string',
            ));
            ucap_set('support_contact_two', 'string', $request->support_contact_two);
        }

        // App whatsapp_no_one store and update
        if ($request->whatsapp_no_one != null) {
            $this->validate($request, array(
                'whatsapp_no_one' => 'required | string',
            ));
            ucap_set('whatsapp_no_one', 'string', $request->whatsapp_no_one);
        }

        // App whatsapp_no_two store and update
        if ($request->whatsapp_no_two != null) {
            $this->validate($request, array(
                'whatsapp_no_two' => 'required | string',
            ));
            ucap_set('whatsapp_no_two', 'string', $request->whatsapp_no_two);
        }

        // App facebook store and update
        if ($request->facebook != null) {
            $this->validate($request, array(
                'facebook' => 'required | string | url',
            ));
            ucap_set('facebook', 'string', $request->facebook);
        }

        // App instgram store and update
        if ($request->instgram != null) {
            $this->validate($request, array(
                'instgram' => 'required | string | url',
            ));
            ucap_set('instgram', 'string', $request->instgram);
        }

        // App linkedin store and update
        if ($request->linkedin != null) {
            $this->validate($request, array(
                'linkedin' => 'required | string | url',
            ));
            ucap_set('linkedin', 'string', $request->linkedin);
        }



        toast('Updated System Information Successfully.', 'success')->autoClose(3000)->timerProgressBar();
        return redirect()->back();
    }





    /**
     * faq store
     */
    public function faqStore(Request $request)
    {
        $this->validate($request, array(
            'question' => 'required | string | max: 191',
            'answer' => 'required | string',
        ));

        $faq = (array) ucap_get('faq');
        $ques = array(
            'question' => $request->question,
            'answer' => $request->answer,
            'created_at' => now(),
            'updated_at' => now(),
        );
        $faq[] = $ques;

        ucap_set('faq', 'json', $faq);

        toast('Stored new faq successfully.', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * faq update
     */
    public function faqUpdate(Request $request)
    {
        $this->validate($request, array(
            'question' => 'required | string | max: 191',
            'answer' => 'required | string',
        ));

        $faq = (array) ucap_get('faq');

        $ques = $faq[$request->key];
        $ques['question'] = $request->question;
        $ques['answer'] = $request->answer;
        $ques['updated_at'] = now();

        $faq[$request->key] = $ques;

        ucap_set('faq', 'json', $faq);

        toast('Update faq successfully.', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }

    /**
     * faq delete
     */
    public function faqDelete($key)
    {
        $faq = (array) ucap_get('faq');
        unset($faq[$key]);
        ucap_set('faq', 'json', $faq);
        toast('Delete faq successfully.', 'success')->autoClose(2000)->timerProgressBar();
        return redirect()->back();
    }
}
