<?php

namespace App\Http\Controllers;


use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
          $data = new Admission();
        if ($request->wantsJson()) {
            $data = $data->get();
            if ($data) {
                return response([
                    'status' => true,
                    "message" => "Data show successfully",
                    'code' => 200,
                    'data' => $data
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'No data found',
                    "code" => 404,
                    'data' => null
                ]);
            }
        }

        $data = $data->all();
        $rank = $data->first();
        return view("admin.admission.index", compact('data', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.admission.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'show_sl' => 'nullable|integer',
            'title' => 'required|string',
            'pdf' => 'nullable|file',
            'status' => 'required|boolean',
        ];

        // Validate the request
        $request->validate($rules);


        // Handle file upload
        $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
        // dd($request->all());

        // Create a new Academic instance
        $academic = new Admission([
            'show_sl' => $request->input('show_sl'),
            'title' => $request->input('title'),
            'pdf' => $pdfPath,
            'status' => $request->input('status'),
        ]);

        // Save the Academic instance
        $academic->save();

        // You can redirect or do anything else after successful storage
        return redirect()->route('admission.index')->with('success', 'Academic record created successfully');
    }

    /**
     * Display the specified resource.
     */
    /*    public function show(Academic $academic)
    {
        //
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admission $admission)
    {

        $data = Admission::find($admission->id);
        return view('admin.admission.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admission $admission)
    {

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
            Storage::disk('public')->delete($request->pdf);
        } else {
            $pdfPath = $admission->pdf;
        }

        $admission->show_sl = $request->input('show_sl');
        $admission->title = $request->input('title');
        $admission->pdf = $pdfPath;
        $admission->status = $request->input('status');

        $admission->save();

        return redirect()->route('admission.index')->with('success', 'সফলভাবে, শিক্ষা সংক্রান্ত নোটিশ  আপডেট করা হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->_body;
        $data = Admission::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);;
    }
}
