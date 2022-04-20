<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index() {
        $infos = Info::all();

        $infos->load("user", "specialization");

        return response()->json($infos);
    }
}
