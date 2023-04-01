<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Handle Error
use Exception;


// specify student model
use App\Models\Student;

class StudentController extends Controller
{

    /**
     * Description:     get students list
     * HTTP Method:     GET
     * URL:             http://127.0.0.1:8000/student_list
     * @Returns:        {object}: returns the list of students
     */
    public function student_list()
    {
        $student_list = json_decode(student::all());
        return response()->json($student_list);
    }

    /**
     * Description:     add a new student
     * HTTP Method:     POST
     * URL:             http://127.0.0.1:8000/student_add
     * @Param:          {form-fields}: {{name: string, email: string, image?: string}}   
     * @Returns:        {object}: returns a success or conflict message
     */
    public function student_add(Request $request)  
    {
        $studentObj = new student; 
        $studentObj->name = $request->name;
        $studentObj->email = $request->email;
    
        if($request->hasfile('image'))  
        {  
            $image = $request->file('image');  
            $extension = $image->getClientOriginalExtension();  
            $uniqueFilename = time().'.'.$extension;  
            $image->move('images', $uniqueFilename);  
            $studentObj->image = $uniqueFilename;  
        }   
        try
        {
            $studentObj->save();
            return response()->json(array('status' => 201, 'message' => 'Successfully Created'));
        }
        catch(Exception $e)
        {
            return response()->json(array('status' => 409, 'message' => ' Conflicted '.$e->getMessage()));
        }
        
    }

    /**
     * Description:     delete a student by id
     * HTTP Method:     GET
     * URL:             http://127.0.0.1:8000/student_delete/28
     * @Param:          {number}: id - The student id   
     * @Returns:        {object}: returns a success or failure message
     */
    public function student_delete($id)
    {
         /**
          * Authentication should be implemented on real project
          */
        // check if a student exist with given id 
        if (student::where('id', '=', $id)->exists()) 
         {
            $foundRecord = student::find($id);
            try
            {
                $foundRecord->delete();
                return response()->json(array('status' => 200, 'message' => 'Successfully deleted'));
            }
            catch(Exception $e)
            {
                return response()->json(array('status' => 204, 'message' => 'No Content'.$e->getMessage()));
            }
         }
         else 
         {
            return response()->json(array('status' => 404, 'message' => 'Not found'));
         }
    }
 

    /**
     * Description:     get student by id
     * HTTP Method:     GET
     * URL:             http://127.0.0.1:8000/student_by_id/28
     * @Param:          {number}: id - The student id   
     * @Returns:        {object}: return a student list
     */
    public function student_by_id($id)
    {
        $foundStudent = json_decode(student::find($id));
        return response()->json($foundStudent);
    }



    /**
     * Description:     update student by id
     * HTTP Method:     POST
     * URL:             http://127.0.0.1:8000/student_update/28
     * @Param1:         {form-fields}: {{name: string, email: string, image?: string}}   
     * @Param2:         {number}: id - The student id        
     * @Returns:        {object}: returns a success or failure message
     */
    public function student_update(Request $request, $id)
    {
       $studentObj = student::find($id);
       $studentObj->name = $request->name;
       $studentObj->email = $request->email;
        // return $request;
        if($request->hasfile('image'))  
        {  
            $image = $request->file('image');  
            $extension = $image->getClientOriginalExtension();   
            $unique_image_name = time().".".$extension;
            $image->move('images',$unique_image_name);
            $studentObj->image = $unique_image_name;
        }   
        try
        {
            $studentObj->save();
            return response()->json(array('status' => 201, 'message' => 'Successfully Updated'));
        }
        catch(Exception $e)
        {
            return response()->json(array('status' => 409, 'message' => ' Conflicted '.$e->getMessage()));
        }
    }
}
