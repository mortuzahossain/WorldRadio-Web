<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'station';
    
    protected $fillable = [
          'name',
          'frequency',
          'image',
          'stream_url',
          'streamplace_id',
          'country_id',
          'category_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public static function boot()
    {
        parent::boot();

        Station::observe(new UserActionsObserver);
    }
    
    public function streamplace()
    {
        return $this->hasOne('App\StreamPlace', 'id', 'streamplace_id');
    }


    public function country()
    {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }


    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }


    
    
    
}