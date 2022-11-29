@extends('layouts.admin_layout')

@push('title')
    <title>Register</title>
@endpush

@section('content')
  <center><b><u>  <h1>Add Student</h1></b></u><br> </center>
    <form action="/register1" method="POST">
        @csrf
      Name:  <input type="text" name="name" placeholder="name" value="{{old('name')}}"><br><br>
        @error('name')
            {{$message}}<br>
        @enderror
      E-mail:  <input type="text" name="email" placeholder="email" value="{{old('email')}}"><br><br>
        @error('email')
            {{$message}}<br>
        @enderror
        Password:<input type="password" name="password" placeholder="password"><br><br>
        @error('password')
            {{$message}}<br>
        @enderror
        Confirm_password :<input type="password" name="confirm_password" placeholder="confirm_password"><br><br>
        @error('confirm_password')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Submit">
   </form>
<br>
    <table border="2px">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($data as $value )
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td><a href="/register1/{{$value->id}}/edit">Edit</a></td>
                <td>
                    <form action="/register1/{{$value->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
