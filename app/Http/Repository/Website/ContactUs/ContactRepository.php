<?php
namespace App\Http\Repository\Website\ContactUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Contact
};

class ContactRepository{

		public function addAll($request)
{
    try {
        // dd($request);
        $contact = new Contact();
        $contact->full_name = $request['full_name'];
        $contact->email = $request['email'];
        $contact->mobile_number = $request['mobile_number'];
        $contact->contact_type = $request['contact_type'];
        $contact->subject = $request['subject'];
        $contact->suggestion = $request['suggestion'];
        $contact->save(); 

		return $contact;


    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}       
}