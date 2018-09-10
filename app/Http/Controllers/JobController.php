<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Jobs as JobResource; 
use App\Job;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $job = Job::join('users', 'job_postings.posted_by', '=', 'users.id')
        ->where('job_postings.job_id', '=' , $id)
        ->orderBy('job_postings.created_at' , 'desc')
        ->get();
        return JobResource::collection($job);
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
        $job = $request->isMethod('put') ? Job::findOrfail
        ($request->job_id) : new Job;

        $job->posted_by =Auth::user()->id;
        $job->position = $request->input('position');
        $job->company = $request->input('company');
        $job->job_function = $request->input('job_function');
        $job->company_industry = $request->input('company_industry');
        $job->location = $request->input('location');
        $job->employment_type = $request->input('employment_type');
        $job->senority_level = $request->input('senority_level');
        $job->job_description = $request->input('job_description');
        $job->expi_level = $request->input('expi_level');
        $job->degree = $request->input('degree');

        if ($job->save()){
            return new JobResource($job);
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
    }
}
