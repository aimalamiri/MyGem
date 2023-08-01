<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => 'Yoga',
            'description' => 'Yoga is a group of physical, mental, and spiritual practices or disciplines which originated in ancient India. Yoga is one of the six orthodox philosophical schools of Hinduism. There is a broad variety of yoga schools, practices, and goals in Hinduism, Buddhism, and Jainism.',
            'minutes' => 60,
        ]);

        ClassType::create([
            'name' => 'Pilates',
            'description' => 'Pilates is a physical fitness system developed in the early 20th century by Joseph Pilates, after whom it was named. Pilates called his method "Contrology". It is practiced worldwide, especially in Western countries such as Canada, the United States and the United Kingdom.',
            'minutes' => 45,
        ]);

        ClassType::create([
            'name' => 'Zumba',
            'description' => 'Zumba is an exercise fitness program created by Colombian dancer and choreographer Alberto "Beto" Pérez during the 1990s. Zumba is a trademark owned by Zumba Fitness, LLC. The Brazilian pop singer Claudia Leitte has become the international ambassador to Zumba Fitness.',
            'minutes' => 90,
        ]);

        ClassType::create([
            'name' => 'Boxing',
            'description' => 'Boxing is a combat sport in which two people, usually wearing protective gloves, throw punches at each other for a predetermined amount of time in a boxing ring.',
            'minutes' => 30,
        ]);
    }
}
