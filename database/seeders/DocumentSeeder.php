<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_1',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_2',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_3',
            'status_id' => 1,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_4',
            'status_id' => 4,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_5',
            'status_id' => 1,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_6',
            'status_id' => 1,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_7',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_8',
            'status_id' => 4,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_9',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_10',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_11',
            'status_id' => 1,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_12',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_13',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_14',
            'status_id' => 1,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_15',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_15_1',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_15_2',
            'status_id' => 1,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_15_3',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_16',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_17',
            'status_id' => 4,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 1,
            'name' => 'doc_18',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 2,
            'name' => 'doc_1',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 2,
            'name' => 'doc_2',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 2,
            'name' => 'doc_3',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 2,
            'name' => 'doc_4',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 3,
            'name' => 'doc_1',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 3,
            'name' => 'doc_2',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 3,
            'name' => 'doc_3',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);

        Document::create([
            'contractor_id' => 3,
            'name' => 'doc_4',
            'status_id' => 3,
            'path' => 'storage/1/doc.pdf'
        ]);
    }
}
