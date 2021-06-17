<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return  view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return  view('admin.users.create', compact('roles'));
    }

//    public function form(){
//        return  view('admin.users.form');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function imageupload($request){

        if ($request->hasFile('profile_image')) {
            //main file name is here
            $quotenameWithExt = $request->file('profile_image')->getClientOriginalName();

            //main file extension is here
            $filenamewithextension = $request->file('profile_image')->getClientOriginalExtension();

            //orginial file name is here
            $filename = pathinfo($quotenameWithExt, PATHINFO_FILENAME);

            //file name slug version is here
            $slugName = Str::slug($request->name);
            $orginialFileName = $slugName.'-'.uniqid().'.'.$filenamewithextension;
            Storage::put('public/users/'. $orginialFileName, fopen($request->file('profile_image'), 'r+'));
            //Resize image here
            $thumbnailpath = public_path('storage/users/'.$orginialFileName);
            $img = Image::make($thumbnailpath)->resize(140, 140);
            $img->save($thumbnailpath);
            return $orginialFileName;
        }
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:50|min:2',
            'email' => 'required|unique:users','password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'profile_image' => 'mimes:jpeg,jpg,png,gif',
            'role' => 'required',
        ]);
        if ($validate->fails()){
            return back()->with('toast_warning', $validate->messages()->all()[0])->withInput();
        }

        $fileName = $this->imageupload($request);
        User::create([
           'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'details' => $request->details,
            'profile_image' => $fileName,
            'status' => $request->filled('status'),
        ])->roles()->sync($request->input('role'),[]);
        return redirect(route('app.user.index'))->with('toast_success', 'User Saved Successfully Done...');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return  view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('toast_success', 'User Saved Successfully Done...');
    }
}
