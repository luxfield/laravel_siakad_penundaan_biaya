<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use function PHPUnit\Framework\assertFileExists;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
       $filesystem = Storage::disk('local');
       $pdf = $filesystem->get('document.pdf');

       $this->assertNotEquals([], Storage::allFiles());
    }
}
