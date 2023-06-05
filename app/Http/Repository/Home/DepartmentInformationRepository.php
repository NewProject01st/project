<?php
namespace App\Http\Repository\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DepartmentInformation
};

class DepartmentInformationRepository  {
	public function getAll()
    {
        try {
            return DepartmentInformation::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $englishImageName = time() . '_english.' . $request->english_image->extension();
        $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/home/department-information', $englishImageName);
        $request->marathi_image->storeAs('public/images/home/department-information', $marathiImageName);

        
        $department_data = new DepartmentInformation();
        $department_data->english_title = $request['english_title'];
        $department_data->marathi_title = $request['marathi_title'];
        $department_data->english_description = $request['english_description'];
        $department_data->marathi_description = $request['marathi_description'];
        $department_data->english_image = $englishImageName;
        $department_data->marathi_image =   $marathiImageName;
        $department_data->url = $request['url'];
        // $department_data->date = $request['date'];
        dd($department_data);
        $department_data->save();       
              
		return $department_data;

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
        $department = DepartmentInformation::find($id);
        if ($department) {
            return $department;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Disaster.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $department_data = DepartmentInformation::find($request->id);

        if (!$department_data) {
            return [
                'msg' => 'Disaster Management News not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $department_data->english_image;
        $previousMarathiImage = $department_data->marathi_image;

        // Update the fields from the request
        $department_data->english_title = $request['english_title'];
        $department_data->marathi_title = $request['marathi_title'];
        $department_data->english_description = $request['english_description'];
        $department_data->marathi_description = $request['marathi_description'];
        $department_data->url = $request['url'];
        // $department_data->date = $request['date'];

        if ($request->hasFile('english_image')) {
            // Delete previous English image if it exists
            if ($previousEnglishImage) {
                Storage::delete('public/images/home/department-information/' . $previousEnglishImage);
            }

            // Store the new English image
            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $request->english_image->storeAs('public/images/home/department-information/', $englishImageName);
            $department_data->english_image = $englishImageName;
        }

        if ($request->hasFile('marathi_image')) {
            // Delete previous Marathi image if it exists
            if ($previousMarathiImage) {
                Storage::delete('public/images/home/department-information/' . $previousMarathiImage);
            }

            // Store the new Marathi image
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            $request->marathi_image->storeAs('public/images/home/department-information/', $marathiImageName);
            $department_data->marathi_image = $marathiImageName;
        }

        $department_data->save();

        return [
            'msg' => 'Disaster News updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Disaster News.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
        ];
    }
}
public function updateOne($request)
{
    try {
        $department = DepartmentInformation::find($request); // Assuming $request directly contains the ID        
        if ($department) {
            $is_active = $department->is_active === 1 ? 0 : 1;
            $department->is_active = $is_active;
            // dd($marquee);
            $department->save();

            return [
                'msg' => 'Disaster updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Disaster not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update slide.',
            'status' => 'error'
        ];
    }
}
public function deleteById($id)
{
    try {
        $department = DepartmentInformation::find($id);
        if ($department) {
              // Delete the images from the storage folder
              Storage::delete([
                'public/images/home/department-information/'.$department->english_image,
                'public/images/home/department-information/'.$department->marathi_image
            ]);

            // Delete the record from the database
            
            $department->delete();
            
            return $department;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}