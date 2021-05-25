<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\Http\Requests\SkillRequest;
use Validator;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill               = Skill::all();
        $status              = 404;
        $data['data']        = [];
        if(count($skill)>0){
            $status          = 200;
            $data['data']    = $skill;
        }
        return response($data, $status)->header('Content-Type', 'text/plain');
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
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'skill' => 'required',
        ]);

        if($validator->fails()){
            $status  = 500;
            $data['message'] = $validator->errors();
        }else{
                $skillRequest = Skill::create([
                    'name'=>$request['name'],
                    'skill'=>$request['skill']
                ]);
                if($skillRequest->id > 0){
                    $status  = 200;
                    $data['message'] = 'Data Inserted successfully';
                }else{
                    $status  = 500;
                    $data['message'] = 'Something went wrong';
                }
        }
        return response($data, $status)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $status          = 404;
        $data['message'] = 'Data not found';
        $data['data']    = [];
        $skill = Skill::find($id);
        if($skill){
            $status  = 200;
            $data['message'] = 'Data found successfully';
            $data['data']    = $skill;
        }
        return response($data, $status)->header('Content-Type', 'text/plain');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ 
            'name'  => 'required',
            'skill' => 'required',
        ]);
     
        if($validator->fails()){
            $status  = 500;
            $data['message'] = $validator->errors();
        }else{
                $skill = Skill::find($id);
                if($skill){

                    $skillRequest = Skill::where(['id'=>$id])->update([
                        'name'=>$request['name'],
                        'skill'=>$request['skill']
                    ]);

                    if($skillRequest){
                        $status  = 200;
                        $data['message'] = 'Data Updated successfully';
                    }else{
                        $status  = 500;
                        $data['message'] = 'Something went wrong';
                    }
                }else{
                    $status  = 404;
                    $data['message'] = 'Skill Not Found!';
                }
        }
        return response($data, $status)->header('Content-Type', 'text/plain');
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
