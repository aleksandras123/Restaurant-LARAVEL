<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Savybes, kurias galima pasiimti
    // public $store = 'ebay';
    public function categories() {
      // Create connection with Category model
      return $this->hasOne('App\Category', 'id', 'category');
    }

    public function manufacturers(){
      return $this->hasOne('App\Manufacturer', 'id', 'manufacturer');
    }
}
