<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $service_name
 * @property string $locked_by_instance_id
 * @property string $lock_thread
 * @property string $lock_time
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class ServiceSemaphore extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'service_semaphore';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'service_name';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['locked_by_instance_id', 'lock_thread', 'lock_time', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
