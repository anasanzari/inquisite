<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model {

	//
	public $timestamps = false;
	protected $table = 'articles';
	protected $fillable = ['name','author','month','year','content'];

	public function getMonthAttribute($value){
		//try with carbon next time.
		  $date = Carbon::parse('2010/'.$value.'/01');
      return $date;
  }

}
