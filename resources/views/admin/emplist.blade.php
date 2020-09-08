
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