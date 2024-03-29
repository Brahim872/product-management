<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cookie;

class UserResource extends JsonResource
{

    protected $invite, $token;

    /**
     *
     * @param $resource
     * @param null $token
     */

    public function __construct($resource, /*$invite = false,*/ $token = null)
    {
        parent::__construct($resource);
//        $this->invite = $invite;
        $this->token = $token;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' =>  !is_null($this->roles->first())? $this->roles->first()->name:null,
        ];
    }
}
