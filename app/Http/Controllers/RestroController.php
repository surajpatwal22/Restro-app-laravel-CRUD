<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;



class RestroController extends Controller
{
   public function index()
   {
      return view("home");
   }
   public function list(Request $request)
   {

      if($request->search_val){
         $data = Restaurant::where('name','like','%'.$request->search_val.'%')->paginate(10);  
         return view("list", ["data" => $data]);
      }else{
         $data = Restaurant::all();  
      return view("list", ["data" => $data]);
      }
      
   }

   public function add(Request $request)
   {
      // return $request->input();
      $resto = new Restaurant;
      $resto->name = $request->input('name');
      $resto->email = $request->input('email');
      $resto->address = $request->input('address');
      $resto->save();

      return redirect('/list')->with('status', 'Data added successfully!');
      // $request->flash('status','Data added successfully!');
      ;
   }

   public function remove($id)
   {
      $resto = Restaurant::find($id);

      if ($resto) {
         $resto->delete();
         return redirect('/list')->with('status', 'Data deleted successfully!');
      } else {
         return redirect('/list')->with('status', 'Record not found!');
      }
   }


   public function update(Request $request){
      $resto = Restaurant::find($request->input('id'));
      if ($resto) {
          $resto->name = $request->input('name');
          $resto->email = $request->input('email');
          $resto->address = $request->input('address');
          $resto->save();
  
          return redirect('/list')->with('status', 'Data updated successfully!');
      } else {
          return redirect('/list')->with('status', 'Error: Restaurant not found!');
      }
  }

  public function signup(Request $request){
  
  $user = new User;
  $user->name = $request->input('name');
  $user->email = $request->input('email');
  $user->password = Crypt::encrypt($request->input('password'));
  $user->contact = $request->input('contact');
  $user->save();

  return redirect('/login')->with('status','User registered Successfully! Please Login to Continue.');
}

public function login (Request $request){
   $user = User::where('email',$request->input('email'))->first();

   if($user){
      // echo $user->password;
      // echo Crypt::decrypt($user->password);
      // echo  "<br>";
      // echo $request->input('password');
      if(Crypt::decrypt($user->password)==$request->input('password'))
      {
         session(['loggedin' => true, 'name' => $user->name]);
         return redirect('/')->with('loggedin','logged in succesfully.');;
      }else{
        return redirect('/login')->with('status','Wrong Password! Try again.');
      }
      }else
      {
         return redirect('/login')->with('status','Email does not exist! Try again.');
      }
   
 
 }
  // if($data){
   //   if(Crypt::decrypt($data->password)===$request->input('password')){
   //     session(['loggedin'=>true,'name'=>$data->name]);
   //     return redirect('/');
   //   }else{
   //     return back()->with('error','Invalid Password! Try Again.');
   //   }
   // }else{
   //   return back()->with('error','Email does not exist! Try again.');
   // }
}