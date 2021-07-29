<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\StudentGroup;



class StudentGroupController extends Controller
{
    public function ViewGroup(){
     $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);

    }

    public function StudentAddGroup(){
                       return view('backend.setup.group.add_group');
    }

   public function StudentGroupStore(Request $request){
                   $validatedData = $request->validate([
           'name' => 'required | unique :student_groups,name',
      ]);


      $data = new StudentGroup();
      $data->name = $request->name;
      $data->save();


       $notifiaction = array(
         'message' => 'Student Group Inserted  and You win!! !!',
         'alert-type'=>'success'
       );

      return redirect()->route('student.group.view')->with($notifiaction);

    }


    public function StudentGroupEdit($id){

               $editData = StudentGroup::find($id);
         return view('backend.setup.group.edit_group',compact('editData'));

    }

    public function StudentGroupUpdate(Request $request,$id){

       $data =  StudentGroup::find($id);

                    $validatedData = $request->validate([
           'name' => 'required | unique :student_groups,name,'.$data->id,
      ]);



      $data->name = $request->name;
      $data->save();


       $notifiaction = array(
         'message' => 'Student Group Updated  and You win!! !!',
         'alert-type'=>'success'
       );

      return redirect()->route('student.group.view')->with($notifiaction);

    }
    public function StudentGroupDelete($id){
              $user = StudentGroup::find($id);
        $user->delete();



       $notifiaction = array(
         'message' => 'Student Group Deleted  and You win!! !!',
         'alert-type'=>'info'
       );

      return redirect()->route('student.group.view')->with($notifiaction);

    }
}
