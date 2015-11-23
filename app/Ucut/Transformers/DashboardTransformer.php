<?php namespace Ucut\Transformers;
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/18/2015
 * Time: 6:26 PM
 */




class DashboardTransformer extends Transformer
{
    public function transform($key)
    {
        return [

            'url_id' => $key['id'],
            'full_url' => $key['url'],
            'user_id' => $key['user_id'],
            'unique_key' => $key['key']

        ];
    }
}
