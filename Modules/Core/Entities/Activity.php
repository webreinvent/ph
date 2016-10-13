<?php

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
	use SoftDeletes;

	//-------------------------------------------------
	protected $table = 'core_activities';
	//-------------------------------------------------
	protected $dates = [
		'created_at', 'updated_at', 'deleted_at'
	];
	//-------------------------------------------------
	protected $dateFormat = 'Y-m-d H:i:s';
	//-------------------------------------------------

	protected $fillable = [
		'type', 'slug', 'title', 'meta', 'table_name', 'table_id',
		'created_by', 'updated_by', 'deleted_by'
	];
	//-------------------------------------------------
	public function setLabelAttribute($value)
	{
		$this->attributes['label'] = strtoupper($value);
	}
	//-------------------------------------------------
	public function scopeCreatedBy($query, $user_id)
	{
		return $query->where('created_by', $user_id);
	}
	//-------------------------------------------------
	public function scopeUpdatedBy($query, $user_id)
	{
		return $query->where('updated_by', $user_id);
	}
	//-------------------------------------------------
	public function scopeDeletedBy($query, $user_id)
	{
		return $query->where('deleted_by', $user_id);
	}
	//-------------------------------------------------
	public function scopeCreatedBetween($query, $from, $to)
	{
		return $query->whereBetween('created_at', array($from, $to));
	}
	//-------------------------------------------------
	public function scopeUpdatedBetween($query, $from, $to)
	{
		return $query->whereBetween('updated_at', array($from, $to));
	}
	//-------------------------------------------------
	public function scopeDeletedBetween($query, $from, $to)
	{
		return $query->whereBetween('deleted_at', array($from, $to));
	}
	//-------------------------------------------------
}
