<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $primaryKey = 'card_for_sale';
    public $incrementing = false;
    protected $keyType = 'string';
    
    use HasFactory;
    
    public function cardsforsale(){
    	return $this->hasMany(Card::class);
    }
}
