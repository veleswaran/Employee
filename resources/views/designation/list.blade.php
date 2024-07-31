<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designations Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Designations List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Department</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($desig as $designation)
                <tr>
                    <th scope="row">{{ $designation->id }}</th>
                    <td>{{ $designation->name }}</td>
                    <td>{{ $designation->description }}</td>
                    @php
                        $departmentName = 'N/A';
                        foreach ($dept as $department) {
                            if ($designation->department_id == $department->id) {
                                $departmentName = $department->name;
                                break; 
                            }
                        }
                    @endphp
                    <td>{{ $departmentName }}</td>

                    <td>
                        <a href="/designations/{{ $designation->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/designations/{{ $designation->id }}" method="POST" style="display:inline;">
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