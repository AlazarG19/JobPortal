<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Seeder;
use App\Models\BenefitTranslation;
use Modules\Language\Entities\Language;

class BenefitTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Language::all();

        $benefits = Benefit::all();

        if($benefits && count($benefits) && count($benefits) != 0){
            foreach ($benefits as $data) {
                foreach ($languages as $language) {
                    BenefitTranslation::create([
                        'benefit_id' => $data->id,
                        'locale' => $language->code,
                        'name' => $data->name ?? "{$language->code} name",
                    ]);
                }
            }
        }
    }
}
