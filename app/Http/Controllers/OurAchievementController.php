<?php

namespace App\Http\Controllers;

use App\Models\OurAchievement;
use App\Models\SchoolActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievement = new OurAchievement();
        $data = $achievement->all();
        return view("admin.ourAchievement.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.ourAchievement.create');
        //
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
        ]);

        // Create a new record in the database
        $achievement = new OurAchievement();
        $achievement->title = $request->input('title');
        $achievement->status = $request->input('status');

        // Store the uploaded images and save their paths in the "images" column as JSON
        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('ourAchievements', 'public');
                $imagePaths[] = $path;
            }

            $achievement->images = json_encode($imagePaths);
        }

        $achievement->save();

        // Redirect or return a response as needed
        return redirect()->route('ourAchievement.index')->with('success', 'Achievement created successfully');
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
        $data = OurAchievement::find($id);
        return view('admin.ourAchievement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $achievement = OurAchievement::find($id);
        if (!$achievement) {
            return redirect()->route('achievement.index')->with('error', 'দুঃখিত, কার্যক্রম পাওয়া যায়নি।');
        }

        // Decode the JSON string into an array
        $existingImages = json_decode($achievement->images);

        if ($request->hasFile('images')) {
            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('ourAchievements', 'public');
                $imagePaths[] = $path;
            }

            // Delete existing images
            foreach ($existingImages as $image) {
                Storage::disk('public')->delete($image);
            }

            // Encode the array back to JSON
            $all_images = json_encode($imagePaths);
        } else {
            $all_images = $achievement->images;
        }

        $achievement->title = $request->input('title');
        $achievement->images = $all_images;
        $achievement->status = $request->input('status');

        $achievement->save();

        return redirect()->route('ourAchievement.index')->with('success', 'সফলভাবে, কার্যক্রম আপডেট করা হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id= $request->_body;
        $data = OurAchievement::find($id);
        if($data->image){
                Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);;    }
}
