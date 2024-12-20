<?php

namespace Joinbiz\Data\Models\Service;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $temp_expr_id
 * @property string $temp_expr_type_id
 * @property string $description
 * @property string $date1
 * @property string $date2
 * @property float $integer1
 * @property float $integer2
 * @property string $string1
 * @property string $string2
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property WorkEffort[] $workEfforts
 * @property JobSandbox[] $jobSandboxes
 * @property TemporalExpressionAssoc[] $temporalExpressionAssocsByFromTempExprId
 * @property TemporalExpressionAssoc[] $temporalExpressionAssocsByToTempExprId
 */
class TemporalExpression extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'temporal_expression';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'temp_expr_id';

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
    protected $fillable = ['temp_expr_type_id', 'description', 'date1', 'date2', 'integer1', 'integer2', 'string1', 'string2', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffort', 'temp_expr_id', 'temp_expr_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobSandboxes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\JobSandbox', 'temp_expr_id', 'temp_expr_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temporalExpressionAssocsByFromTempExprId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\TemporalExpressionAssoc', 'from_temp_expr_id', 'temp_expr_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function temporalExpressionAssocsByToTempExprId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Service\TemporalExpressionAssoc', 'to_temp_expr_id', 'temp_expr_id');
    }
}
