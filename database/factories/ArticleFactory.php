<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Название статьи
            'title' => fake()->sentence(),

            // Случайная превью-картинка
            'preview_image' => fake()->randomElement([
                'preview.jpg',
                'preview_2.jpg',
            ]),

            // Краткое описание
            'short_description' => fake()->text(100),

            // Полное описание
            'description' => fake()->paragraphs(3, true),

            // Дата
            'date' => fake()->date(),
        ];
    }
}