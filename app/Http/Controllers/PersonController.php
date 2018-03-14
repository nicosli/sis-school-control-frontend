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

    public function administrative(){
        return view('person.administrative');
    }

    public function teaching(){
        return view('person.teaching');
    }
    
    public function guardian(){
        return view('person.guardian');
    }
    
    public function parent(){
        return view('person.parent');
    }
    
    public function student(){
        return view('person.student');
    }
    
}