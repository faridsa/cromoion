<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property tinyInteger $approved
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'approved', 'role_id'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    
    public function internalNotifications()
    {
        return $this->belongsToMany(InternalNotification::class)
            ->withPivot('read_at')
            ->orderBy('internal_notification_user.created_at', 'desc')
            ->limit(10);
    }
}
