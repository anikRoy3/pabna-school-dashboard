<?php

namespace App\Http\Controllers;

use App\Http\Resources\DirectorsCategoryResource;
use Illuminate\Http\Request;
use App\Models\DirectorsCategory;


class DirectorsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new DirectorsCategory();


        if (request()->wantsJson()) {
            $data = $data->get();
            if ($data) {
                return response([
                    'status' => true,
                    'message' => 'Data Show Successfully',
                    'code' => 200,
                    'data' => DirectorsCategoryResource::collection($data),
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

        $data = $data->all();
        return view("admin.DirectorsCategory.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request, $id)
    {
        // $data = $dc;
        // $data=DB::table('directors_categories')->where('id', $id);
        $DC = new DirectorsCategory();
        $data = $DC->find($id);
        return view('admin.DirectorsCategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:directors_category|max:255',
        ]);
        $DC = new DirectorsCategory();
        $data = $DC->find($id);
        $update=$data->update([
            "name"=> $validated["name"],
        ]);
        if (!$update) {
            return redirect()->back()->with('error', 'দুঃখিত, ক্যাটাগরির আপডেট করার একটি সমস্যা ছিল।');
        }

        return redirect()->route('directors_categories.index')->with('success', 'ক্যাটাগরিটি সফলভাবে আপডেট করা হয়েছে।');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
