<?php


namespace App\Http\Controllers;

// ------------ Reusable Controller ------------------
class PrintReportController extends Controller
{
    public static function getPrintReport($code, $message)
    {
        $returnData = array(
            'status' => $code,
            'message' => $message
        );
        return response()->json($returnData, 500);
        // return $message;
    }
}
use App\Http\Controllers\PrintReportController;
// ------------ End of reusable Controller ------------------


use Illuminate\Http\Request;
use Exception;
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
        // $data = student::all();
        // return view('student/student_list',compact('data'));

        //  --------------- ONLINE API -----------------
        $users = json_decode(student::all());
        return response()->json($users);
        // http://127.0.0.1:8000/student_list
        // [
        //     {
        //       "id": 3,
        //       "name": "test1",
        //       "email": "test1@gmail.com",
        //       "image": "1680265705.PNG",
        //       "created_at": "2023-03-31 05:38:31",
        //       "updated_at": "2023-03-31 12:28:25"
        //     },
        //     {
        //       "id": 4,
        //       "name": "test2",
        //       "email": "test2@gmail.com",
        //       "image": "1680265888.PNG",
        //       "created_at": "2023-03-31 05:53:10",
        //       "updated_at": "2023-03-31 12:31:28"
        //     }
        // ]

    }
    public function student_add(Request $request)  
    {
        /**
         * create an object from student table
         * put form data into student object 
         */
    //     $studentObj = new student; 
    //     $studentObj->name = $request->name;
    //     $studentObj->email = $request->email;
    //     $studentObj->save();

    //     $image = $request->file;
    //     if($image)
    //     {
    //         $unique_image_name = time().'.'.$image->getClientOriginalExtension();
    //         // move and store image into public/images directory
    //         $request->file->move('images',$unique_image_name);
    //         $studentObj->image=$unique_image_name;
    //     }
    //     $studentObj->save();
    //    //  return redirect()->route('student_list');
    //    return redirect()->action('StudentController@student_list');


    //  --------------- ONLINE API -----------------
    // echo PrintReportController::getPrintReport(201, 'An error occurred!');
    //  echo "<pre>";
    //  print_r($request->all());
    //  die();
    
        // $get_result_arr = json_decode($request->getContent(), true);
        // $studentObj =  new student;
        // $studentObj->name = $get_result_arr['name'];
        // $studentObj->email = $get_result_arr['email'];

        // $image = $get_result_arr['file'];
        // if($image)
        // {
        //     $unique_image_name = time().'.'.$image->getClientOriginalExtension();
        //     // move and store image into public/images directory
        //     $get_result_arr['file']->move('images',$unique_image_name);
        //     $studentObj->image=$unique_image_name;
        // }

        // try
        // {
        //     $studentObj->save();
        //     return response()->json(array('status' => 201, 'message' => 'Successfully inserted'));
        // }
        // catch(Exception $e)
        // {
        // //    dd($e->getMessage());
        //     return response()->json(array('status' => 201, 'message' => 'Not inserted'));
        // }

        $studentObj = new student; 
        $studentObj->name = $request->name;
        $studentObj->email = $request->email;
    
        if($request->hasfile('image'))  
        {  
            $file=$request->file('image');  
            $extension=$file->getClientOriginalExtension();  
            $filename=time().'.'.$extension;  
            $file->move('images',$filename);  
            $studentObj->image=$filename;  
        }  
        else  
        {  
            return $request;  
            $studentObj->image='';  
        }  
        try
        {
            $studentObj->save();
            return response()->json(array('status' => 201, 'message' => 'Successfully inserted'));
        }
        catch(Exception $e)
        {
            return response()->json(array('status' => 201, 'message' => 'Not inserted'));
        }
        
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
