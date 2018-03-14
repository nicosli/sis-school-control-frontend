<?php
    
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Util;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Guzzle\Http\Exception\ClientErrorResponseException;

class PersonController extends Controller{

    private $client;

    public function __construct(){
        $this->client = new HttpClient(
            [
                'base_uri' => config('api.base_uri'),
                'exceptions' => false
            ]
        );
    }

    public function add(){
        return view('person.inicio');
    }
}