<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Info;
use App\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $specializations = Specialization::all();

    //     return response()->json($specializations);
    // }

    public function index(Request $request)
    {
        $filter = $request->input("filter");

        $specializations = Specialization::join('info_specialization', 'info_specialization.specialization_id', '=', 'specializations.id')
            ->join('infos', 'info_specialization.info_id', '=', 'infos.id')
            ->join('users', 'infos.user_id', '=', 'users.id')
            ->where("specializations.specialization_name", "LIKE", "%$filter%")
            ->get();

        $specializations->each(function ($specialization) {
            if ($specialization->photo) {
                $specialization->photo = asset("storage/" . $specialization->photo);
            } else {
                $specialization->photo = "https://via.placeholder.com/1024x480";
            }
        });

        // tentativo di filtro avanzato per città

        // $advancedFilter = $specializations->where("infos.city", "LIKE", "Torino")->get();


        // compact con 2 variabili

        return response()->json(compact('specializations', 'advancedFilter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::where("id", $id)
            ->with(["user", "specializations"])
            ->first();

        if (!$info) {
            abort(404);
        };

        if ($info->photo) {
            $info->photo = asset("storage/" . $info->photo);
        } else {
            $info->photo = "https://via.placeholder.com/1024x480";
        };

        return response()->json($info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
