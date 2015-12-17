<?php

namespace Schoo;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements
AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'uid', 'provider'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the avatar from gravatar.
     *
     * @return string
     */
    private function getAvatarFromGravatar()
    {
        return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=500';
    }

    /**
     * Get avatar from the model.
     *
     * @return string
     */
    public function getAvatar()
    {
        return (!is_null($this->avatar_url)) ? $this->avatar_url : $this->getAvatarFromGravatar();
    }

    /**
     * Updates each field of the Account setting page.
     *
     * @param string $formData
     *
     * @return string
     */
    public function updateProfile($formData)
    {
        foreach ($formData as $key => $value) {
            if (!empty($value)) {
                $this->$key = $value;
            }
        }

        $this->save();
    }

    /**
     * update users Avatar.
     *
     * @param  file
     *
     * @return void
     */
    public function updateAvatar($img)
    {
        $this->avatar_url = $img;

        $this->save();
    }
}
