<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;


class NoticeResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle ?? null,
            'url' => $this->url ?? null,
            'image' => asset($this->image)
        ];
    }
}
