<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id' => $this->id,
            'firstname' => $this->Firstname,
            'surname' => $this->Surname,
            'date_of_birth' => $this->DateOfBirth,
            'phone_number' => $this->PhoneNumber,
            'email' => $this->Email,
        ];
    }
}
