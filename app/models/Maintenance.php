<?php
class Maintenance extends Eloquent {

    public function Client(){
        return $this->belongsTo('Client');
    }
}