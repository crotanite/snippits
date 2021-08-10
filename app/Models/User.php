<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\Invite;
use App\Models\Snippet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Indicates if the IDs are auto-incrementing.
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	/**
	* The "booting" method of the model.
	*
	* @return void
	*/
   protected static function boot()
   {
	   parent::boot();

       User::creating(function($model) {
           $model->id = Uuid::uuid4()->toString();
       });
   }

   /**
    * Fetch the invites this user has created.
    */
    public function invites()
    {
        return $this->hasMany(Invite::class, 'user_id', 'id');
    }

   /**
    * Fetch the snippets this user has created.
    */
   public function snippets()
   {
       return $this->hasMany(Snippet::class);
   }
}
