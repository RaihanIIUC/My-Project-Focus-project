<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\FeeCategoryAmount;
use App\Http\Controllers\Controller;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject()
    {
         $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();

        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }


   public function AssignSujectAdd(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject', $data);


   }

   public function AssignSubejctStore(Request $request){

          $subjectCount = count($request->subject_id);

          if ($subjectCount != NULL) {
               for ($i = 0; $i < $subjectCount ; $i++) {
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark	 = $request->subjective_mark[$i];
                    $assign_subject->save();
               }
          }
          $notifiaction = array(
               'message' => 'Subject Assigned  Inserted  and You win!! !!',
               'alert-type' => 'success'
          );

          return redirect()->route('assign.subject.view')->with($notifiaction);
  
   }

   public function EditAssignSubject( $class_id ){
          $data['editData'] = AssignSubject::where('class_id', $class_id)
               ->orderBy('subject_id', 'asc')->get();


          $data['subjects'] = SchoolSubject::all();
          $data['classes'] = StudentClass::all();
          return view('backend.setup.assign_subject.edit_assign_subject', $data);

 

   }

   public function UpdateAssignSubject(Request $request, $class_id){
          if ($request->subject_id == NULL) {
               $notifiaction = array(
                    'message' => 'Sorry you forget about form!!! !!',
                    'alert-type' => 'error'
               );
               return redirect()->route('assign.subject.edit',$class_id)->with($notifiaction);
          } else {
               $subjectCount = count($request->subject_id);


               AssignSubject::where('class_id', $class_id)->delete();

            if($subjectCount != NULL )
               for ($i = 0; $i < $subjectCount; $i++) {
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                     $assign_subject->save();
               }
          }
          $notifiaction = array(
               'message' => 'Assign Subject Updated  and You win!! !!',
               'alert-type' => 'success'
          );

          return redirect()->route('assign.subject.view')->with($notifiaction);


   }

     public function DetailAssignSubject($class_id)
     {
          $data['detailsData'] = AssignSubject::where('class_id', $class_id)
               ->orderBy('subject_id', 'asc')->get();

          return view('backend.setup.assign_subject.details_assign_subject', $data);

     }

}
