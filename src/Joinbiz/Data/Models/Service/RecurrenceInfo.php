<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $recurrence_info_id
 * @property string $exception_rule_id
 * @property string $recurrence_rule_id
 * @property string $start_date_time
 * @property string $exception_date_times
 * @property string $recurrence_date_times
 * @property float $recurrence_count
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property WorkEffort[] $workEfforts
 * @property Invoice[] $invoices
 * @property ProductAssoc[] $productAssocs
 * @property JobSandbox[] $jobSandboxes
 * @property RecurrenceRule $recurrenceRuleByExceptionRuleId
 * @property RecurrenceRule $recurrenceRule
 * @property ShoppingList[] $shoppingLists
 */
class RecurrenceInfo extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'recurrence_info';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'recurrence_info_id';

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
    protected $fillable = ['exception_rule_id', 'recurrence_rule_id', 'start_date_time', 'exception_date_times', 'recurrence_date_times', 'recurrence_count', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffort', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Invoice', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productAssocs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductAssoc', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSandboxes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\JobSandbox', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurrenceRuleByExceptionRuleId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\RecurrenceRule', 'exception_rule_id', 'recurrence_rule_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurrenceRule()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\RecurrenceRule', 'recurrence_rule_id', 'recurrence_rule_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingLists()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ShoppingList', 'recurrence_info_id', 'recurrence_info_id');
    }
}
