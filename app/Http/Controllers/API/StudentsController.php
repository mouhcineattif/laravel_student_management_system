<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class StudentsController extends Controller
{
    private const CACHE_KEY = 'students_api';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students =  Cache::remember('students_api',1400000,function(){
            return   StudentResource::collection(Student::all());
        });
        // return  StudentResource::collection(Student::paginate(10));
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->all();

        // dd($fields);
        $fields['password'] = Hash::make($request->password);
        $student =  Student::create($fields);
        Cache::forget(self::CACHE_KEY);
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $fields = $request->all();

        // dd($fields);
        $fields['password'] = Hash::make($request->password);
        $student->fill($fields)->save();
        Cache::forget(self::CACHE_KEY);

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
    $student->delete();
    Cache::forget(self::CACHE_KEY);

    return response()->json([
        'message' => 'The student Deleted With Success',
        'id' => $student->id,
        'Deleted at' => $student->deleted_at,
    ]);
    }
}
