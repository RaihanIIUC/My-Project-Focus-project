<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Http\Controllers\Controller;

class SchoolSubjectController extends Controller
{
  public function ViewSubject()
  {
    $data['allData'] = SchoolSubject::all();
    return view('backend.setup.school_subject.view_school_subject', $data);
  }
  public function SujectAdd()
  {
    return view('backend.setup.school_subject.add_school_subejct');
  }


  public function SubejctStore(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required | unique :school_subjects,name',
    ]);


    $data = new SchoolSubject();
    $data->name = $request->name;
    $data->save();


    $notifiaction = array(
      'message' => 'School Subject Inserted  and You win!! !!',
      'alert-type' => 'success'
    );

    return redirect()->route('school.subject.view')->with($notifiaction);
  }


  public function SubjectEdit($id)
  {
    $editData = SchoolSubject::find($id);
    return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
  }

  public function SubjectUpdate(Request $request, $id)
  {
    $data = SchoolSubject::find($id);

    $validatedData = $request->validate([
      'name' => 'required | unique :school_subjects,name,' . $data->id,
    ]);



    $data->name = $request->name;
    $data->save();


    $notifiaction = array(
      'message' => 'School Subject Updated and You win!! !!',
      'alert-type' => 'success'
    );

    return redirect()->route('School.subject.view')->with($notifiaction);
  }

  public function SubjectDelete( $id ){
    $user = SchoolSubject::find($id);
    $user->delete();



    $notifiaction = array(
      'message' => 'Suject Deleted  and You win!! !!',
      'alert-type' => 'info'
    );

    return redirect()->route('school.subject.view')->with($notifiaction);

 
  }

 
}
