<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $recurrence_rule_id
 * @property string $frequency
 * @property string $until_date_time
 * @property float $count_number
 * @property float $interval_number
 * @property string $by_second_list
 * @property string $by_minute_list
 * @property string $by_hour_list
 * @property string $by_day_list
 * @property string $by_month_day_list
 * @property string $by_year_day_list
 * @property string $by_week_no_list
 * @property string $by_month_list
 * @property string $by_set_pos_list
 * @property string $week_start
 * @property string $x_name
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property RecurrenceInfo[] $recurrenceInfosByExceptionRuleId
 * @property RecurrenceInfo[] $recurrenceInfos
 */
class RecurrenceRule extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'recurrence_rule';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'recurrence_rule_id';

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
    protected $fillable = ['frequency', 'until_date_time', 'count_number', 'interval_number', 'by_second_list', 'by_minute_list', 'by_hour_list', 'by_day_list', 'by_month_day_list', 'by_year_day_list', 'by_week_no_list', 'by_month_list', 'by_set_pos_list', 'week_start', 'x_name', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recurrenceInfosByExceptionRuleId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\RecurrenceInfo', 'exception_rule_id', 'recurrence_rule_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recurrenceInfos()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\RecurrenceInfo', 'recurrence_rule_id', 'recurrence_rule_id');
    }
}
