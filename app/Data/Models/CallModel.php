<?php

namespace App\Data\Models;

class CallModel extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'calls';

    /**
     * @var array
     */
    protected $fillable = [
        'protocol_number',
        'committee_id',
        'person_id',
        'call_type_id',
        'area_id',
        'subject',
        'original',
        'rectified',
        'rectified_at',
        'rectified_by_id',
        'answer_address_id',
        'send_answer_by_email',
        'answer',
        'answered_at',
        'answered_by_id',
    ];
}
