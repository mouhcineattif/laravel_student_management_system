<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    private const CACHE_KEY = 'students';
    public function index()
    {
        $students = Cache::remember('students',14446,function(){
            return Student::paginate(10);
        });
        return view('students.index',compact('students'));
    }
    public function show(Student $student){
        $cachePrefix = 'student'.$student->id;
        // $cachePrefix = 'student'.$id;
        // if(Cache::has($cachePrefix)){
        //     $student = Cache::get($cachePrefix);
        //     // return view('students.student',compact('student'));
        // }else{
        //     $student = Student::findOrFail($id);
        //     Cache::put($cachePrefix,$student,3);
        // }
        $student = Cache::remember($cachePrefix,14600,function() use ($student){
            return $student;
        });
        return view('students.student',compact('student'));
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(StudentRequest $request)
    {
        // Validate data
        $fields = $request->validated();
        $this->uploadImage($request,$fields);
        // Hashing Password
        $fields['password'] = Hash::make($request->password);
        // Insert data
        Student::create($fields);
        Cache::forget(self::CACHE_KEY);
        return redirect()->route('students.index')->with('success','Student  has been created successfuly !');
        
    }
    public function destroy(Student $student)
    {
        $student->delete();
        Cache::forget(self::CACHE_KEY);
        return back()->with('success','Student Deleted !');
    }
    public function edit(Student $student)
    {
        // Gate::authorize('update_student',$student);
        return view('students.edit',compact('student'));
    }
    public function update(Student $student,StudentRequest $request)
    {
        $fields = $request->validated();
        $image = $request->file('image');
        $this->uploadImage($request,$fields);
        $fields['password'] = Hash::make($request->password);
        $student->fill($fields)->save();
        Cache::forget(self::CACHE_KEY);
        return to_route('students.show',$student->id);
    }
    private function uploadImage(StudentRequest $request,array &$fields)
    {
        unset($fields['image']);
        if($request->hasFile('image')){
            $fields['image'] =  $request->file('image')->store('students','public');
        }
    }
}
