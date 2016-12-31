<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = ['name', 'quantity','price','total_value']; 
     protected $name,$quantity,$price,$total_value;
     protected function setTotalValue($totalValue)
     {
     	$this->total_value = $totalValue;
     }
}
