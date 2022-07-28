<?php
namespace App\Repositories\Eloquent;

use App\Models\ContactForm;
use App\Repositories\ContactFormRepositoryInterface;

class ContactFormRepository extends BaseRepository implements ContactFormRepositoryInterface{
    protected $model;
    public function __construct(ContactForm $model)
    {
        $this->model = $model;
    }
}
