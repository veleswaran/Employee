<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Employee</h2>
        
        <form action="/emp/{{ $employee->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $employee->dob) }}" required>
                @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select class="form-select" id="department_id" name="department_id" required>
                    <option value="" disabled>Select a department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @error('department_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="designation_id" class="form-label">Designation</label>
                <select class="form-select" id="designation_id" name="designation_id" required>
                    <option value="" disabled>Select a designation</option>
                    @foreach ($designations as $designation)
                        <option value="{{ $designation->id }}" {{ $designation->id == $employee->designation_id ? 'selected' : '' }}>
                            {{ $designation->name }}
                        </option>
                    @endforeach
                </select>
                @error('designation_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $employee->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="doj" class="form-label">Date of Joining</label>
                <input type="date" class="form-control" id="doj" name="doj" value="{{ old('doj', $employee->doj) }}" required>
                @error('doj')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $employee->address) }}</textarea>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile', $employee->mobile) }}" required>
                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($employee->image)
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="Profile Image" class="mt-2" width="100">
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/emp" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    </x-app-layout>
