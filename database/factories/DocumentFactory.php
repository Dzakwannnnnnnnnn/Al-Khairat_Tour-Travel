<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'document_type' => fake()->randomElement(['Paspor', 'KTP', 'Visa', 'Foto']),
            'file_path' => 'documents/test-file.pdf',
            'status' => 'pending',
            'notes' => null,
        ];
    }
}
