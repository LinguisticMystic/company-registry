@extends('layout')
@section('content')

    <div class="flex mx-4 my-4">

        <ul>
            <li><strong>Name: </strong>{{ $name }}</li>
            <li><strong>Registration Nº: </strong>{{ $regcode }}</li>
            <li><strong>Registration date: </strong>{{ $regdate }}</li>
            <li><strong>Address: </strong>{{ $address }}</li>
        </ul>

    </div>

    <a href="/">
        <button class="mx-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</button>
    </a>

@endsection
