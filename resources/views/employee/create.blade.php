<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="/emp" class="btn btn-primary">Employee list</a>
        </div>
    </x-slot>
    <div class="container " style="width: 60%;margin-left:20%;">
        <div class="container bg-info rounded mt-5 p-5 ">
            <h1 class="mb-4 h1">Add Employee</h1>
            <form action="/emp" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-row d-flex justify-content-around">
                    <div class="mb-3 form-group col-md-4">
                        <label for="department_id" class="form-label">Department</label>
                        <select class="form-select" id="department_id" name="department_id" required>
                            <option value="" disabled selected>Select a department</option>
                            @foreach ($dept as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 form-group col-md-4" id="desig" style="display: none;">
                        <label for="designation_id" class="form-label">Designation</label>
                        <select class="form-select" id="designation_id" name="designation_id" required>

                        </select>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="doj" class="form-label">Date of Joining</label>
                    <input type="date" class="form-control" id="doj" name="doj" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("department_id").addEventListener("change", () => {
            document.getElementById("desig").style.display = "block"
            let id = document.getElementById("department_id").value;
            fetch(`/desig/${id}`)
                .then(res => res.json())
                .then(data => {
                    let optin = `<option value="" disabled selected>Select a designation</option>`;
                    for (let i = 0; i < data.length; i++) {
                        optin += `<option value="${data[i]["id"]}">${data[i]["name"]}</option>`
                    }
                    document.getElementById("designation_id").innerHTML = optin
                })
        })
    </script>
</x-app-layout>