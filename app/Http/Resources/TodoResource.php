<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    return [
		    'type'          => 'todos',
		    'id'            => (string)$this->id,
		    'attributes'    => [
			    'name' => $this->name,
		    ],
	    ];
    }
}
