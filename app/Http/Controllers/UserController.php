<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDetails(Request $request)
    {   
       $user_id = Auth::id();//dd($request);
       $username = $request->username;
       $useremail = $request->useremail;
        $validated =  $request->validate([
                'username' => 'required',
                'useremail' => 'required|email',
            ]);
        $data =  User::where('id',$user_id)->update(['name'=>$username,'email'=>$useremail]);
       // dd($data);
        if($data){
            return redirect()->back()->with('success','Details updated successfully!');
        }else{
            return redirect()->back()->with('error','Error in updating');
        }
    }
    public function updatePassword(Request $request)
    {   
       $user_id = Auth::id();
        $validated =  $request->validate([
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);
        $data =  User::where('id',$user_id)->update(['password'=>Hash::make($request->password)]);
       // dd($data);
        if($data){
            return redirect()->back()->with('success','Details updated successfully!');
        }else{
            return redirect()->back()->with('error','Error in updating');
        }
    }
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
        //
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
