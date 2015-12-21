<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sticker extends Model {

	//
	public $timestamps = false;
	protected $table = 'stickers';
	protected $fillable = ['url'];


}
