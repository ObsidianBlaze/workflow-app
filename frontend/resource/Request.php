<?php


namespace frontend\resource;


class Request extends \common\models\Request
{
    public function fields()
    {
        return ['id', 'status', 'user_id','request_clearance_level','request'];
    }

}
