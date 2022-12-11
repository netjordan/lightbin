@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Cabinets') }}
                    <a class="btn btn-secondary" href="{{ url('cabinets/add') }}">Create Cabinet</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cabinets as $cabinet)
                                <tr>
                                    <td>{{ $cabinet->id }}</td>
                                    <td>{{ $cabinet->description }}</td>
                                    <td><a href="{{ url('cabinets/' . $cabinet->id) }}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
