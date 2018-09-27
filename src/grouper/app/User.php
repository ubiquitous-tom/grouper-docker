<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * User
 *
 * @category Description
 *
 * @package Category
 *
 * @author Name <email@email.com>
 *
 * @license http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 * @link http://url.com
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Has many relationship for user and ariticles
     *
     * @return void
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id', 'id');
    }

}
