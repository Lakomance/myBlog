<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Service\Post\StoreService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }
}
