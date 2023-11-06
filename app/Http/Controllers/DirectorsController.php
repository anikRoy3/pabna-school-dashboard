<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorsRequest;
use App\Http\Resources\DirectorsResource;
use App\Models\DirectorsCategory;
use App\Models\Directors;
use Illuminate\Http\Request;

class DirectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $data = new Directors();
        if ($request->wantsJson()) {
            $data = $data->get();
            if ($data) {
                return response([
                    'status' => true,
                    "message" => "Data show successfully",
                    'code' => 200,
                    'data' => DirectorsResource::collection($data)
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
        return view("admin.Directors.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DirectorsCategory::all();
        return  view('admin.Directors.create', compact("categories"));
    }


    public function store(StoreDirectorsRequest $request)
    {

        if ($request->hasFile('image')) {
            // Handle image upload here
            $image_path = $request->file('image')->store('directors', 'public');

            // Save the image path in the 'image' column of the database
            $director = Directors::create([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "phone" => $request->input('phone'),
                "image" => $image_path,
                "designation" => $request->input('designation'),
                "biodata" => $request->input('biodata'),
                "speech" => $request->input('speech'),
                "subject" => $request->input('subject'),
                "d_c_id" => $request->input('d_c_id'),
            ]);
            $director->save();
        }
        if (!$director) {
            return redirect()->back()->with('error', 'দুঃখিত, পরিচালক তৈরি করার সময় একটি সমস্যা হয়েছে৷');
        }

        return redirect()->route('directors.index')->with('success', 'সফলভাবে, পরিচালক তৈরি করা হয়েছে।');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
