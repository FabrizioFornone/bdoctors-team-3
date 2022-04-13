<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Info;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where("id", Auth::user()->id)->get();

        return view('admin.infos.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'CV' => 'nullable|file|max:500',
            'photo' => 'nullable|image|max:500',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:11|numeric'
        ]);

        $info = new Info();
        $info->fill($data);

        $info->user_id = Auth::user()->id;

        $info->save();

        return redirect()->route('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::all();

        return view('', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Info::findOrFail('id');
        $specialization = Specialization::all();

        return view('', compact('info', 'specialization'));
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
        $data = $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'CV' => 'nullable|file|max:500',
            'photo' => 'nullable|image|max:500',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:11|numeric'
        ]);

        $info = Info::findOrFail($id);

        $info->update($data);

        return redirect()->route('', $id);
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
