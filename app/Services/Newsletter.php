<?php

namespace App\Services;

// This is an interface, it is implemented by the MailchimpNewsletter class in app/Services/MailchimpNewsletter.php
Interface Newsletter 
{
    public function subscribe(string $email, string $listId = null);
}
