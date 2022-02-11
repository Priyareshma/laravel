@extends('layouts.app')
@section('content')
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <center><h3  style=color:green;><b> Employee Details </b></h3></center>

        @if($errors && $errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
        @endif

            @if(session('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
            @endif
            <table id="table" class="table table-striped table-bordered" class="text-light">
                <thead>
                <tr>
                <td>Employee Id</td>
                <td>Name</td>
                <td>Date of Birth</td>
                <td>Gender</td>
                <td>Date of Joining</td>
                <td>Email</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Reported Date & Time</td>
                </tr>
                </thead>
                @foreach ($users as $user )
                    <tr>
                    <td>{{ $user->emp_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->date_of_joining }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->start_time }}
                    </tr>
                @endforeach
                    <div class="row mb-2">
                        <div class="col-md-0 offset-md-0">
                            <a class="btn btn-primary" href="{{ route('attendance.edit',$user->emp_id) }}">Edit Personal Details</a>
                            <a href="{{ route('fullcalender') }}" class="btn btn-light">Event Calendar</a>
                        </div>
                    </div>

            </table>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>
@endsection
