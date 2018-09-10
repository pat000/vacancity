<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\UsersInfo as u_info; 
use App\Users_info;
use Auth;
class UsersInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $users_info = Users_info::join('users', 'users_basic_info.uid', '=', 'users.id')
                        // ->join('education', 'users_basic_info.educ_id', '=', 'education.educ_id')
                        ->join('work_experience', 'users_basic_info.position_id', '=', 'work_experience.work_id')
                        ->where('users.slug_name', '=' , $slug)
                        ->orderBy('work_experience.work_id' , 'desc')
                        ->get();
        return u_info::collection($users_info);
    }

    public function store(Request $request)
    {
        //
        $users_info = $request->isMethod('put') ? Users_info::findOrfail
        ($request->info_id) : new Users_info;

        //$users_info = Users_info::find($request->input('info_id'));
        $users_info->uid = Auth::user()->id;
        $users_info->headline = $request->input('headline');
        $users_info->position_id = $request->input('position');
        $users_info->educ_id = $request->input('educ_id');
        $users_info->loc_id = $request->input('loc_id');
        $users_info->zipcode = $request->input('zipcode');
        $users_info->industry_id = $request->input('industry_id');
        $users_info->tel_no = $request->input('tel_no');
        $users_info->medialink = $request->input('medialink');
        $users_info->save();
        return 'success';
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
        $users_info = Users_Info::findOrfail($id);
        return new u_info($users_info);

    }

    public function destroy($id)
    {
        //
    }
}
