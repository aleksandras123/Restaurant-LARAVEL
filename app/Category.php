<?php
// modelis
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function products() {
    // Create connection with Category model
    return $this->hasOne('App\Product', 'id', 'product');
  }

  public function manufacturers(){
    return $this->hasOne('App\Manufacturer', 'id', 'manufacturer');
  }
}
