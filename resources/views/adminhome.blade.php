@extends('layouts.adminapp')

@section('content')
@foreach ($sample as $data )
    {{ $data->name }}
    {{ $data->email }}
    {{ $data->gender }}
    {{ $data->dob }}
    {{ $data->date_of_joining }}
    {{ $data->address }}
    {{ $data->phone }}
    {{ $data->Total_working_days }}
@endforeach
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
