<?php

class DBModel
{
    use Model;

    protected string $table = 'users';
    protected string $primaryKey = 'UserID';
    protected $allowedColumns = [
        'name',
        'email',
        'psw'
    ];
}