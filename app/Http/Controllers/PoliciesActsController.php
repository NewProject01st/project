<?php

namespace App\Http\Controllers;

use App\Models\PoliciesActs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliciesActsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $policiesacts = PoliciesActs::all();
      return view ('admin.pages.policiesacts.index')->with('policiesacts', $policiesacts);
    }

    public function create()
    {
        return view('admin.pages.policiesacts.create');
    }  
    public function store(Request $request)
    {
        $request->validate([
            'tender_date'=>'required',
            'english_title'=>'required',
            'marathi_title'=>'required',
            'english_description'=>'required',
            'marathi_description'=>'required',
            'english_pdf' => 'required|file|mimes:pdf|max:2048', // Change image to file, and allow only PDF files
            'marathi_pdf' => 'required|file|mimes:pdf|max:2048', // Change image to file, and allow only PDF files
        ]);

        $englishpdf = time() . '_englishPdf.' . $request->english_pdf->getClientOriginalExtension(); // Get original extension for PDF file
        $request->english_pdf->storeAs('public/pdf/policiesActs', $englishpdf); // Store the PDF file in 'public/images' directory
        
        $marathipdf = time() . '_marathiPaf.' . $request->marathi_pdf->getClientOriginalExtension(); // Get original extension for PDF file
        $request->marathi_pdf->storeAs('public/pdf/policiesActs', $marathipdf); // Store the PDF file in 'public/images' directory

        // $tenderPdfPath = $request->file('tender_pdf')->store('public/tender_pdfs'); // Store the PDF file in 'public/tender_pdfs' directory
         $policiesActsArray  =   array( 
          "tender_date"    => $request->tender_date,
            "english_title"    => $request->english_title,
            "marathi_title"     => $request->marathi_title,
            "english_description"  => $request->english_description,
            "marathi_description"  =>  $request->marathi_description,
            'english_pdf' => $englishpdf,
            'marathi_pdf' => $marathipdf,
        );
        $policiesActs = PoliciesActs::create($policiesActsArray);        
        if(!is_null($policiesActs)) { 
            return redirect('policiesacts')->with('flash_message', 'Tender completed successfully'); 
        }

        else {
            return redirect('policiesacts')->with('flash_message', 'Tender failed. Try again.'); 

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PoliciesActs  $policiesActs
     * @return \Illuminate\Http\Response
     */
    public function show(PoliciesActs $policiesActs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PoliciesActs  $policiesActs
     * @return \Illuminate\Http\Response
     */
    public function edit(PoliciesActs $policiesActs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PoliciesActs  $policiesActs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PoliciesActs $policiesActs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PoliciesActs  $policiesActs
     * @return \Illuminate\Http\Response
     */
    public function destroy(PoliciesActs $policiesActs)
    {
        //
    }
}
