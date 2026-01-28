<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biblio;
use App\Models\Item;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Gmd;

class BiblioSeeder extends Seeder
{
    public function run()
    {
        // Ensure some master data exists
        $author = Author::firstOrCreate(['author_name' => 'J.K. Rowling']);
        $publisher = Publisher::firstOrCreate(['publisher_name' => 'Bloomsbury']);
        $gmd = Gmd::firstOrCreate(['gmd_code' => 'Text', 'gmd_name' => 'Text']);

        // Define a set of cover images
        $covers = ['cover1.jpg', 'cover2.jpg', 'cover3.jpg', 'cover4.jpg', null];

        // Create a few books
        $books = [
            ['title' => 'Harry Potter and the Philosophers Stone', 'isbn' => '9780747532743', 'year' => '1997'],
            ['title' => 'Harry Potter and the Chamber of Secrets', 'isbn' => '9780747538493', 'year' => '1998'],
            ['title' => 'Laravel for Beginners', 'isbn' => '1234567890', 'year' => '2023'],
        ];

        foreach ($books as $index => $book) {
            $biblio = Biblio::create([
                'title' => $book['title'],
                'isbn_issn' => $book['isbn'],
                'publisher_id' => $publisher->publisher_id,
                'publish_year' => $book['year'],
                'gmd_id' => $gmd->gmd_id,
                'image' => $faker->randomElement($covers), // Assign a random cover
            ]);

            // Attach Author
            $biblio->authors()->attach($author->author_id);

            // Create Item Copy
            Item::create([
                'biblio_id' => $biblio->biblio_id,
                'item_code' => 'B00' . ($index + 1), // B001, B002...
            ]);
        }

        // Create additional random books using DB::table()->insert for variety
        // Ensure publishers and GMDs exist for these random books
        // (Assuming publisher_id 1-5 and gmd_id 1-3 exist or are created elsewhere)
        for ($i = 0; $i < 10; $i++) { // Create 10 more random books
            DB::table('biblio')->insert([
                'title' => $faker->catchPhrase,
                'sor' => $faker->name,
                'edition' => 'Ed. ' . $faker->randomDigitNotNull,
                'isbn_issn' => $faker->isbn13,
                'publisher_id' => $faker->numberBetween(1, 5), // Assuming publishers with IDs 1-5 exist
                'publish_year' => $faker->year,
                'collation' => $faker->numberBetween(100, 500) . ' p.',
                'series_title' => $faker->sentence(3),
                'call_number' => $faker->bothify('### ???'),
                'gmd_id' => $faker->numberBetween(1, 3), // Assuming GMDs with IDs 1-3 exist
                'image' => $faker->randomElement($covers), // Randomly assign cover
                'input_date' => now(),
                'last_update' => now(),
            ]);
        }
        
        $this->command->info('Dummy books seeded. Item Codes: B001, B002, B003 and 10 random books.');
    }
}
