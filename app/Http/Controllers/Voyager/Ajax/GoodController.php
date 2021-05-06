<?php

namespace App\Http\Controllers\Voyager\Ajax;
use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\GoodsAttributes;
use Illuminate\Http\Request;


class GoodController extends Controller
{


    public function attributes(Request $request)
    {
        $result=false;
        if($request->ajax() && !empty($request->all()))
        {
            $data=$request->all();

            $good=Good::find($data['good_id']);
            if ($good) {
                $good->attributes()->detach();

                $params=@array_combine($data['params'],$data['values']);

                $item=[];
                foreach ($params as $key => $value) {
                    $item[]=['good_id'=>$good->id, 'attr_id'=>$key, 'value'=>$value];
                }

                foreach ($item as $create) {
                    $attribute= new GoodsAttributes;
                    $attribute->good_id=$create['good_id'];
                    $attribute->attr_id=$create['attr_id'];
                    $attribute->value=$create['value'];
                    $attribute->save();
                }

                $result='success';
            }

        }

        return response()->json(['result' => $result]);
    }
}
