@extends("layouts.app")


@section("contents")

    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Lists of Employee Data</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Last Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Gender <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Age <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Division <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Job experience <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company as $data)
                      <tr>
                        <td> {{ $data-> employee_id }} </td>
                        <td> {{ $data-> first_name }} </td>
                        <td> {{ $data-> last_name }} </td>
                        <td> {{ $data-> gender }} </td>
                        <td> {{ $data-> age }} </td>
                        
                        <td> {{ $data-> division }} </td>

                        @if ($data-> job_experience === "" OR empty($data-> job_experience))
                        <td> None </td>
                        @else
                        <td>{{ $data-> job_experience }} </td>
                        @endif
                        <td> <button> <a href="{{ route("employee.edit", ["id" => $data-> employee_id]) }}"> Edit </a>  </button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <td><button> <a href="{{ route("employee.create") }}"> Add an Employee </a> </button></td>
        </section>
    </main>
    

    <script src="script.js"></script>