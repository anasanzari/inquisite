<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model {

	//
	public $timestamps = false;
	protected $table = 'interviews';
	protected $fillable = ['person','content','intro'];


}
