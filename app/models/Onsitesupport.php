<?php
class Onsitesupport extends Eloquent {

    public function maintenance(){
        return $this->belongsTo('Maintenance');
    }

}