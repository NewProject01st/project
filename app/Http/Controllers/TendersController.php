<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenders;

class TendersController extends Controller
{
    public function index()
    {
        $tenders = Tenders::all();
        // print_r($contacts);
        // die();
      return view ('admin.pages.tenders.index')->with('tenders', $tenders);
    }
    public function create()
    {
        return view('admin.pages.tenders.create');
    }
 
  
    public function store(Request $request)
    {

        $request->validate([
            'tender_date'=>'required',
            'english_title'=>'required',
            'marathi_title'=>'required',
            'english_description'=>'required',
            'marathi_description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'open_date'=>'required',
            'tender_number'=>'required',
            // 'tender_pdf'=>'required|mimes:pdf',
        ]);

        // $tenderPdfPath = $request->file('tender_pdf')->store('public/tender_pdfs'); // Store the PDF file in 'public/tender_pdfs' directory
         $tendersArray  =   array( 
          "tender_date"    => $request->tender_date,
            "english_title"    => $request->english_title,
            "marathi_title"     => $request->marathi_title,
            "english_description"  => $request->english_description,
            "marathi_description"  =>  $request->marathi_description,
            "start_date"  =>  $request->start_date,
            "end_date"  =>  $request->end_date,
            "open_date"  =>  $request->open_date,
            "tender_number"  =>  $request->tender_number,
            //  "tender_pdf"  =>   $tenderPdfPath,
        );

       

        $tenders = Tenders::create($tendersArray);

        if(!is_null($tenders)) { 
            return redirect('tender')->with('flash_message', 'Tender completed successfully'); 

        }

        else {
            return redirect('tender')->with('flash_message', 'Tender failed. Try again.'); 

        }
    }

    public function edit($id)
    {
        $tenders = Tenders::find($id);
        return view('admin.pages.tenders.edit')->with('tenders', $tenders);
    }
    public function update(Request $request, $id)
    {
        $tenders = Tenders::find($id);
        $input = $request->all();
        $tenders->update($input);
        return redirect('tender')->with('flash_message', 'Tender Updated!');  
    }
    public function destroy($id)
    {
      Tenders::destroy($id);
        return redirect('tender')->with('flash_message', 'Tender deleted!');  
    }
}
