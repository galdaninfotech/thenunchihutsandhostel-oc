<?php namespace Galdan\Sitetools\Components;

use Cms\Classes\ComponentBase;
use App;
use Flash;
use Mail;
use Lang;
use Validator;
use ValidationException;
class Contact extends ComponentBase
{   

    public function componentDetails()
    {
        return [
            'name'        => 'contact Component',
            'description' => 'Displays a contact form on the page'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onContact() {
        $data = post();

        // Validate input data
        $rules = [
            'name'  => 'required|between:2,64',
            'email' => 'required|email|between:8,64'
        ];

        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            throw new ValidationException($validation);
        }
        
        
        $config = App::make('config');
        $to = $config->get('site.email1');
        $company = $config->get('site.company');
        // $to = 'admin@localhost';
        $params = [
            'name' => $data['name'],
            'email'     => $data['email'],
            'messagez'     => $data['message'],
            'company'     => $config->get('site.company'),
            'addressline1'     => $config->get('site.addressline1'),
            'addressline2'     => $config->get('site.addressline2'),
            'mobile1'     => $config->get('site.mobile1'),
            'mobile2'     => $config->get('site.mobile2'),
            'phone1'     => $config->get('site.phone1'),
            'phone2'     => $config->get('site.phone2'),
            'email1'     => $config->get('site.email1'),
            'email2'     => $config->get('site.email2'),
        ];
        Mail::send('galdan.sitetools::mail.contact', $params, function($message) use ($to) {
                    $message->to($to, 'The Nunchi')->subject(post('name').' : Online Contact');
                });

        Flash::success('You have succesfully sent mail!');
    }
}
