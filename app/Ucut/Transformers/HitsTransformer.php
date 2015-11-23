<?php
/**
 * Created by PhpStorm.
 * User: vikash
 * Date: 11/21/2015
 * Time: 3:49 PM
 */

namespace Ucut\Transformers;


class HitsTransformer extends Transformer
{
    public function transform($hits)
    {
        $arr = [];
        for($i=0;$i<count($hits);$i++) {

            //return count($hits);
            array_push($arr,
                [
                    'Day' => $hits[$i]['date'],
                    'Hits' => $hits[$i]['hits'],
                ]);
        }

        return $arr;
    }

}