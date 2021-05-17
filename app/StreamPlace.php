<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class StreamPlace extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'streamplace';
    
    protected $fillable = ['name'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function boot()
    {
        parent::boot();

        StreamPlace::observe(new UserActionsObserver);
    }
    
    
    
    
}