<?php

namespace mywishlist\models;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model{
    protected $primaryKey='uid';
    protected $table = "user";
    public $timestamps = false;
    public $incrementing = false;

    public function listes(){
        return $this->hasMany("mywishlist\models\Liste", "user_id", 'uid');
    }

    public function reservation(){
        return $this->hasMany("mywishlist\models\Reservation", "userID");
    }
}