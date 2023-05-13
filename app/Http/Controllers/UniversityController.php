<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function uniDashboard(){
        return view('university/dashboard');
    }

    public function create(Request $request){
        
        // $user= Auth::users();
        $uni= new University;

        $uni->email= auth()->user()->email;
        
        $uni->uniname= $request->uniname;
        $uni->contact= $request->contact;
        $uni->address= $request->address;

        $uni->save();
        return redirect('/university/dashboard',);
    }
    public function read(){
        $email= auth()->user()->email;
        
        $uni = University::find($email);
        
        return view('/university/dashboard')->with(['uni'=> $uni]);
    }
    public function loadupdate(){
        $email= auth()->user()->email;
        $uni = University::find($email);
        

        return view('/university/updateprofile')->with(['uni'=> $uni]);
    }
    
    public function update(Request $request){
        $email= auth()->user()->email;
        $uni = University::find($email);    // Find the Student based on Primary Key

        $uni->uniname= $request->uniname;
        $uni->contact= $request->contact;
        $uni->address= $request->address;
        
        $uni->save();        
        return redirect('/university/dashboard');
    }
    public function delete(Request $request)
    {
        $email= auth()->user()->email;

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        University::find($email)->delete();    // Find the Student based on Primary Key

        User::where('email',$email)->delete();

        return redirect('/');

    }
}
