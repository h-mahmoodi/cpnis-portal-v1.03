<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Document::class;
    public function definition()
    {
        return [
            'document_type' => 1,
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph(2),
            'status' => $this->faker->numberBetween(0,2),
            'lock' => $this->faker->numberBetween(0,1),
        ];
    }
}
