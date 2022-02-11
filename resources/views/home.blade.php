@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{  $is_update ? 'Update' : 'Start' }} Attendance
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b> Do you want to start your attendance Today ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Thanks.</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('attendance.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Register Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php
                        $start_time = now()->format('Y-m-d H:i:s');
                    @endphp
                    <b> Today attendance time starts from {{ $start_time }}</b>
                    <input type="hidden" name="start_time" value="{{ $start_time }}"/>
                    <input type="hidden" name="emp_id"  value="{{ Auth::id() }}" >
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
