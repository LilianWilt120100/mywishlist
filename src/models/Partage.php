<?php


namespace mywishlist\models;


use Illuminate\Database\Eloquent\Model;

class Partage extends Model {

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "partage";

    public function liste() {
        return $this->belongsTo('mywishlist\models\Liste', "idliste");
    }

}
