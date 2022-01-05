<?php 
class Cms5fe9623032706758738195_2ffdb7eba077dd71be375883de78275bClass extends \Cms\Classes\PageCode
{
public function onBooking()
{
    $config = App::make('config');
    $data = post();
    $params = [
        'name' => $data['name'],
        'email'     => $data['email'],
        'phone'     => $data['phone'],
        'arrival'     => $data['arrival_date'],
        'num_persons'     => $data['num_persons'],
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

    Mail::send('galdan.sitetools::mail.booking', $params, function($message) {
        $message->to('thenunchihutsandhostel@gmail.com', 'The Nunchi Travels');
        $message->subject('Online Booking Request');
    });
}
}
