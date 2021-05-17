@extends('layouts.app')

@section('body')
    <div id="wrapper">
        <div id="page">
            <h1 class="underline text-green-600 text-xl font-extrabold">Edit Car</h1>
            <form method="POST" action="{{route('cars.show', $car)}}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" for="registration_number">Registration number</label>
                    <div class="control">
                        <input class="input {{$errors->has('registration_number') ? 'is-danger' : ''}}" type="text"
                               name="registration_number" id="registration_number"
                               value="{{$car->registration_number}}">
                        @error('registration_number')
                        <p class="help is-danger">{{$errors->first('registration_number')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="manufacturer">Manufacturer</label>
                    <div class="control">
                        <input class="input {{$errors->has('manufacturer') ? 'is-danger' : ''}}" type="text"
                               name="manufacturer" id="manufacturer" value="{{$car->manufacturer}}">
                        @error('manufacturer')
                        <p class="help is-danger">{{$errors->first('manufacturer')}}</p>
                        @enderror

                    </div>
                </div>
                <br>
                <div class="field">
                    <label class="label" for="currently_available">Currently available?</label>
                    <select class="input {{$errors->has('currently_available') ? 'is-danger' : ''}}" type="select"
                            name="currently_available" id="currently_available" value="{{$car->currently_available}}">
                        <option value="1">YES</option>
                        <option value="0">NO</option>
                    </select>
                    @error('currently_available')
                    <p class="help is-danger">{{$errors->first('currently_available')}}</p>
                    @enderror
                </div>

                <div class="field is-groupped">
                    <div class="control">
                        <button class="bg-green-600 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                type="submit">Submit
                        </button>
                    </div>
                </div>

            </form>
            <br>
            <div>
                <form method="POST" action="{{route('cars.destroy', $car)}}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-green-600 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                            type="submit">Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
@endsection
