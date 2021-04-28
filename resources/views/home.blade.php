@extends('layout')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{$error}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
            </div>
        @endforeach
    @endif

    <div class="flex mx-4 my-4">

        <div class="flex-1 w-60 mx-8">
            <h5 class="text-2xl font-normal leading-normal mt-0 mb-2 text-pink-800">
                Search for company 🔍️
            </h5>
            <form action="/search" method="post">
                <input
                    class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-60"
                    type="text" name="regcode" placeholder="Registration number">
                <br>
                <br>
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit"
                       value="Search">
            </form>
        </div>

    </div>

@endsection
