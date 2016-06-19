<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    
	
	protected $table = 'fields';
	
	/**
	* Create field validation rules that it  
	* doesn't allow user to enter an empty field key or value
	* and also doesn't allow to enter special characters  
	*/
    public static $create_field_validation_rules = [
    	'field_key'=>'required|regex:/(^[A-Za-z0-9 ]+$)+/',
    	'field_value'=>'required|regex:/(^[A-Za-z0-9 ]+$)+/',
    ];


}
