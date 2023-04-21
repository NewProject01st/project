<?php
namespace App\Http\Repository\AboutUs;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	OrganizationChart
};

class OrganizationChartRepository  {
	public function getAll()
    {
        try {
            return OrganizationChart::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/aboutus', $englishImageName);
        $request->marathi_image->storeAs('public/images/aboutus', $marathiImageName);

        $organizationchart_data = new OrganizationChart();
        $organizationchart_data->english_title = $request['english_title'];
        $organizationchart_data->marathi_title = $request['marathi_title'];
        $organizationchart_data->english_image = $englishImageName; // Save the image filename to the database
        $organizationchart_data->marathi_image = $marathiImageName; // Save the image filename to the database
        $organizationchart_data->save();       
     
        return $organizationchart_data;
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
        $organizationchart = OrganizationChart::find($id);
        if ($organizationchart) {
            return $organizationchart;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Organization Chart.',
            'status' => 'error'
        ];
    }
}
public function updateAll($id, $request)
{
    try {
        $organizationchart_data = OrganizationChart::find($id);
        $organizationchart_data->english_title = $request['english_title'];
        $organizationchart_data->marathi_title = $request['marathi_title'];
        $organizationchart_data->english_description = $request['english_description'];
        $organizationchart_data->marathi_description = $request['marathi_description'];
        $organizationchart_data->save();       
     
        return [
            'msg' => 'Organization Chart updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Organization Chart.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $organizationchart = OrganizationChart::destroy($id);
        if ($organizationchart) {
            return $organizationchart;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete Organization Chart.',
            'status' => 'error'
        ];
    }
}

}


