@extends('layouts.admin')

@section('content')
    <div class="row m-2">
        <b>Добавление файла</b>
    </div>
    <div class="row">

        <div class="col-6 m-2">

            <form action="{{ route('xmlParse')}}"
                    method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-6">
                    <input type="file" class="form-control" name="xml">Загрузить xml файл
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>
    <div class="row">

    </div>
    @foreach ($cars as $car)
    <div class="d-flex justify-content-start pt-3 pb-2 mb-3 border-bottom">

        <div class="col-sm-1">{{ $car['id'] }}</div>
        <div class="col-1">{{ $car['car_model'] }}</div>
        <div class="col-1">{{ $car['year'] }}</div>
        <div class="col-1">{{ $car['run'] }}</div>
        <div class="col-1">{{ $car->mark->mark }}</div>
        <div class="col-1">@if ($car->generation)
                                {{ $car->generation->generation }}
                            @endif</div>
        <div class="col-1">{{ $car->color->color }}</div>
        <div class="col-1">{{ $car->bodyType->body_type }}</div>
        <div class="col-1">{{ $car->engineType->engine_type }}</div>
        <div class="col-1">{{ $car->gearType->gear_type }}</div>
        <div class="col-1">{{ $car->transmission->transmission }}</div>

    </div>
    @endforeach


@endsection
