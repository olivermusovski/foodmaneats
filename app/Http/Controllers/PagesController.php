<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
use GuzzleHttp\Client;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('id', 'DESC')->limit(6)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {

		$first = 'Oliver';
		$last = 'Musovski';
		$fullname = $first." ".$last;
		$email = 'oliver.musovski@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		
		$token = $request->input('g-recaptcha-response');

		if($token) {
			$client = new Client();
			$response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
				'form_params' => [
					'secret' => '6Ldgd1wUAAAAAEoox1M5tVQbP02cknHbKcD65-PJ',
					'response' => $token
				]
			]);
			$result = json_decode($response->getBody()->getContents());
		} else {
			Session::flash('error', 'Invalid captcha token');
			return redirect('contact');
		}

		if($result->success) {

			$this->validate($request, [
				'email' => 'required|email',
				'subject' => 'min:3',
				'message' => 'min:10'
			]);

			$data = [
				'email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message
			];

			Mail::send('emails.contact', $data, function($message) use ($data) {
				$message->from($data['email']);
				$message->to('hello@olivermusovski.com');
				$message->subject($data['subject']);
			});

			Session::flash('success', 'Your Email was sent!');

			return redirect('contact');
		} else {

			Session::flash('error', 'You are probably a robot!');
			return redirect('contact');
		}
	}

}
