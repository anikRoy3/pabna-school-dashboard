<?php

namespace App\Http\Controllers;

use App\Models\SchoolActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = new  SchoolActivities;
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

        return view('admin.schoolActivities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schoolActivities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'status' => 'boolean',
            'category' => 'required',
            'long_description' => 'string',
        ]);

        // Create a new record in the database
        $activity = new SchoolActivities();
        $activity->title = $request->input('title');
        $activity->long_description = $request->input('long_description');
        $activity->status = $request->input('status');
        $activity->category = $request->input('category');

        // Store the uploaded images and save their paths in the "images" column as JSON
        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('schoolActivities', 'public');
                $imagePaths[] = $path;
            }

            $activity->images = json_encode($imagePaths);
        }

        $activity->save();

        // Redirect or return a response as needed
        return redirect()->route('schoolActivities.index')->with('success', 'Activity created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**              
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SchoolActivities::find($id);
        return view('admin.schoolActivities.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = SchoolActivities::find($id);
        if (!$activity) {
            return redirect()->route('directors.index')->with('error', 'দুঃখিত, কার্যক্রম পাওয়া যায়নি।');
        }

        // Decode the JSON string into an array
        $existingImages = json_decode($activity->images);

        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('schoolActivities', 'public');
                $imagePaths[] = $path;
            }

            // Delete existing images
            foreach ($existingImages as $image) {
                Storage::disk('public')->delete($image);
            }

            // Encode the array back to JSON
            $all_images = json_encode($imagePaths);
        } else {
            $all_images = $activity->images;
        }

        $activity->title = $request->input('title');
        $activity->long_description = $request->input('long_description');
        $activity->images = $all_images;
        $activity->status = $request->input('status');
        $activity->category = $request->input('category');

        $activity->save();

        return redirect()->route('schoolActivities.index')->with('success', 'সফলভাবে, কার্যক্রম আপডেট করা হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id= $request->_body;
        $data = SchoolActivities::find($id);
        if($data->image){
                Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);;
    }
}
