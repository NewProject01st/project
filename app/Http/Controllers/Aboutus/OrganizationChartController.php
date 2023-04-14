<?php

namespace App\Http\Controllers\Aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationChart;

class OrganizationChartController extends Controller
{
    public function index()
    {
        $organizationCharts = OrganizationChart::all();
        // print_r($contacts);
        // die();
      return view ('admin.pages.aboutus.organizationChart.index')->with('organizationCharts', $organizationCharts);
    }

    public function create()
    {
        return view('admin.pages.aboutus.organizationchart.create');
    }
 
  
    public function store(Request $request)
    {
        $request->validate([
            'english_title'=>'required',
            'marathi_title'=>'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'english_image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'marathi_image'=>'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $englishImage = $request->file('english_image');
        $marathiImage = $request->file('marathi_image');
    
        // Upload English image
        $englishImagePath = $englishImage->store('public/images');
        $englishImageUrl = Storage::url($englishImagePath);
   
        // Upload Marathi image
        $marathiImagePath = $marathiImage->store('public/images');
        $marathiImageUrl = Storage::url($marathiImagePath);


         $registrationArray  =   array( 
            "english_title"    => $request->english_title,
            "marathi_title"     => $request->marathi_title,
            "english_image"  => $englishImageUrl,
            "marathi_image"  =>  $marathiImageUrl,
        );

        $organizationCharts = OrganizationChart::create($registrationArray);
        echo $ConstitutionHistory;
        die();
        if(!is_null($organizationCharts)) { 
            return redirect('organizationchart')->with('flash_message', 'Organization Charts completed successfully'); 

        }

        else {
            return redirect('organizationchart')->with('flash_message', 'Organization Charts failed. Try again.'); 

        }
    }


    public function edit($id)
    {
        $organizationCharts = OrganizationChart::find($id);
        return view('admin.pages.aboutus.organizationchart.edit')->with('organizationCharts', $organizationCharts);
    }
    public function update(Request $request, $id)
    {
        $organizationCharts = OrganizationChart::find($id);
        $input = $request->all();
        $organizationCharts->update($input);
        return redirect('organizationchart')->with('flash_message', 'Organization Charts Updated!');  
    }
    public function destroy($id)
    {
        OrganizationChart::destroy($id);
        return redirect('organizationchart')->with('flash_message', 'Organization Charts deleted!');  
    }

}
