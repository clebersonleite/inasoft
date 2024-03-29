<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cargo' => $this->cargo,
<<<<<<< HEAD
            'fkCodChurch' => $this->fkCodChurch,
            'church' => new ChurchResource($this->whenLoaded('church')),
=======
>>>>>>> origin/master
            'created' => Carbon::make($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
