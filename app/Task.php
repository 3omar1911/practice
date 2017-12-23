<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	public function scopePassedRate($query, $rate) {

		$ts = $query->where('rate', '>=', $rate);

		return $ts;

	}

	public function user() {
    	return $this->belogsTo('App\User');
    }
    
}
