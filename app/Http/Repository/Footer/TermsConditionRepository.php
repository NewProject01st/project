<?php
namespace App\Http\Repository\Footer;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	TermsCondition
};

class TermsConditionRepository  {
	public function getAll()
    {
        try {
            return TermsCondition::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function add($request)
{
    try {
        $terms_data = new TermsCondition();
        $terms_data->english_title = $request['english_title'];
        $terms_data->marathi_title = $request['marathi_title'];
        $terms_data->english_description = $request['english_description'];
        $terms_data->marathi_description = $request['marathi_description'];
        $terms_data->save();       
     
		return $terms_data;
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
        $terms_condition = TermsCondition::find($id);
        if ($terms_condition) {
            return $terms_condition;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id terms and conditions.',
            'status' => 'error'
        ];
    }
}
public function update($request)
{
    try {
        $terms_data = TermsCondition::find($request->id);
        $terms_data->english_title = $request['english_title'];
        $terms_data->marathi_title = $request['marathi_title'];
        $terms_data->english_description = $request['english_description'];
        $terms_data->marathi_description = $request['marathi_description'];
       
        $terms_data->update();  
             
        return [
            'msg' => 'terms and conditions updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update terms and conditions.',
            'status' => 'error'
        ];
    }
}
// public function updateOne($request)
// {
//     try {
//         $links = TermsCondition::find($request); // Assuming $request directly contains the ID        
//         if ($links) {
//             $is_active = $links->is_active === 1 ? 0 : 1;
//             $links->is_active = $is_active;
//             // dd($marquee);
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
        $terms = TermsCondition::destroy($id);
        if ($terms) {
            return $terms;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete terms and conditions.',
            'status' => 'error'
        ];
    }
}

}