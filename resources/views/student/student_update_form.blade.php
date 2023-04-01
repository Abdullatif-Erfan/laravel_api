<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <meta name="Abdul Latif" content="Developer">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Update Form </title>
    </head>
    <body>

          <form action="{{url('student_update',$data->id)}}" method="POST" enctype="multipart/form-data" align="center">
           <!-- 
               I have ignored CSRF right now, but in real project we can use token-based authentication like JWT
             -->
          <!-- @csrf     -->
          <div>
                  <label for="name">name</label>
                  <input type="text" id="name" name="name" value="{{$data->name}}">
              </div>

              <div>
                  <label for="email">email</label>
                  <input type="email" id="email" name="email" value="{{$data->email}}">
              </div>

              <div>
                  <label>Old Image {{$data->image}} </label>
                  <img src="/images/{{$data->image}}" width="100px" />
              </div>


              <div>
                  <label>New Image</label>
                  <input type="file" name="file" >
              </div>

              <div>
                  <input type="submit" name="submit" value="Update">
              </div>
          </form>


    </body>
</html>
