<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Employees List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Department</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOJ</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emp as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->department->name }}</td>
                    <td>{{ $employee->designation->name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->doj }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>
                        @if($employee->image)
                            <img src="{{ asset('storage/' . $employee->image) }}" alt="Profile Image" style="width: 50px; height: 50px; object-fit: cover;">
                        @endif
                    </td>
                    <td>
                        <a href="/employees/{{ $employee->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/employees/{{ $employee->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
