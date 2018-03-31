<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use Image;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function welcome(){
       return view ('welcome');
}
    public function postSignUp(Request $request){

        $this->validate($request, [
            'email'=>'required|email|unique:users',
            'first_name'=>'required|max:120',
            'password'=>'required|min:4'
             ]);
    	$email=$request['email'];
    	$first_name=$request['first_name'];
    	$password=bcrypt($request['password']);

    	$user= new User;
    	$user->email=$email;
    	$user->password=$password;
    	$user->first_name=$first_name;
    	Auth::login($user,true);

    	$user->save();

    	return redirect()->route('post.index');

    }
    public function postSignIn(Request $request){

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
            ]);

    	if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
    		return redirect()->route('post.index');
    	}
    	return redirect()->back();


    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }

    public function profile()
    {
        $user=Auth::user();
        $photo=Photo::orderBy('created_at','desc')->limit(1)->get();
        $album=Photo::orderBy('created_at','desc')->get();
        return view('profile')->with('user',$user)->with('photo',$photo)->with('album',$album);
    }

    public function image(Request $request)
    {
       $this->validate($request,[
            
            'avatar'=>'image|max:4999'

        ]);

        $fileNameWithExt=$request->file('avatar')->getClientOriginalName();

        $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        // get extension
        $extension=$request->file('avatar')->getClientOriginalExtension();
        // create new file name
        $fileNameTOStore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('avatar')->storeAs('public/album_covers', $fileNameTOStore);
        $user= new Photo;
        $user->avatar=$fileNameTOStore;
        $user->user_id=Auth::user()->id;
         if ($request->user()->photos()->save($user)) {
            $message='Photo Uploaded sucessfully';
        }
       
        return redirect()->route('profile');
    }

    public function destroy($id)
    {
        $photo=Photo::find($id);
        $photo->delete();
        return redirect()->route('profile');
    }

   

}
