<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        return view('settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_name' => 'required|string',
            'school_logo' => 'required|file',
            'EIIN_no' => 'required|string',
            'college_code' => 'required|integer',
            'school_code' => 'required|integer',
            'email_1' => 'required|email',
            'mobile_number_1' => 'required|string'
        ]);
        if($request->hasFile('school_logo')){
            $image_path = $request->file('school_logo')->store('settings', 'public');
        }
        $validatedData['school_logo']= $image_path;
        unset($validatedData['email_1']);

        if ($request->email_2 != null) {
            $emailArray = array($request->email_1, $request->email_2);
        } else {
            $emailArray = array($request->email_1);
        }
        
        $validatedData['emails'] = json_encode($emailArray);
        
        unset($validatedData['mobile_number_1']);
        
        if ($request->mobile_number_2 != null) {
            $mobileArray = array($request->mobile_number_1, $request->mobile_number_2);
        } else {
            $mobileArray = array($request->mobile_number_1);
        }
        
        $validatedData['mobile_numbers'] = json_encode($mobileArray);
        // dd($validatedData);      
        $setting = new Setting($validatedData);
        $setting->save();
        return redirect()->route('settings.index')->with('success', 'Setting created successfully');
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
        $data = Setting::find($id);
        return view('settings.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_name' => 'required|string',
            // 'school_logo' => 'nullable|file',
            'EIIN_no' => 'required|string',
            'college_code' => 'required|integer',
            'school_code' => 'required|integer',
            'email_1' => 'required|email',
            'mobile_number_1' => 'required|string'
        ]);
        
        // dd($request->all());
       
    
        // Find the existing record by ID
        $setting = Setting::findOrFail($id);
   
        // Update the existing record with the new data
        $setting->school_name = $validatedData['school_name'];
        $setting->EIIN_no = $validatedData['EIIN_no'];
        $setting->college_code = $validatedData['college_code'];
        $setting->school_code = $validatedData['school_code'];
        $setting->email_1 = $validatedData['email_1'];
        $setting->mobile_number_1 = $validatedData['mobile_number_1'];
    
        // Check if a new school logo is provided
        if ($request->hasFile('school_logo')) {
            // Store the new school logo and update the path
            $image_path = $request->file('school_logo')->store('settings', 'public');
        }else{
            $image_path = $setting->school_logo;
        }
        
        $setting->school_logo = $image_path;
        // dd($setting);
        unset($setting['mobile_number_1']);
        unset($setting['email_1']);

        // Update emails and mobile numbers
        $emailArray = ($request->email_2 != null) ? [$request->email_1, $request->email_2] : [$request->email_1];
        $setting->emails = json_encode($emailArray);
    
        $mobileArray = ($request->mobile_number_2 != null) ? [$request->mobile_number_1, $request->mobile_number_2] : [$request->mobile_number_1];
        $setting->mobile_numbers = json_encode($mobileArray);
    
        // Save the updated record
        $setting->save();
    
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully');
    }        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
