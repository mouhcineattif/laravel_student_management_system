<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $val = parent::toArray($request);
        $val['created_at'] = date_create($val['created_at'])->format('Y-m-d');
        $val['updated_at'] = date_create($val['updated_at'])->format('Y-m-d');
        // $val['deleted_at'] = date_create($val['deleted_at'])->format('Y-m-d');
        if(isset($val['image'])){

            $val['image'] = (url('/').'/storage/'.$val['image']);
        }
        // dd($val);
        return $val;
    }
    public static function collection($resource){
        // dd($resource->count());
        $values = parent::collection($resource)->additional([
            'number_of_elements' => $resource->count()
        ]);
        return ($values);
    }
}
