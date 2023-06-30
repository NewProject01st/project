<?php
namespace App\Http\Repository\Footer;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	PolicyPrivacy
};

class PolicyPrivacyRepository  {
	public function getAll()
    {
        try {
            return PolicyPrivacy::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function add($request)
{
    try {
        $policy_data = new PolicyPrivacy();
        $policy_data->english_title = $request['english_title'];
        $policy_data->marathi_title = $request['marathi_title'];
        $policy_data->english_description = $request['english_description'];
        $policy_data->marathi_description = $request['marathi_description'];
        $policy_data->save();       
     
		return $policy_data;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $privacy_policy = PolicyPrivacy::find($id);
        if ($privacy_policy) {
            return $privacy_policy;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id privacy policy.',
            'status' => 'error'
        ];
    }
}
public function update($request)
{
    try {
        $policy_data = PolicyPrivacy::find($request->id);
        $policy_data->english_title = $request['english_title'];
        $policy_data->marathi_title = $request['marathi_title'];
        $policy_data->english_description = $request['english_description'];
        $policy_data->marathi_description = $request['marathi_description'];
       
        $policy_data->update();  
        
        return [
            'msg' => 'policy updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update policy.',
            'status' => 'error'
        ];
    }
}
// public function updateOne($request)
// {
//     try {
//         $links = PolicyPrivacy::find($request); // Assuming $request directly contains the ID        
//         if ($links) {
//             $is_active = $links->is_active === 1 ? 0 : 1;
//             $links->is_active = $is_active;
//             $links->save();

//             return [
//                 'msg' => 'Marquee updated successfully.',
//                 'status' => 'success'
//             ];
//         }

//         return [
//             'msg' => 'Marquee not found.',
//             'status' => 'error'
//         ];
//     } catch (\Exception $e) {
//         return [
//             'msg' => 'Failed to update slide.',
//             'status' => 'error'
//         ];
//     }
// }


public function deleteById($id)
{
    try {
        $policy = PolicyPrivacy::destroy($id);
        if ($policy) {
            return $policy;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete policy.',
            'status' => 'error'
        ];
    }
}

}