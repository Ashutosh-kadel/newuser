<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Mail; 
use App\Mail\RegisterMail;
class AdminController extends Controller
{
    //
    
    public function index()
    {
        $users = User::where('type', 'user')->get();
        $active = $users->where('status','1')->count();
        $total = $users->count();
        $inactive = $users->where('status','0')->count();
        // dd($active);
        return view('admin/dashboard', compact('users','active','inactive','total'));
    }
    public function changeStatus(Request $request)
    {   
        $status = $request->status==1?0:1;
        $users = User::where('id',$request->id)->update(['status'=>$status]);
        
        if($users){
            return redirect()->back()->with('success','Satus change successfully!');
        }else{
            return redirect()->back()->with('error','Satus cannot change successfully!');
        }
    }
    public function viewUser(Request $request)
    {
        $users = User::where('id', $request->id)->first();

        return view('admin/viewUser', compact('users'));
    }
    // 9413016872 8769999700
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $userdata = [
            'name'=>$request->name,
            'email'=>$request->email,
           'password'=>$request->password,
        ];
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);
        if($user){
            Mail::to($request->email)->send(new RegisterMail($userdata));
 
            if (Mail::failures()) {
                return redirect()->back()->with('error','Sorry! Please try again latter');
            }else{
                return redirect()->back()->with('success','Great! Successfully send in your mail');
                }
            // return redirect()->back()->with('success','User registered successfully!');
        }else{
            return redirect()->back()->with('error','Satus cannot change successfully!');
        }
        // return redirect(RouteServiceProvider::HOME);
    }
}
