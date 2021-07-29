<?php

namespace App\Http\Controllers\Backend\Setup;
 use App\Models\StudentClass;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }

    public function StudentClassAdd(){
       return view('backend.setup.student_class.add_class');

    }

    public function StudentClassStore(Request $request){
               $validatedData = $request->validate([
           'name' => 'required | unique :student_classes,name',
      ]);


      $data = new StudentClass();
      $data->name = $request->name;
      $data->save();


       $notifiaction = array(
         'message' => 'Student Class Inserted  and You win!! !!',
         'alert-type'=>'success'
       );

      return redirect()->route('student.class.view')->with($notifiaction);


    }

    public function StudentClassEdit($id){
        $editData = StudentClass::find($id);
         return view('backend.setup.student_class.edit_class',compact('editData'));
    }

    public function StudentClassUpdate(Request $request,$id){

       $data =  StudentClass::find($id);

                    $validatedData = $request->validate([
           'name' => 'required | unique :student_classes,name,'.$data->id,
      ]);



      $data->name = $request->name;
      $data->save();


       $notifiaction = array(
         'message' => 'Student Class Updated  and You win!! !!',
         'alert-type'=>'success'
       );

      return redirect()->route('student.class.view')->with($notifiaction);


    }

    public function StudentClassDelete($id){

        $user = StudentClass::find($id);
        $user->delete();



       $notifiaction = array(
         'message' => 'Student Class Deleted  and You win!! !!',
         'alert-type'=>'info'
       );

      return redirect()->route('student.class.view')->with($notifiaction);

    }
}
