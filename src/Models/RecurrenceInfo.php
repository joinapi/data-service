<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Joinbiz\Data\Models\Accounting\Invoice;
use Joinbiz\Data\Models\Order\ShoppingList;
use Joinbiz\Data\Models\Product\ProductAssoc;
use Joinbiz\Data\Models\Workeffort\WorkEffort;

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
 * @property ProductAssoc[] $productAssocs
 * @property WorkEffort[] $workEfforts
 * @property JobSandbox[] $jobSandboxes
 * @property RecurrenceRule $recurrenceRuleByExceptionRuleId
 * @property RecurrenceRule $recurrenceRule
 * @property ShoppingList[] $shoppingLists
 * @property Invoice[] $invoices
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
    public function productAssocs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\ProductAssoc', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\WorkEffort', 'recurrence_info_id', 'recurrence_info_id');
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
        return $this->hasMany('Joinbiz\Data\Models\Service\ShoppingList', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\Invoice', 'recurrence_info_id', 'recurrence_info_id');
    }
}
