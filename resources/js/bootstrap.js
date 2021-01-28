window._ = require('lodash');

// window.base_url = "http://127.0.0.1:8000/";

window.base_url = "http://examportal.com/";

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('bootstrap');

window.$ = window.jQuery = require('jquery');

window.Swal = require('sweetalert2');

window.confirm = function( text ){
	return Swal.fire({
		titleText: "Are you sure?",
		text: text,
		showDenyButton: true,
		confirmButtonText: `Register`,
		denyButtonText: `Cancel`,
	    confirmButtonColor: "#3165ff",
	    cancelButtonColor: "#999999",
	    focusConfirm: true,
	    focusCancel: false
	});
}

window.alert_swal = function( text ){
	return Swal.fire({
		text: text,
		confirmButtonColor: "#3165ff",
		focusConfirm: true
	});
}

window.h = 60*60*1000;
window.m = 60*1000;
window.s = 1000;

window.calculate_time_left = ( time_limit, started_at )=>{

	const currentdate = new Date();
	const secondsSinceStart = currentdate - started_at;
	// const time_limit_array = time_limit.split(":").map( x => parseInt(x) );
	const time_limit_array = time_limit.map( x => parseInt(x) );
	
	const time_limit_seconds = ( time_limit_array[0]*h ) + ( time_limit_array[1]*m ) + ( time_limit_array[2]*s );
	const time_left = time_limit_seconds - secondsSinceStart;
	return time_left;

}

window._countdown = time_left => {
	let time_left_temp = time_left;
	let hours = Math.floor( time_left_temp / h );
	time_left_temp = time_left_temp - ( hours * h );
    let mins =  Math.floor( time_left_temp / m );
    time_left_temp = time_left_temp - ( mins * m );
    let seconds = Math.floor( time_left_temp / s );

    if( hours < 10){
    	hours = '0' + hours;
    }

    if( mins < 10){
    	mins = '0' + mins;
    }

    if( seconds < 10){
    	seconds = '0' + seconds;
    }

    const _time_left = "#set_time_left";
    const _hours_left = "#hours_left";
    const _mins_left = "#mins_left";
    const _secs_left = "#secs_left";

    $( _time_left + ' ' + _hours_left ).text( hours );
    $( _time_left + ' ' + _mins_left ).text( mins );
    $( _time_left + ' ' + _secs_left ).text( seconds );

    time_left = time_left - s;

    return time_left;
}

window.exam_ended = interval => {
	clearInterval( interval );
	//ajax request to get time left
	alert_swal( "Time Limit Exceeded" );
}

window.loaderOn = _ => {

	$( document ).ready( _=>{
		$(".loader").removeClass( 'd-none' );
	} );

}

window.loaderOff = _ => {

	$( document ).ready( _=>{
		$(".loader").addClass( 'd-none' );
	} );
	
}



/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
