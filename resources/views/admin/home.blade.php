@extends('admin.layouts.app')

@section('content')
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employee Details</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="table" class="table table-striped table-bordered" class="text-light">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Date of Birth</td>
                                <td>Gender</td>
                                <td>Date of Joining</td>
                                <td>Address</td>
                                <td>Phone</td>
                                <td>Total Working Days</td>
                            </tr>
                        </thead>
                        @foreach ($sample as $data )
                            <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->dob }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->date_of_joining }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->Total_working_days }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>
@endsection

