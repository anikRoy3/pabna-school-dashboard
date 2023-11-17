<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = new  Academic();
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
        return view("admin.academic.index", compact('data', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.academic.create");
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
            'pdf_file' => 'required|file',
            'status' => 'required|boolean',
        ];

        // Validate the request
        $request->validate($rules);


        // Handle file upload
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
        // dd($request->all());

        // Create a new Academic instance
        $academic = new Academic([
            'show_sl' => $request->input('show_sl'),
            'title' => $request->input('title'),
            'pdf' => $pdfPath,
            'status' => $request->input('status'),
        ]);

        // Save the Academic instance
        $academic->save();

        // You can redirect or do anything else after successful storage
        return redirect()->route('academic.index')->with('success', 'Academic record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academic $academic)
    {

        $data = Academic::find($academic->id);
        return view('admin.academic.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
   
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
            Storage::disk('public')->delete($request->pdf);
        } else {
            $pdfPath = $academic->pdf;
        }

        $academic->show_sl=$request->input('show_sl');
        $academic->title=$request->input('title');
        $academic->pdf= $pdfPath;
        $academic->status=$request->input('status');

        $academic->save();

        return redirect()->route('academic.index')->with('success', 'সফলভাবে, শিক্ষা সংক্রান্ত নোটিশ  আপডেট করা হয়েছে।');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id= $request->_body;
        $data = Academic::find($id);
        if($data->image){
                Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);;
    }
}
