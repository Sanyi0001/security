@extends('layouts.app')

@section('body')
    <div id="wrapper">
        <div id="page">
            <br>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <h1 class="text-green-600 font-bold text-left mb-1 md:mb-0 pr-4 ml-5">Add new Car</h1>
                </div>
            </div>
            <form class="w-full max-w-sm" method="POST" action="{{route('cars.index')}}">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                               for="registration_number">Registration number
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{$errors->has('registration_number') ? 'is-danger' : ''}}"
                            id="registration_number" name="registration_number" type="text" title="8-digit number"
                            pattern="[1-9]{8}"
                            value="{{old('registration_number')}}" required>
                        @error('registration_number')
                        @if($errors->first('registration_number') == "The registration number has already been taken.")
                            <p class="text-red-600">A car with this registration number already exists in our
                                system!</p>
                        @else
                            <p class="text-red-600">{{$errors->first('registration_number')}}</p>
                        @endif
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="manufacturer">
                            Manufacturer
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{$errors->has('manufacturer') ? 'is-danger' : ''}}"
                            id="manufacturer" name="manufacturer" type="text" value="{{old('manufacturer')}}" required>
                        @error('manufacturer')
                        <p class="text-red-600">{{$errors->first('manufacturer')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="manufacturer">
                            Contact email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 {{$errors->has('manufacturer') ? 'is-danger' : ''}}"
                            id="contact_email" name="contact_email" type="email" value="{{old('contact_email')}}"
                            required>
                        @error('contact_email')
                        <p class="text-red-600">{{$errors->first('contact_email')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input type="hidden" id="currently_available" name="currently_available" value="0">
                        <input class="mr-2 leading-tight" id="currently_available" name="currently_available"
                               type="checkbox" value="1" {{ (! empty(old('currently_available')) ? 'checked' : '') }}>
                        <span class="text-sm">Currently available</span>
                    </label>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button
                            class="shadow bg-green-600 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
