<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [ 'image_name','image', 'image_discription','user_id','category_id'];

    public function user(){
        return $this->belongsTo(user::class ,'user_id');
    }
    public function category(){
        return $this->belongsTo(category::class ,'category_id');
    }
}
