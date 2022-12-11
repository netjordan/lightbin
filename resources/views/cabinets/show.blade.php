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
                    <div class="container-fluid">
                        @for($i = 0; $i < $cabinet->rows; $i++)
                            <div class="row">
                                <div class="col-1 align-self-center">#{{ $i + 1 }}</div>
                                @php
                                    $bins = $cabinet->bins()->where('cabinet_row', $i + 1)->get();

                                @endphp
                                @foreach($bins as $bin)
                                    <div class="col text-center" style="border: #EEEEEE 1px solid; padding: 5px;">
                                        Bin {{ $bin->id }}<br/>
                                        <a class="btn btn-primary" href="{{ url('cabinets/' . $cabinet->id .'/identifyBin/' . $bin->id) }}">Identify</a><br/>
                                        <a class="btn btn-info" href="{{ url('cabinets/' . $cabinet->id .'/loadBin/' . $bin->id) }}">Load</a>
                                    </div>
                                @endforeach

                                <div class="col-1 align-self-center">
                                    <form method="post" action="{{ url('cabinets/' . $cabinet->id . '/addBin/' . $i + 1) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">+ Bin</button>
                                    </form>

                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
