<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $runtime_data_id
 * @property string $runtime_info
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property WorkEffort[] $workEfforts
 * @property JobSandbox[] $jobSandboxes
 * @property ApplicationSandbox[] $applicationSandboxes
 */
class RuntimeData extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'runtime_data';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'runtime_data_id';

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
    protected $fillable = ['runtime_info', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffort', 'runtime_data_id', 'runtime_data_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSandboxes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\JobSandbox', 'runtime_data_id', 'runtime_data_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applicationSandboxes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\ApplicationSandbox', 'runtime_data_id', 'runtime_data_id');
    }
}
