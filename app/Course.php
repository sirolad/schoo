<?php

namespace Schoo;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course', 'description', 'url', 'section'];

    /**
     * many to one relationship
     * many courses belong to a user.
     * @return string
     */
    public function user()
    {
        return $this->belongsTo('Schoo\User');
    }

    /**
     * Set scope for personal courses.
     * @param  string
     * @return string
     */
    public function scopePersonal($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
