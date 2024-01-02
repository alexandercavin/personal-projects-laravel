<form method="POST" action="{{ route("employee.update",["id" => $company -> employee_id ]) }}">
    @csrf
    @method("PUT")
    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" value=" {{ $company -> first_name }} ">
    @error("first_name")
        <p> {{$message}} </p>
    @enderror
    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" value="{{ $company -> last_name }} " >
    @error("last_name")
    <p> {{$message}} </p>
@enderror
    <label for="gender">Gender</label>
    <input type="text" id="gender" name="gender" value=" {{ $company -> gender }} ">
    @error("gender")
    <p> {{$message}} </p>
@enderror
    <label for="age">Age</label>
    <input type="text" id="age" name="age" value=" {{ $company -> age }} ">
    @error("age")
    <p> {{$message}} </p>
@enderror
    <label for="division">Division</label>
    <input type="text" id="division" name="division" value=" {{ $company -> division }} ">
    @error("division")
    <p> {{$message}} </p>
@enderror
    <label for="job_experience">Job Experience</label>
    <input type="text" id="job_experience" name="job_experience" value="{{$company -> job_experience }} ">
    @error("experience")
    <p> {{$message}} </p>
@enderror
    <button type="submit"> Update</button>
{{-- <a href="{{ route("company.index") }}" --}}
</form>