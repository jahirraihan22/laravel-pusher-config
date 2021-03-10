# Steps to setup pusher in laravel:

<hr>

##### 1. change in .env
	BROADCAST_DRIVER=pusher

<br>

##### 2. in config/app.php uncomment this line 
	App\Providers\BroadcastServiceProvider::class

##### also in config/broadcasting.php

	'connections' => [
        'pusher' => [
			...

			'options' => [
			...

			'cluster' => env('PUSHER_APP_CLUSTER',
			'encrypted' => true
				],
				...
		]
		...
	]

<br>

##### 3. install pusher client
	composer require pusher/pusher-php-server
        
<br>

##### 4. create app in  [pusher](https://www.pusher.com)

<br>

##### 5. get this credential
	app_id = "XXX"
	key = "XXXXXXXX"
	secret = "XXXXXX"
	cluster = "XXX"

<br>

##### 6. and add this value in .env file
	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	PUSHER_APP_CLUSTER=

<br>

##### 7. add event in app/providers/EventProviders.php
	protected $listen = [
	...

	'App\Events\AnyNameOfEvent' => [
            'App\Listeners\AnyNameOfEventListeners'
        ]
	]

<br>

##### 8. to generate Event run this 
	php artisan event:generate

<br>

##### 9. Now go Event/AnyNameOfEvent.php and implements this class with <b>ShouldBroadcast</b>
	class AnyNameOfEvent implements ShouldBroadcast

<br>

##### 10. In this Event file add channel 
	public function broadcastOn()
    {

	// either public chnanel or private channel, by default in laravel 8 there will be given public chnanel and I edit this to public channel

        return new Channel('channel-name');
    }

##### 11. To check this event in web.php define a route

	Route::get('/fire', function () {
    	event(new AnyNameOfEvent);
    	return ('Event has been fired');
	});

##### 12. You need to go debug console of [pusher](https://www.pusher.com), if you see connection success then congrats.....
