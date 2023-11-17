<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorsRequest;
use App\Http\Requests\UpdateDirectorsRequest;
use App\Http\Resources\DirectorsResource;
use App\Models\DirectorsCategory;
use App\Models\Directors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:directors,email',
            'phone' => 'required|string',
            'image' => 'nullable|file',
            'designation' => 'required|string',
            'biodata' => 'required|string',
            'speech' => 'required|string',
            'd_c_id' => 'required|integer',
        ]);


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
        $data = Directors::find($id);
        return view('admin.directors.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)

    {

        // Find the director you want to update
        $director = Directors::find($id);

        if (!$director) {
            return redirect()->route('directors.index')->with('error', 'দুঃখিত, পরিচালক পাওয়া যায়নি।');
        }

        // Check if a new image is being uploaded
        if ($request->hasFile('image')) {
            // Handle image upload here
            $image_path = $request->file('image')->store('directors', 'public');

            // Delete the old image (optional, if needed)
            Storage::disk('public')->delete($director->image);
        } else {
            $image_path = $director->image;
        }

        // Update the other fields
        $director->name = $request->input('name');
        $director->email = $request->input('email');
        $director->phone = $request->input('phone');
        $director->designation = $request->input('designation');
        $director->biodata = $request->input('biodata');
        $director->speech = $request->input('speech');
        $director->subject = $request->input('subject');
        $director->image =   $image_path;
        $director->d_c_id = $request->input('d_c_id');

        // Save the updated director
        $director->save();

        return redirect()->route('directors.index')->with('success', 'সফলভাবে, পরিচালক আপডেট করা হয়েছে।');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->_body;
        $data = Directors::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);;
    }
}
