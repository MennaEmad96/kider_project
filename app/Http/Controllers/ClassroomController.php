<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Traits\Common;

class ClassroomController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::get();
        return view('admin/classroom/classrooms', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('admin/classroom/addClassroom', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->messages();
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'age'=>'required|string',
            'time' => 'required|string',
            'capacity' => 'required|integer',
            'cost' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'teacher_id' => 'required|exists:teachers,id',
        ], $messages);
        //use method from traits called uploadFile
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image'] = $fileName;
        $data['published'] = isset($request->published);
        Classroom::create($data);
        return redirect('classrooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages()
    {
        return [
            'name.string'=>'Should be string',
            'profession.string'=>'Should be text',
            'image.required'=>'Please be sure to select an image',
            'image.mimes'=>'Incorrect image type',
            'image.max'=>'Max file size exeeced',
            'teacher_id.exists'=>'Choose teacher whithin our given teachers',
        ];
    }
}
