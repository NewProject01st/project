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

        public function create() {
        

            return view('admin.pages.aboutus.organizationchart.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  IlluminateHttpRequest  $request
         * @return IlluminateHttpResponse
         */

        public function store(Request $request) {
            $request->validate([
                'english_title'=>'required',
                'marathi_title'=>'required',
                'english_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'marathi_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $englishImageName = time() . '_english.' . $request->english_image->extension();
            $marathiImageName = time() . '_marathi.' . $request->marathi_image->extension();
            
            $request->english_image->storeAs('public/images/aboutus', $englishImageName);
            $request->marathi_image->storeAs('public/images/aboutus', $marathiImageName);

            $organizationCharts = [
                'english_title' => $request->english_title, 
                'marathi_title' => $request->marathi_title, 
                'english_image' => $englishImageName,
                'marathi_image' => $marathiImageName
            ];

            OrganizationChart::create($organizationCharts);
            return redirect('/organizationchart')->with(['message' => 'Post added successfully!', 'status' => 'success']);
        }

        public function show($id)
        {
            $organizationCharts = OrganizationChart::find($id);
            return view('admin.pages.aboutus.organizationchart.show')->with('organizationCharts', $organizationCharts);
        }
           public function edit($id)
    {
        $organizationCharts = OrganizationChart::find($id);
        return view('admin.pages.aboutus.organizationchart.edit')->with('organizationCharts', $organizationCharts);
    }
        
          /**
           * Update the specified resource in storage.
           *
           * @param  IlluminateHttpRequest  $request
           * @param  AppModelsPost  $post
           * @return IlluminateHttpResponse
           */
          public function update(Request $request, $id)
          {
              $request->validate([
                  'english_title' => 'required',
                  'marathi_title' => 'required',
                  'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // specify your validation rules for the image
              ]);
          
              $organizationChart = OrganizationChart::find($id);
          
              $imageName = '';
              $imageName1 = '';
          
              if ($request->hasFile('file')) {
                  $imageName = time() . '_english.' . $request->file('file')->extension();
                  $request->file('file')->storeAs('public/images/aboutus/', $imageName);
                  if ($organizationChart->english_image) {
                      Storage::delete('public/images/aboutus/' . $organizationChart->english_image);
                  }
              } else {
                  $imageName = $organizationChart->english_image;
              }
          
              if ($request->hasFile('file1')) {
                  $imageName1 = time() . '_marathi.' . $request->file('file1')->extension();
                  $request->file('file1')->storeAs('public/images/aboutus/', $imageName1);
                  if ($organizationChart->marathi_image) {
                      Storage::delete('public/images/aboutus/' . $organizationChart->marathi_image);
                  }
              } else {
                  $imageName1 = $organizationChart->marathi_image;
              }
          
              $organizationChart->update([
                  'english_title' => $request->english_title,
                  'marathi_title' => $request->marathi_title,
                  'english_image' => $imageName,
                  'marathi_image' => $imageName1
              ]);
          
             
              return redirect('/organizationchart')->with(['message' => 'Post updated successfully!', 'status' => 'success']);
          }
          
    public function destroy($id)
    {
        OrganizationChart::destroy($id);
        return redirect('organizationchart')->with('flash_message', 'Organization Charts deleted!');  
    }

}
