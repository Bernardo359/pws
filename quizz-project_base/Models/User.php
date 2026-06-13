<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $fillable = ['username', 'password', 'is_admin'];
    protected $table = 'users';
    public $timestamps = false;
}