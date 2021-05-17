<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'country';
    
    protected $fillable = [
          'name',
          'continent_id',
          'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    

    public static function boot()
    {
        parent::boot();

        Country::observe(new UserActionsObserver);
    }
    
    public function continent()
    {
        return $this->hasOne('App\Continent', 'id', 'continent_id');
    }


    
    
    
}