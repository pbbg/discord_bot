<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Reddit
{

    private $guzzle;

    private $token;

    public function __construct()
    {
        $this->guzzle = new Client([
            'headers' => [
                'User-Agent' => 'cron:pbbg-reddit-feed:v1 (By /u/pbbg-bot)'
            ]
        ]);
    }

    public function getAuthorization()
    {

        try {
            $req = $this->guzzle->post('https://ssl.reddit.com/api/v1/access_token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'username' => env('REDDIT_USERNAME'),
                    'password' => env('REDDIT_PASSWORD'),
//                    'client_id' =>  env('REDDIT_CLIENT_ID'),
//                    'secret'    =>  env('REDDIT_SECRET')
                ],
                'auth' => [env('REDDIT_CLIENT_ID'), env('REDDIT_SECRET')]
            ]);

            $body = json_decode($req->getBody());

            $this->token = $body->access_token;

        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function getSubredditListings($sub)
    {

        if (!$this->token) {
            $this->getAuthorization();
        }

        try {
            $req = $this->guzzle->get("https://oauth.reddit.com/r/{$sub}/new", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                ]
            ]);

            $body = json_decode($req->getBody());

            $links = [];

            collect($body->data->children)
                ->each(function($el) use (&$links) {
                    $links[] = $el->data->permalink;
                });

            dd($links);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

    }

}
