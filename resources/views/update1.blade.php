@extends('layouts.main')

@push('title')
    <title>Update User</title>
@endpush

@section('main-section')
    Update User<br>
    {{$user}}
    <form action="/addfaculty/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{$user->name}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror
        <input type="text" name="email" value="{{$user->email}}"><br>
        @error('email')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Update">
    </form>
@endsection
