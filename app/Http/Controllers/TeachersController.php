<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = new Teachers();
        $data = $teachers->all();

        if (request()->wantsJson()) {
            $data = $teachers->get();
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
        return view("admin.teachers.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('teachers', 'public');
            $teacher = Teachers::create([
                "name" => $request->input('name'),
                "email" => $request->input('email'),
                "phone" => $request->input('phone'),
                "image" => $image_path,
                "designation" => $request->input('designation'),
                "section" => $request->input("section"),
                "lastDegree" => $request->input("lastDegree"),
                "status" => $request->input("status"),

            ]);
        }
        if (!$teacher) {
            return redirect()->back()->with('error', 'দুঃখিত, শিক্ষক তৈরি করার সময় একটি সমস্যা হয়েছে৷');
        }

        return redirect()->route('teachers.index')->with('success', 'সফলভাবে, শিক্ষক তৈরি করা হয়েছে।');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = Teachers::find($id);
        return view('admin.teachers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the director you want to update
        $teacher = Teachers::find($id);

        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'দুঃখিত, শিক্ষক পাওয়া যায়নি।');
        }

        // Check if a new image is being uploaded
        if ($request->hasFile('image')) {
            // Handle image upload here
            $image_path = $request->file('image')->store('teachers', 'public');

            // Delete the old image (optional, if needed)
            Storage::disk('public')->delete($teacher->image);
        } else {
            $image_path = $teacher->image;
        }

        // Update the other fields
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->phone = $request->input('phone');
        $teacher->designation = $request->input('designation');
        $teacher->image =   $image_path;
        $teacher->section = $request->input('section');
        $teacher->lastDegree = $request->input('lastDegree');
        // Save the updated teacher
        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'সফলভাবে, শিক্ষক আপডেট করা হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->_body;
        $data = Teachers::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        $data->delete();
        return response()->json([
            'success' => true
        ]);;
    }
}
