<?php

namespace App\Http\Controllers;
use App\Models\faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AddfacultyController extends Controller
{
    public function index()
    {
        $data = faculty::all();
        return view('addfaculty', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        faculty::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/addfaculty');
    }
    public function destroy($id)
    {
        faculty::where('id',$id)->delete();
        return redirect('/addfaculty');
    }
    public function edit($id)
    {
        $user = faculty::where('id',$id)->first();
        return view('update1',compact('user'));
    }
    public function update(Request $request, $id)
    {
        faculty::where('id',$id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        // Register::where('id',$id)->update($request->all());
        return redirect('/addfaculty');
    }
}


