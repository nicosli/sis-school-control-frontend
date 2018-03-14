<?php
    
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Util;
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
        return view('dashboard.inicio', [
            'res'   => session()->get('token_api'),
            'me'    => session()->get('me')
        ]);
    }

    public function auth(Request $request){
        $response = $this->client->request('POST', '/oauth/token', 
            [
                'auth' => [config('api.username'), config('api.password')],
                'query' => [
                    'username'      => $request->input('user'),
                    'password'      => $request->input('password'),
                    'grant_type'    => config('api.grant_type')
                ]
            ]
        );
        $res = json_decode($response->getBody()->getContents());
        if(isset($res->error))
            return back()->withInput()->with('status', $res->error_description);
        else{
            $resMenu = $this->client->request('GET', '/menu/bypersontype', [
                    'query' => ['access_token' => $res->access_token]
                ]
            );
            $menuPerson = json_decode($resMenu->getBody()->getContents());
            $menuHtml = Util::buildMenu($menuPerson);
            session()->regenerate();
            session(['token_api' => $res]);
            session(['menuPerson' => $menuPerson]);
            session(['menuHtml' => $menuHtml]);
            session(['me' => $res->me]);
            return redirect('/');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }
}