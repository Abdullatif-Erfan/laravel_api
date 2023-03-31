<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// I want to get the date from Student model
use App\Models\Student;

class StudentController extends Controller
{
    public function welcome()
    {
        return view('welcome'); 
    }
    public function student_add_form()
    {
        return view('student/student_add_form');
    }
    public function student_list()
    {
        $data = student::all();
        return view('student/student_list',compact('data'));
    }
    public function student_add(Request $request)  
    {
        /**
         * create an object from student table
         * put form data into student object 
         */
        $studentObj = new student; 
        $studentObj->name = $request->name;
        $studentObj->email = $request->email;
        $studentObj->save();

        $image = $request->file;
        if($image)
        {
            $unique_image_name = time().'.'.$image->getClientOriginalExtension();
            // move and store image into public/images directory
            $request->file->move('images',$unique_image_name);
            $studentObj->image=$unique_image_name;
        }
        $studentObj->save();
       //  return redirect()->route('student_list');
    return redirect()->action('StudentController@student_list');
    }
   
    public function student_delete($id)
    {
        $foundRecord = student::find($id);
        $foundRecord->delete();
        return redirect()->back();
    }
    public function student_search(Request $request)
    {
        $searchedKeyWord = $request->searchByNameOrEmail;
        $data =  student::where('name','Like','%'.$searchedKeyWord.'%')
        ->orWhere('email','Like','%'.$searchedKeyWord.'%')->get();
        return view('student/student_list', compact('data'));
    }
    public function student_update_form($id)
    {
        $data = student::find($id);
        return view('student/student_update_form', compact('data'));
    }
    public function student_update(Request $request, $id)
    {
       $student = student::find($id);
       $student->name = $request->name;
       $student->email = $request->email;

       $image = $request->file;
       if($image)
       {
           $unique_image_name = time().".".$image->getClientOriginalExtension();
           $request->file->move('images',$unique_image_name);
           $student->image = $unique_image_name;
       }
       $student->save();
       return redirect()->action('StudentController@student_list');
    }
}
