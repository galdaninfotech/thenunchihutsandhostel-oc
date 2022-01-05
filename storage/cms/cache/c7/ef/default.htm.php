<?php 
class Cms5e3273d3c3ee1124418334_f6e0e12ffee792251805259a7b7123c6Class extends \Cms\Classes\LayoutCode
{
public function onStart() {
    $config = App::make('config');
    $this['debug'] = $config->get('app.debug');
    $this['company'] = $config->get('site.company', 'Company Name');
    $this['company_sm'] = $config->get('site.company_sm');
    $this['slogan'] = $config->get('site.slogan', 'Company Slogan');
    $this['mobile1'] = $config->get('site.mobile1');
    $this['mobile2'] = $config->get('site.mobile2');
    $this['mobile3'] = $config->get('site.mobile3');
    $this['phone'] = $config->get('site.phone');
    $this['email1'] = $config->get('site.email1');
    $this['email2'] = $config->get('site.email2');
    $this['addressline1'] = $config->get('site.addressline1');
    $this['addressline2'] = $config->get('site.addressline2');

    $this['title-sm'] = $this->page->title;
    if(substr($this->currentPageUrl(), strrpos($this->currentPageUrl(), '/') + 1) == 'www.himalaya-trails.com') {
        $this['bigImageClass'] = 'himalaya-trails';
    } else {
        $this['bigImageClass'] = substr($this->currentPageUrl(), strrpos($this->currentPageUrl(), '/') + 1);
    }
}
}
