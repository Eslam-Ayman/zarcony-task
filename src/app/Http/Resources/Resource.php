<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /*public function with($request)
    {
        return [
            'success'=>true,
            'message'=>'تم تحميل البيانات'
        ];
    }*/
    
    /*public static function collection($resource)
    {
        /*$collection = JsonResource::collection($resource);
        return $collection;
        // return json_encode(['qqqq'=>$collection,]);
        return ['qqqq'=>$collection,];
        return ['sss'=>'qqq', 'data'=>$collection,];*
        /*dd($collection->resource);
        dd(parent::toArray($collection));*
        return [
            'success'=>true,
            'message'=>'تم تحميل البيانات',
            'data'=>JsonResource::collection($resource)->resource,
        ];
    }*/
}