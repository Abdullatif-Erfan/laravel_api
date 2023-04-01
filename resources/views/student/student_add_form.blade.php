<!DOCTYPE>
<html>
    <head>
        <title>student_add_form</title>
    </head>
    <body>
        <h2 align="center"> add student </h2> 
        <div align="center">
           <form action="{{url('student_add')}}" method="POST" enctype="multipart/form-data">
              
              <!-- @csrf -->
              <!-- 
               I have ignored CSRF right now, but in real project we can use token-based authentication like JWT
             -->

              <div style="padding: 20px;">
                 <label for="">Name</label> 
                 <input type="text" name="name" />
               </div>

               <div style="padding: 20px;">
                 <label for="">Email</label> 
                 <input type="email" name="email" />
               </div>

               <div style="padding: 20px;">
                 <label for="">Photo</label> 
                 <input type="file" name="file" />
               </div>

               <div style="padding: 20px;">
                 <input type="submit" name="submit" />
               </div>

           </form>
        </div>
    </body>
</html>