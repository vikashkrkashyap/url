<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/25/2015
 * Time: 6:29 PM
 */

namespace Ucut\Transformers;


class ReferralTransformer extends Transformer
{

    public function transform($referral_data)
    {
        $arr = [];

            for($i=0;$i<count($referral_data);$i++)
        {
            array_push($arr, [
                'Website' => $referral_data[$i]['website'],
                'Hits' => $referral_data[$i]['hits']
            ]);

        }
      return $arr;
    }
}