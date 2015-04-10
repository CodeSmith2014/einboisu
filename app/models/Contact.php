<?php
class Contact extends Eloquent{
	public function clients(){
		return $this->belongsToMany('Client');
	}

	public function scopeName($query, $term){
		return $query->where('name','like','%'.$term.'%')->get();
	}
}