@extends('layouts.app')

@section('body')
    <div class="content-center container mx-auto px-4">
        <table class="table-auto border-separate border border-green-800 bg-green-200">
            <thead>
            <tr>
                <th class="border border-green-600>header1">Registration number</th>
                <th class="border border-green-600>header2">Manufacturer</th>
                <th class="border border-green-600>header1">Currently available</th>
                @can('update-car')
                    <th class="border border-green-600>header1">Edit car</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td class="border border-green-600>header1">{{$car->registration_number}}</td>
                    <td class="border border-green-600>header1">{{$car->manufacturer}}</td>
                    @if($car->currently_available)
                        <td class="border border-green-600>header1">Yes</td>
                    @else
                        <td class="border border-green-600>header1">No</td>
                    @endif
                    @can('update-car')
                        <td><button><a href="{{route('cars.edit', $car)}}">
                                    <button>Edit</button>
                                </a></button></td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <a href="/cars/create">
            <button class="bg-green-600 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Create new</button>
        </a>
    </div>
@endsection
