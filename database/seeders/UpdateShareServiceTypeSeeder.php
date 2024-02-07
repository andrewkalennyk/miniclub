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

        foreach ($shareServices as $shareService) {
            $serviceType = $shareService->service_type;

            $type = ServiceType::where('type', $serviceType)->first();

            if ($type) {
                $shareService->service_type_id = $type->id;
                $shareService->save();
            }
        }
    }
}
