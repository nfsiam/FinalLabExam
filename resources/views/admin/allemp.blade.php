<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>All Employers</title>
</head>
<body>
    <div>
        <h1>Welcome {{session('username')}}</h1>
        <a href="/admin">Dashboard</a>
        <a href="/logout">logout</a>
    </div>
    <br>
    <br>
    <div>
        <input type="text" placeholder="search employer by name / username..." id="sbox">
    </div>
    <br>
    <br>
    <div  id="list">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Field Name</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($employerList as $employer)

                <tr>
                    <td rowspan="4">{{ $employer->id }}</td>
                    <td>username</td>
                    <td>{{ $employer->username }}</td>
                    <td rowspan="4"><a href="/admin/edit-employer/{{$employer->id}}">Edit</a> | <a href="/admin/delete-employer/{{$employer->id}}">Delete</a></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $employer->name }}</td>
                </tr>
                <tr>
                    <td>Company Name</td>
                    <td>{{ $employer->company }}</td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td>{{ $employer->contactno }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script>
        $('#sbox').keyup(function () {
            $.ajax({
                url: '/admin/search',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    key: $(this).val(),
                },
                success: function (data) {
                    $('#list').html(data);
                },
            });
        });
    </script>

</body>
</html>