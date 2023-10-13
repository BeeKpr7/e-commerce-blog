<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;

// This MailchimpNewsletter class is instantiated in app/Providers/AppServiceProvider.php
Class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client){}

    public function subscribe(string $email, string $listId = null): void
    {
        // If the listId is not passed in, use the one from the config file
        $listId ??= config('services.mailchimp.list-id');
        
        $this->client->lists->addListMember($listId, [
           "email_address" => $email,
           "status" => "subscribed",
       ]); 
    }
}
