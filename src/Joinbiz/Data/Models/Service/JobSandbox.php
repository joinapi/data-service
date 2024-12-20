<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $job_id
 * @property string $status_id
 * @property string $auth_user_login_id
 * @property string $run_as_user
 * @property string $runtime_data_id
 * @property string $recurrence_info_id
 * @property string $temp_expr_id
 * @property string $job_name
 * @property string $run_time
 * @property float $run_time_epoch
 * @property string $pool_id
 * @property string $parent_job_id
 * @property string $previous_job_id
 * @property string $service_name
 * @property string $loader_name
 * @property float $max_retry
 * @property float $current_retry_count
 * @property float $current_recurrence_count
 * @property float $max_recurrence_count
 * @property string $run_by_instance_id
 * @property string $start_date_time
 * @property string $finish_date_time
 * @property string $cancel_date_time
 * @property string $job_result
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property UserLogin $userLoginByAuthUserLoginId
 * @property RecurrenceInfo $recurrenceInfo
 * @property RuntimeData $runtimeData
 * @property StatusItem $statusItem
 * @property TemporalExpression $temporalExpression
 * @property UserLogin $userLoginByRunAsUser
 * @property ProductGroupOrder[] $productGroupOrders
 */
class JobSandbox extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'job_sandbox';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'job_id';

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
    protected $fillable = ['status_id', 'auth_user_login_id', 'run_as_user', 'runtime_data_id', 'recurrence_info_id', 'temp_expr_id', 'job_name', 'run_time', 'run_time_epoch', 'pool_id', 'parent_job_id', 'previous_job_id', 'service_name', 'loader_name', 'max_retry', 'current_retry_count', 'current_recurrence_count', 'max_recurrence_count', 'run_by_instance_id', 'start_date_time', 'finish_date_time', 'cancel_date_time', 'job_result', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByAuthUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'auth_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurrenceInfo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\RecurrenceInfo', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function runtimeData()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\RuntimeData', 'runtime_data_id', 'runtime_data_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temporalExpression()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\TemporalExpression', 'temp_expr_id', 'temp_expr_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByRunAsUser()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Security\UserLogin', 'run_as_user', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productGroupOrders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductGroupOrder', 'job_id', 'job_id');
    }
}
