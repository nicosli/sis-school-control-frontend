<?php
    
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Guzzle\Http\Exception\ClientErrorResponseException;

class ModulosController extends Controller{

    private $client;

    public function __construct(){
        $this->client = new HttpClient(
            [
                'base_uri' => config('api.base_uri'),
                'exceptions' => false
            ]
        );
    }

    public function inicio(){
        return view('dashboard.inicio', ['res' => session()->get('token_api')]);
    }

    public function auth(Request $request){
        $response = $this->client->request('POST', '/oauth/token', 
            [
                'auth' => [$request->input('user'), $request->input('password')],
                'query' => [
                    'username'      => config('api.username'),
                    'password'      => config('api.password'),
                    'grant_type'    => config('api.grant_type')
                ]
            ]
        );
        $res = json_decode($response->getBody()->getContents());
        if(isset($res->error))
            return back()->withInput()->with('status', $res->message);
        else{
            $resMenu = $this->client->request('GET', '/menu/bypersontype', [
                    'query' => ['access_token' => $res->access_token]
                ]
            );
            $menuPerson = json_decode($resMenu->getBody()->getContents());
            session()->regenerate();
            session(['token_api' => $res]);
            session(['menuPerson' => $menuPerson]);
            return redirect('/');
        }
    }

    public function logout(){
        session()->forget('token_api');
        session()->forget('menuPerson');
        return redirect('/');
    }
}