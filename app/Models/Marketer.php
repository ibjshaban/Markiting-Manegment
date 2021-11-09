<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.32]
// Copyright Reserved  [it v 1.6.32]
class Marketer extends Authenticatable {

protected $table    = 'marketers';
protected $fillable = [
		'id',
		'admin_id',
        'name_ar',
        'name_en',
        'email',
        'password',
        'mobile',
        'amount-due',
        'amount_paid',
        'address_ar',
        'address_en',
        'photo_profile',
        'remember_token',
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
         static::deleting(function($marketer) {
         });
   }

    public function role($name) {
        $exists_group_id = $this->getConnection()
            ->getSchemaBuilder()
            ->hasColumn($this->getTable(), 'group_id');
        if ($exists_group_id) {
            $explode_name = explode('_', $name);

            if (!empty($this->group_id()->first())) {
                $role = $this->group_id()->first()->role()->where('name', $explode_name[0])->first();
                if (!empty($role) && $role->{$explode_name[1]} == 'yes') {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
