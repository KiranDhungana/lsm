<?php

namespace App\Http\Controllers\Api\V2\GeneralSetting;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GeneralSettingsInterface;
use App\State;

class GeneralSettingController extends Controller
{
    private $generalSetting;

    public function __construct(GeneralSettingsInterface $generalSetting)
    {
        $this->generalSetting = $generalSetting;
    }
    public function default(): object
    {
        return response()->json([
            'success'   => true,
            'data'      => $this->generalSetting->defaultSettings(),
            'message'   => trans('api.Get settings successful'),
        ]);
    }
    public function currencies(Request $request): object
    {
        return response()->json([
            'success' => true,
            'data' => $this->generalSetting->currencies($request),
            'message' => trans('api.Get currency list successfully'),
        ]);
    }
    public function timezones(Request $request): object
    {
        return response()->json([
            'success' => true,
            'data' => $this->generalSetting->timezones($request),
            'message' => trans('api.Get timezone list successfully'),
        ]);
    }
    public function countries(Request $request): object
    {
        return response()->json([
            'success' => true,
            'data' => $this->generalSetting->countries($request),
            'message' => trans('api.Get country list successfully'),
        ]);
    }
    public function states(Request $request): object
    {
        $rules = [
            'country_id' => 'required|exists:states,country_id'
        ];
        $request->validate($rules, validationMessage($rules));

        return response()->json([
            'success' => true,
            'data' => $this->generalSetting->states($request),
            'message' => trans('api.Get state list successfully'),
        ]);
    }
    public function cities(Request $request): object
    {
        $rules = [
            'state_id' => 'required|exists:spn_cities,state_id',
        ];
        $request->validate($rules, validationMessage($rules));
        
        return response()->json([
            'success' => true,
            'data' => $this->generalSetting->cities($request),
            'message' => trans('api.Get city list successfully'),
        ]);
    }
}
