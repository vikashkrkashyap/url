<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/25/2015
 * Time: 6:42 PM
 */

namespace Ucut\Transformers;


class CityTransformer extends Transformer
{
    public function transform($city_data)
    {
        $arr = [];

        for($i=0;$i<count($city_data);$i++)
        {
            array_push($arr, [
                'City' => $city_data[$i]['city'],
                'Hits' => $city_data[$i]['hits']
            ]);

        }
        return $arr;
    }

}