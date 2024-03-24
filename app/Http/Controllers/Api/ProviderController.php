<?php

namespace App\Http\Controllers\Api;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Services\ProviderService;
use App\Traits\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\HomeRequest;
use App\Http\Resources\Api\ProviderResource;
use App\Http\Requests\Api\ProviderDetailsRequest;
use App\Http\Resources\Api\ProviderDetailsResource;

class ProviderController extends Controller
{
    use ResponseTrait;
    public function home(HomeRequest $requestData )
    {
        $data =   (new ProviderService())->index($requestData);
        return $this->successData(ProviderResource::collection($data));
    }

  public function providerDetails(ProviderDetailsRequest $request)
  {
    return $this->successData(new ProviderDetailsResource(Provider::findOrFail($request->provider_id)));
  }
}
