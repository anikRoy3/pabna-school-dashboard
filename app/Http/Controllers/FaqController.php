<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class FAQController extends Controller
{
    public function index()
    {
        // return 'hello';
    }

    public function store(Request $request)
    {

        try {
            $validatedData = $request->validate([
                "name" => "required",
                "phone" => "required",
                'question' => "required",
            ]);

            $faq = FAQ::create($validatedData);

            return response()->json(['message' => 'FAQ entry created successfully', 'data'=>$faq]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}