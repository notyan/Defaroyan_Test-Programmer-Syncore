@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $biodata->full_name }}</div>

                    <div class="card-body">
                        <ul>
                            <li>Email: {{ $biodata->email }}</li>
                            <li>Address: {{ $biodata->address }}</li>
                            <li>Phone Number: {{ $biodata->phone_number }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
