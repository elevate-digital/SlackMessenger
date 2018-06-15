<?php
namespace SlackMessenger;
class SlackMessenger
{
	public function send($url, $message){
		try{
			$curl = curl_init();
			$data_string = json_encode([
				"text" => $message
			]);

			curl_setopt($curl, CURLOPT_URL,$url);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					'Content-Length: ' . strlen($data_string))
			);


			$response = curl_exec ($curl);
			curl_close ($curl);
		} catch (\Exception $e){
			return false;
		}
		return true;
	}
}