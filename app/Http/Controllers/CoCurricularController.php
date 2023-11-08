<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoCurricularRequest;
use App\Models\CoCurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoCurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = new CoCurricular();
        // dd($data->all());
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
        return view("admin.coCurricular.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.coCurricular.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoCurricularRequest $request)
    {
        // Create a new Exam instance with the validated data
        CoCurricular::create($request->all());
        // Redirect or respond as needed
        return redirect()->route('coCurricular.index')->with('success', 'Exam and result created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CoCurricular $coCurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoCurricular $coCurricular)

    {
        $data = CoCurricular::find($coCurricular->id);
        return view('admin.coCurricular.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCoCurricularRequest $request, CoCurricular $coCurricular)
    {
        $coCurricular = CoCurricular::find($coCurricular->id);
        $coCurricular->update($request->all());
        $coCurricular->save();
        return redirect()->route('coCurricular.index')->with('success', 'সফলভাবে,  পরীক্ষা ও পরীক্ষার ফলাফল আপডেট করা হয়েছে।');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->_body;
        $data = CoCurricular::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);; 
    }
}
