<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Work;

final class WorkControllerTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testShouldReturnWorks()
    {
        $works = factory(Work::class, 2)->create();

        $this->get(route("works"))
            ->assertStatus(200);
    }

    public function testShouldReturnAWork()
    {
        $work = factory(Work::class)->create();

        $this->get(route("works.show", $work->id))
            ->assertStatus(200);
    }

    /*public function testShouldDeleteABook()
    {
        $book = factory(Book::class)->create();

        $this->delete(route("book.delete", $book->id))
            ->assertStatus(204);
    }

    public function testShouldSaveABook()
    {
        $data = [
            "name"   => $this->faker->streetName,
            "author" => $this->faker->name()
        ];

        $this->post(route("book.add"), $data)
            ->assertStatus(201);
    }

    public function testShouldUpdateABook()
    {
        $book = factory(Book::class)->create();

        $data = [
            'name'   => $this->faker->streetName,
            'author' => $this->faker->name()
        ];

        $this->put(route("book.update", $book->id), $data)
            ->assertStatus(200);
    }*/
}
