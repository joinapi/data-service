<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $instance_id
 * @property string $from_date
 * @property string $reason_enum_id
 * @property string $thru_date
 * @property string $comments
 * @property string $created_date
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Enumeration $enumerationByReasonEnumId
 */
class JobManagerLock extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'job_manager_lock';

    /**
     * @var array
     */
    protected $fillable = ['reason_enum_id', 'thru_date', 'comments', 'created_date', 'created_by_user_login', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByReasonEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Enumeration', 'reason_enum_id', 'enum_id');
    }
}
