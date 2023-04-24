<!DOCTYPE html>
<html lang="en">
    <head>
        <title>List of Users</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-danger">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="d-flex justify-content-between py-3">
                <div class="h4">Users</div>
                <div>
                    <a href="{{route('user.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>mobile</th>
                        <th>Role</th>
                        <th>password</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    @if(Session::has('users'))
                @foreach($users as $key => $user)
                <tbody>
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['mobile']}}</td>
                        <td>{{$user['role']}}</td>
                        <td>{{$user['password']}}</td>
                        <td><img src="{{url('uploads/users/'.$user['image']) }}" width="70px"></td>
                        <td>{{$user['date']}}</td>
                        <td><a href="{{route('user.edit',$key) }}" class="btn btn-primary btn-sm"> Edit</a>
                        <a onclick="return confirm('Do you want to delete?')"href="{{route('user.delete',$key) }}" class="btn btn-danger btn-sm"> Delete</a></td>
                    </tr>
                </tbody>
                @endforeach
                    @else
                    <tr>
                        <td colspan="6">Record Not Found</td>
                    </tr>
                    @endif
            </table>
            @if(Session::has('users'))
            <div class = "row">
                <div class="col-md-12 text-center">
                    <a class="btn btn-btn btn-success" href="{{route('userDataBase.store')}}" role="button">Final Submit</a>
                </div>
            </div>
            @endif
        </div>
    </body>
</html>
