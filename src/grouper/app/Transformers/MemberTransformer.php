<?php

namespace App\Transformers;

use App\Member;
use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Member $member)
    {
        return [
            'id' => $member->id,
            'first_name' => $member->first_name,
            'middle_name' => $member->middle_name,
            'last_name' => $member->last_name,
            'email' => $member->email,
            'phone_number' => $member->phone_number,
            'company' => $member->company,
            'status' => ($member->status) ? 'Active' : 'Inactive',
        ];
    }
}
