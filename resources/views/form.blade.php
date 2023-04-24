
<!DOCTYPE html>
<html>
    <head>
        <title>ADD USER</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <style type="text/css">
            .box{
                width:600px;
                margin:0 auto;
                border:1px solid #ccc;
            }
            </style>
    </head>
    <body>
        <br />
        <a href="{{ route('user.list') }}" class="btn btn-primary">Back</a>
        <div class="container box">
            <h3 align="center">Add User</h3><br />
            <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required />
                    <span style="color:red"> @error("name"){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" name="mobile"  class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input  type="date" class="form-control datepicker" name="date" required />
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-select" aria-label="Default select example" name="role" required>
                    <option >Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    </select>
                </div>
                <div class="form-group m-3">
                    <input type="submit" name="login" class="btn btn-primary" value="Submit" />
                </div>
            </form>
        </div>
    </body>
</html>

