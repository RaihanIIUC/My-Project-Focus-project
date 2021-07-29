<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function UserView(){

    $allData =   User::all();
    return view('backend.user.view_user', compact('allData'));


    // $data['allData'] = User::all();
    // return view('backend.user.view_user',$data);

   }

   public function UserAdd(){
       return view('backend.user.add_user');
   }

   public function UserStore(Request $request){
      $validatedData = $request->validate([
          'email' => 'required | unique:users',
          'name' => 'required',
      ]);


      $data = new User();
      $data->usertype = $request->usertype;
      $data->email = $request->email;
      $data->name = $request->name;
      $data->password = bcrypt($request->password);
      $data->save();

       $notifiaction = array(
         'message' => 'User Inserted !!',
         'alert-type'=>'success'
       );

      return redirect()->route('user.view')->with($notifiaction);



   }


   public function UserEdit($id){

     $editData = User::find($id);
     return view('backend.user.edit_user',compact('editData'));


   }

   public function UserUpdate(Request $request,$id){
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->email = $request->email;
        $data->name = $request->name;
        $data->password = bcrypt($request->password);
        $data->save();

        $notifiaction = array(
            'message' => 'User Updated !!',
            'alert-type' => 'error'
        );

        return redirect()->route('user.view')->with($notifiaction);



   }



   public function UserDelete($id){
       $user = User::find($id);

       $user->delete();

         $notifiaction = array(
            'message' => 'User Deleted !!',
            'alert-type' => 'info'
        );


        return redirect()->route('user.view')->with($notifiaction);

   }
}
