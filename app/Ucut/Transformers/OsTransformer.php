<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/25/2015
 * Time: 6:47 PM
 */

namespace Ucut\Transformers;


class OsTransformer extends Transformer
{
    public function transform($os_data)
    {
        $arr = [];

        for($i=0;$i<count($os_data);$i++)
        {
            array_push($arr, [
                'Operating_system' => $os_data[$i]['os'],
                'Hits' => $os_data[$i]['hits']
            ]);

        }
        return $arr;
    }

}