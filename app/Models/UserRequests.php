<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequests extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_requests';

    public function payment()
    {
        return $this->hasOne('App\Models\UserPayment', 'user_uuid', 'user_uuid');
    }
}
