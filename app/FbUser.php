<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FbUser extends Model {

	//
	public $timestamps = false;
	protected $table = 'fb_users';
	protected $fillable = ['fbid','name'];

	public function stories()
	 {
			 return $this->hasMany('App\Story');
	 }

}
