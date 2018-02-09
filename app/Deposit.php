<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $guarded = [
      'id', 'created_at'
  ];

    protected $hidden = [
      'updated_at'
  ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
