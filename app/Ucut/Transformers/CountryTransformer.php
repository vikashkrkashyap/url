<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/25/2015
 * Time: 6:39 PM
 */

namespace Ucut\Transformers;


class CountryTransformer extends Transformer
{
    public function transform($country_data)
    {
        $arr = [];

        for($i=0;$i<count($country_data);$i++)
        {
            array_push($arr, [
                'Country' => $country_data[$i]['country'],
                'Hits' => $country_data[$i]['hits']
            ]);

        }
        return $arr;
    }
}