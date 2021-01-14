<?php

namespace mywishlist\models;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    public $timestamps = false;
    protected $table = "reservation";
    protected $primaryKey = "idItem";

    public function Item(){
        return $this->hasOne('mywishlist\models\Item', 'id');
    }
}