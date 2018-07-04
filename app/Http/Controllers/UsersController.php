<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;
use Session;
use Auth;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);
            
        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'avatars/doctor_image.jpg'
        ]);
        Session::flash('success','User created');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.users.update')->with('user',Auth::user());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'youtube' => 'required|url'
        ]);

        $user = Auth::user();
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_identical_name = time().$avatar->getClientOriginalName();
            $avatar->move('avatars/',$avatar_identical_name);
            $user->profile->avatar = 'avatars/' . $avatar_identical_name;
        }

        if($request->has('password') && $request->password != null){
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->update();
        $user->profile->update();

        Session::flash('success','Profile updated');
        return redirect()->back();
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


    public function admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->update();

        Session::flash('success','Upgraded user successfuly');
        return redirect()->back();
    }


    public function not_admin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->update();

        Session::flash('success','Downgraded user successfuly');
        return redirect()->back();
    }
}
