<?php

namespace App\Http\Controllers\Api;

use App\Models\Intro;
use App\Traits\Api\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\IntroResource;

class SettingController extends Controller
{
    use ResponseTrait;
    public function intros()
    {
      $intros = IntroResource::collection(Intro::latest()->limit(3)->get());
      return $this->successData($intros);
    }
}
