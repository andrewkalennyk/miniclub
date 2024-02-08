<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use App\Models\ShareService;
use Illuminate\Database\Seeder;

class UpdateShareServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shareServices = ShareService::all();
        $serviceTypes = ServiceType::whereIn('type', $shareServices->pluck('service_type'))->get()->keyBy('type');

        foreach ($shareServices as $shareService) {
            $serviceType = $serviceTypes[$shareService->service_type] ?? null;
            if ($serviceType) {
                $shareService->service_type_id = $serviceType->id;
                $shareService->save();
            }
        }
    }
}
