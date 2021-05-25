<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Validator;
class ContactController extends Controller
{
    public function update_store(Request $request,$id=null){
                $rules = [
                    'name'      =>'required',
                    'email'     =>'email|required',
                    'mobile_no' =>'required',
                    'message'   =>'required'
                ];
                $messages = [
                    'name'      =>'Name is required',
                    'email'     =>'Valid email is required',
                    'mobile_no' =>'Valid mobile is required',
                    'message'   =>'Message is required'
                ];
                
        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() ) 
        {
            $data = [
                'success' => 0, 
                'message'=>$validator->errors()
            ];
        }else{
            $form_data = [
                'name'   =>$request['name'],
                'email'  =>$request['email'],
                'mobile_no'  =>$request['mobile_no'],
                'message'=>$request['message']
            ];
            if(isset($id)){
                Contact::where('id',$id)->update($form_data);
                $message = "Contact update successfully!";
            }else{
                Contact::create($form_data);
                $message ='Congratulations! your request submited successfully, I will contact you very soon keep eye on your inbox!';
            }
            
            $data =  [
                'success' => 1, 
                'message'=> $message
            ];
        }
        return response($data, 200)->header('Content-Type', 'text/plain');
    }

    public function update_contacts(){
            return view('admin.contacts');
    }
    
    public function get_contacts($id=null){
        if(isset($id)){
          $contacts = Contact::find($id);
        }else{
          $contacts = Contact::all();
        }
        return response($contacts, 200)->header('Content-Type', 'text/plain');
    }

    public function delete($id){
        $delete = Contact::where('id',$id)->delete();
        if($delete == 1)
        return response(1, 200)->header('Content-Type', 'text/plain');
    }
}
