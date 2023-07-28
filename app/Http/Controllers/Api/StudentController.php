<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        return Student::create($request->all());
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Student::find($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        return $student->update($request->all());
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Student::destroy($id);
    }
    /**
     * Search by email
     */
    public function search(string $email)
    {
        return Student::where('email', $email)->get();
    }
}
