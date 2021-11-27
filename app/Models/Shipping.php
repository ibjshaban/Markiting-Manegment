<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Shipping extends Model {

  protected $table    = 'shippings';
  protected $fillable = [
    'id',
    'admin_id',
    'country',
    'vehicle_types',
    'cost',
    'shipping_type',
    'count',
    'created_at',
    'updated_at',
  ];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
 public function admin_id() {
  return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
}


 	/**
    * Static Boot method to delete or update or sort Data
    * @param void
    * @return void
    */
   protected static function boot() {
    parent::boot();
      // if you disable constraints should by run this static method to Delete children data
    static::deleting(function($shipping) {
    });
  }
  
}
