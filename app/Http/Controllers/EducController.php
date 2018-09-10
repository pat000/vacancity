<?php

namespace App\Http\Controllers;
use App\Http\Resources\Education as EducationResource; 
use App\Education;
use Illuminate\Http\Request;
use Auth;
class EducController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $education = Education::join('users', 'education.uid', '=', 'users.id')
        ->where('users.slug_name', '=' , $slug)
        ->get();
        return EducationResource::collection($education);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $education = $request->isMethod('put') ? Education::findOrfail
        ($request->educ_id) : new Education;

        //$education->education_id = $request->input('education_id');
        $education->uid =Auth::user()->id;
        $education->school_name = $request->input('school_name');
        $education->degree = $request->input('degree');
        $education->field_of_study = $request->input('field_of_study');
        $education->from_year = $request->input('from_year');
        $education->to_year = $request->input('to_year');
        $education->description = $request->input('description');

        if ($education->save()){
            return new EducationResource($education);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Education = Education::findOrfail($id);
        // delete
        if($Education->delete()){
            return new EducationResource($Education);
        }
    }
}
