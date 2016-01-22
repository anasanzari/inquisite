<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model {

	//
	public $timestamps = false;
	protected $table = 'stories';
	protected $fillable = ['userid','person','place','stickerid','content'];

	public function user()
    {
        return $this->belongsTo('App\FbUser','userid');
    }

}
