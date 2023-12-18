<?php

namespace Tests\Feature;

use App\Http\Controllers\OauthController;
use Google_Client;
use Google_Service_Gmail;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class OauthControllerTest extends TestCase {

	public function testSendOtpEmail() {
		// Membuat instance Request palsu
		$request = Mockery::mock(Request::class);

		// Membuat instance GmailController
		$controller = new OauthController();

		// Mengeset nilai environment variables palsu
		config([
			'services.gmail.client_id' => 'dummy_client_id',
			'services.gmail.client_secret' => 'dummy_client_secret',
			'services.gmail.redirect' => 'dummy_redirect_uri',
		]);

		// Membuat instance Google_Client palsu
		$client = Mockery::mock(Google_Client::class);
		$client->shouldReceive('setClientId')->with('dummy_client_id')->once();
		$client->shouldReceive('setClientSecret')->with('dummy_client_secret')->once();
		$client->shouldReceive('setRedirectUri')->with('dummy_redirect_uri')->once();
		$client->shouldReceive('setScopes')->with(Google_Service_Gmail::GMAIL_SEND)->once();

		// Mengecek apakah method users_messages->send dipanggil dengan parameter yang benar
		$service = Mockery::mock(Google_Service_Gmail::class);
		$service->shouldReceive('users_messages->send')->with('me', Mockery::type('Google_Service_Gmail_Message'))->once();

		// // Mengganti instance Google_Client dan Google_Service_Gmail asli dengan yang palsu menggunakan "mockery"
		// $controller->setClient($client);
		// $controller->setService($service);

		// Menjalankan method sendOtpEmail
		$controller->sendOtpEmail($request);
	}

}
