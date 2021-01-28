<?php

namespace App\Helpers\Traits;

use Carbon\Carbon;

trait DateTime{

	public function getDateTime( $date ){
		
		$date = Carbon::createFromFormat( config( 'app.datetimeformat' ),  $date );
		return [
			'day' => $date->day > 9 ? strval( $date->day ) : '0'.$date->day ,
			'month' => $date->month > 9 ? strval( $date->month ) : '0'.$date->month ,
			'year' => $date->year > 9 ? strval( $date->year ) : '0'.$date->year ,
			'hour' => $date->hour > 9 ? strval( $date->hour ) : '0'.$date->hour ,
			'minute' => $date->minute > 9 ? strval( $date->minute ) : '0'.$date->minute ,
			'second' => $date->second > 9 ? strval( $date->second ) : '0'.$date->second ,
		];

	}

	public function getTime( $time ){

		$date = Carbon::createFromFormat( config( 'app.timeformat' ),  $time );
		return [
			'hour' => $date->hour > 9 ? strval( $date->hour ) : '0'.$date->hour ,
			'minute' => $date->minute > 9 ? strval( $date->minute ) : '0'.$date->minute,
			'second' => $date->second > 9 ? strval( $date->second ) : '0'.$date->second ,
		];

	}

	public function getPendingDuration( $date ){

		return Carbon::createFromFormat( config( 'app.datetimeformat' ),  $date )->longAbsoluteDiffForHumans();

	}

}