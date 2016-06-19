<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Field;

class FieldController extends Controller
{

	
	/**
	* Create field function calls the create blade view 
	*/
    public function createfield(){
    	return view('field.create');
    }

    /**
	* Store function receive the requested field's details and
	* store it in fields database table .
    */
    public function store(Request $request){
    	$this->validate($request, Field::$create_field_validation_rules);
    	$data = $request->only('field_key','field_value');
    	\DB::table('fields')->insert($data);
    	\Session::flash('message','Field created successfully.');
    	return redirect()->route('viewfields');
    }


    /**
	* viewfields function shows all fields in a form for the user 
	* with options to edit , update or delete this fields
    */
    public function viewfields(){
    	$fields = \DB::table('fields')->select()->where('field_status','!=','deleted')->get();
        return view('field.viewfields',['fields' => $fields]);
    }


    /**
    * delete field function get the feild's ID and  
    * select this field from the fields database table 
    * to view it to the user before saving the deletation.  
    */
    public function deletefield($id){
    	$field = \DB::table('fields')->select()->where('field_id','=',$id)->get();
    	return view('field.deletefield',['field'=>$field]);
    }

    
    /**
    * Handle delete function receives the reqested field's ID 
    * and update it's status value in fields datababse table to
    * deleted 
    */
    public function handleDelete(Request $request){
    	$data = $request->only('id');
    	\DB::table('fields')->where('field_id','=',$data['id'])
    	                    ->update(['field_status'=>'deleted']);
    	\Session::flash('message','Field deleted successfully.');
    	return redirect()->route('viewfields');
    }

    /**
	* Edit field function get the field's id 
	* and open the field's key and value in text views
	* to make them editable by user  
    */
	public function editfield($id){
		$field = \DB::table('fields')->select()->where('field_id','=',$id)
		                                       ->where('field_status','=','exist')->get();
    	return view('field.editfield',['field'=>$field]);
	}

	/**
    * Handle edit function receives the reqested field's ID , key and value
    * and update it's key and value in fields datababse table 
    */
    public function handleEdit(Request $request){
    $this->validate($request, Field::$create_field_validation_rules);
    $data = $request->only('id','field_key','field_value');
    	\DB::table('fields')->where('field_id','=',$data['id'])
    	                    ->update(['field_key'=>$data['field_key'],'field_value' => $data['field_value']]); 
    	\Session::flash('message','Field updated successfully.');
    	return redirect()->route('viewfields');
    }

}
