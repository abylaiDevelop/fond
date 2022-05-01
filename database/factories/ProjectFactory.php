<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Название благотвроительности',
            'preview_text' => 'Необходимыми средствами для
                                борьбы с инфекцией и обеспечения
                                условий их работы',
            'img_path' => 'images/img/projects-1.jpg'
        ];
    }
}
