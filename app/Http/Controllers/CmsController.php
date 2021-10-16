<?php

namespace App\Http\Controllers;
use App\Models\Login;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CmsController extends Controller
{
    public function DashBoard()
    {
      $pictures=Photo::all();
      return view("dashboard",compact('pictures',$pictures));
    }
    public function login()
    {
      return view('login');
    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|min:6'
        ]);

        $adminU=Login::where('email','=',$request->email)->first();

        if($adminU){

            if (Hash::check($request->password,$adminU->password)){
                return redirect()->route('admin');
            }else{
                return back()->with('fail','password is false');
            }
        }else{
            return back()->with('fail','email is false');
        }
    }

    public function signUp()
    {
        return view('signup');
    }

    public function postSignUp(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:Logins',
            'password' => 'required|min:6',
            'Cpassword'=>'required',
        ]);
        if($request->password == $request->Cpassword) {
            $user = new Login();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =hash::make( $request->password);
            $user->Cpassword =hash::make( $request->password);
            $user->save();
            return view('login')->with('success','your successfully registered');
        }else{
            return view('signup')->with('fail','Something went wrong,try again later');
        }

    }

    public function Admin()
    {
        $photos=Photo::all();
        return view('admin',compact('photos',$photos));
    }


    public function imageUpload(Request $request)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->images->extension();
        $path=$request->images->move(public_path('images'), $imageName);
        $photo=new Photo;
        $photo->image=$imageName;
        $photo->title=$request->title;
        $photo->save();

        return back()
            ->with('success','You have successfully upload image.');
    }

    public function Edit($id)
    {
        $details=Photo::find($id);
        return view('edit')->with('details',$details);
    }
    public function update(Request $request,$id)
    {
         $file=$request->file('images');
        if($file==null){
         $imageName = $request->oldImages;
         $photo=Photo::where('id',$id)->first();
        }else {
            $oldPath=public_path('images').'/'.$request->oldImages;
            if($oldPath){
                unlink($oldPath);
            }else{
                print_r('failed');
            }
            $imageName = time() . '.' . $request->file('images')->extension();
            $path=$request->images->move(public_path('images'), $imageName);
            $photo=Photo::where('id','=',$id)->first();
        }
        $photo->image=$imageName;
        $photo->title=$request->title;
        $photo->update();
        return redirect()->route('admin');
    }
}
