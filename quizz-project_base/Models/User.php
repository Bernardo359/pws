<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $fillable = ['username', 'password', 'isAdmin'];
    protected $table = 'users';
    public $timestamps = false;
}