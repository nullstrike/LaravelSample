<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	/**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status'];
    protected $dates = ['expiration_date'];
    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getStatusAttribute()
    {
    	date_default_timezone_set('Asia/Manila');

        $exp_date = date('Y-m-d', strtotime($this->attributes['expiration_date']));
        $warn_date = date('Y-m-d', strtotime('-7 Days', strtotime($exp_date)));
        $now = date('Y-m-d');
         //return $warn_date ;
        if ($now > $exp_date) {
        	return 'expired';
        }

        if ($now === $warn_date) {
        	return 'warning';
        }

       return 'valid';
        

       
    }

 



}
