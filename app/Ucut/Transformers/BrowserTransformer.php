<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/25/2015
 * Time: 6:45 PM
 */

namespace Ucut\Transformers;


class BrowserTransformer extends transformer
{
    public function transform($browser_data)
    {
        $arr = [];

        for($i=0;$i<count($browser_data);$i++)
        {
            array_push($arr, [
                'Browser' => $browser_data[$i]['browser'],
                'Hits' => $browser_data[$i]['hits']
            ]);

        }
        return $arr;
    }
}