<?php

namespace App\Http\Controllers;

use App\Models\Rules;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Rules::first();
        // dd($data);
        if ($request->wantsJson()) {
            $data = $data->get();
            if ($data) {
                return response([
                    'status' => true,
                    'message' => 'Data Show Successfully',
                    'code' => 200,
                    'data' => $data,

                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'তথ্য পাওয়া যায়নি',
                    'code' => 404,
                    'data' => null,

                ], 404);
            }
        }
        return view("admin.rules.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        Rules::create($validatedData);
        return redirect()->route('rules.index')->with('success', 'Rules created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rules $rules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Rules::find($id);
        return view('admin.rules.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        $rules = Rules::findOrFail($id);
        $rules->update($validatedData);
        return redirect()->route('rules.index')->with('success', 'Rules updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id= $request->_body;
        $data = Rules::find($id);
        $data->delete();
        return response()->json([
            'success' => true
        ]);;
    }
}
