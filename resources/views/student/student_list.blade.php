<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <meta name="Abdul Latif" content="Developer">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student List</title>
    </head>
    <body>

        <!-- Search Form -->
        <div align="center"><a href="{{url('student_add_form')}}">Add New Student</a></div>
        <br><br>
        <form action="{{url('student_search')}}" method="get" align="center">
            <input type="search" name="searchByNameOrEmail" placeholder="search by name or email" />
            <input type="submit" value="Search" />
        </form>
        <br><br>

        <!-- /Search Form -->

        <table class="table table-light" align="center" border="1 px">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Photo</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $student)
            <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td><img src="images/{{$student->image}}" width="100px" /></td>
                    <td>
                        <a href="{{url('student_update_form',$student->id)}}">Edit</a>
                    </td>
                    <td>
                        <a href="{{url('student_delete',$student->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </body>
</html>
