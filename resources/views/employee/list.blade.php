<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
                        <a href="/emp/{{ $employee->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/emp/{{ $employee->id }}" method="POST" style="display:inline;">
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

    </x-app-layout>
