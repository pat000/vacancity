<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\WorkExperience as WorkResource; 
use App\Work;
use Auth;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $work = Work::join('users', 'work_experience.uid', '=', 'users.id')
        ->where('users.slug_name', '=' , $slug)
        ->orderBy('work_experience.work_id' , 'desc')
        ->get();
        return WorkResource::collection($work);

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
        $work = $request->isMethod('put') ? Work::findOrfail
        ($request->work_id) : new Work;

        $work->uid =Auth::user()->id;
        $work->title = $request->input('title');
        $work->company = $request->input('company');
        $work->country = '0';
        $work->status = '0';
        $work->location = $request->input('location');
        $work->from_month = $request->input('from_month');
        $work->from_year = $request->input('from_year');
        $work->to_month = $request->input('to_month');
        $work->to_year = $request->input('to_year');
        $work->industry = $request->input('industry');
        $work->description = $request->input('description');

        if ($work->save()){
            return new WorkResource($work);
        }
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
        $work = Work::findOrfail($id);
        // delete
        if($work->delete()){
            return new WorkResource($work);
        }
    }
}
