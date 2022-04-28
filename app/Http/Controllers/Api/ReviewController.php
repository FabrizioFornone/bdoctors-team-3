<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'text' => 'required|string',
            'vote' => 'required|numeric|between:1,5',
            'user_id' => 'required',
        ]);
        $review = new Review();
        $review->fill($data);
        $review->save();
        return response()->json($review);
    }
}
