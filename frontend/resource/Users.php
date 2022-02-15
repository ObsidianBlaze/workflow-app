<?php


namespace frontend\resource;


class Users
{
    public function fields()
    {
        return ['id', 'firstname','lastname','email','level_id','dept_id'];
    }

}