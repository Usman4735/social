<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    use HasFactory;

    public function members() {
        $members = explode(",", $this->group_members);
        $fetched_members = [];
        foreach($members as $member) {
            $fetched_member = Admin::find($member);
            $fetched_members[] = $fetched_member->first_name." ".$fetched_member->last_name;
        }
        return implode(", ", $fetched_members);
    }
}
