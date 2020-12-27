<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::guard('api')->user();
        
        $job = Job::create([
            'user_id' => $user->id

        ]+$request->all());
        return Api::setResponse('job',$job);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $job = Job::find($request->job_id);
        $job->update($request->all());
        return Api::setResponse('job',$job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $job = Job::find($request->job_id);
        $job->delete();
        return Api::setMessage('job successfully deleted');
    }

    public function fetch_jobs(){

        $user = Auth::user();
        if($user->cat_id == 4){
            $jobs = Job::where('status','!=','closed')->where('category_id',4)->with('category')->get();
        }
        else {
            $jobs = Job::where('status','!=','closed')->where('category_id','!=',4)->where('category_id',4)->with('category')->get();
        }
        foreach($jobs as $job){
            $job->user;
        }
        return Api::setResponse('jobs',$jobs);
    }
    
    public function jobs(){
        $jobs = Job::where('user_id', Auth::user()->id)->with('category')->get();
        // $jobs = Job::where('status','!=','closed')->where('user_id', Auth::user()->id)->get();
        return Api::setResponse('jobs',$jobs);
    }
    
    public function userJobs(Request $request){
        $jobs = Job::where('status','!=','closed')->where('user_id', $request->user_id)->with('category')->get();
        return Api::setResponse('jobs',$jobs);
    }

    public function userClosedJobs(Request $request){
        $jobs = Job::where('status','closed')->where('user_id', Auth::user()->id)->with('category')->get();
        return Api::setResponse('jobs',$jobs);

        
    }

    public function details(Request $request){
        $job = Job::find($request->job_id);
        $job->applicants = $job->applicants();
        return Api::setResponse('job', $job);
    }
}
