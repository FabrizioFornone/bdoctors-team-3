<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Info;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::where("user_id", Auth::user()->id)->get();

        $boolean = false;


        if (count($infos) == 0) {

            $boolean = true;
        }

        $users = User::where("id", Auth::user()->id)->get();


        return view('admin.infos.index', compact('infos', 'users', 'boolean'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where("id", Auth::user()->id)->get();
        $specializations = Specialization::all();

        return view('admin.infos.create', compact('users', 'specializations'));
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
            'CV' => 'nullable|file|max:500',
            'photo' => 'nullable|max:10000',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:11|numeric',
            'performances' => 'nullable',
            'specializations' => 'required'
        ]);


        $info = new Info();
        $info->fill($data);
        $info->user_id = Auth::user()->id;

        if (key_exists('photo', $data)) {
            $photo = Storage::put('files', $data['photo']);
            $info->photo = $photo;
        }



        if (key_exists('CV', $data)) {
            $CV = Storage::put('files', $data['CV']);
            $info->CV = $CV;
        }


        $info->save();

        if (key_exists('specializations', $data)) {
            $info->specializations()->attach($data['specializations']);
        }

        return redirect()->route('admin.infos.index');
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
    public function edit(Info $info)
    {
        $users = User::where("id", Auth::user()->id)->get();
        $specializations = Specialization::all();

        return view('admin.infos.edit', compact('info', 'users', 'specializations'));
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
        $dataUser = $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'business_address' => 'nullable|min:5'
        ]);

        $users = User::findOrFail($id);

        $users->update($dataUser);

        $dataInfo = $request->validate([
            'CV' => 'nullable|file|max:500',
            'photo' => 'nullable|max:10000',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:11|numeric',
            'performances' => 'nullable',
            'specializations' => 'required|exists:specializations,id'
        ]);

        $info = Info::findOrFail($id);

        $info->update($dataInfo);

        if (key_exists('CV', $dataInfo)) {

            if ($info->CV) {
                Storage::delete($info->CV);
            }

            $userCv = Storage::put('files', $dataInfo['CV']);

            $info->CV = $userCv;
            $info->save();
        }

        if (key_exists('photo', $dataInfo)) {

            if ($info->photo) {
                Storage::delete($info->photo);
            }

            $userPhoto = Storage::put('files', $dataInfo['photo']);

            $info->photo = $userPhoto;
            $info->save();
        }


        if (key_exists('specializations', $dataInfo)) {
            $info->specializations()->sync($dataInfo['specializations']);
        } else {
            $info->specializations()->detach();
        }

        return redirect()->route('admin.infos.index', $id);
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
