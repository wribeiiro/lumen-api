<?php

use App\Models\Work;
use Faker\Factory;

final class WorkControllerTest extends TestCase
{
    private array $dataFake;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Faker\Factory::create();

        $this->dataFake = [
            'name'        => $this->faker->name,
            'description'   => $this->faker->title,
            'link'          => $this->faker->url,
            'image'         => $this->faker->imageUrl($width = 640, $height = 480),
            'tags'          => $this->faker->word,
        ];
    }

    public function testShouldReturnAWork()
    {
        $work = factory(Work::class)->create();

        $this->get("api/v1/work/{$work->id}", ['Authorization' => 'Basic ' . env('APP_API_KEY')]);
        $this->assertEquals(200, $this->response->status());
    }

    public function testShouldReturnWorks()
    {
        $this->get("api/v1/work", ['Authorization' => 'Basic ' . env('APP_API_KEY')]);
        $this->assertEquals(200, $this->response->status());
    }

    public function testShouldDeleteABook()
    {
        $work = factory(Work::class)->create();

        $this->delete("api/v1/work/destroy/{$work->id}", [], ['Authorization' => 'Basic ' . env('APP_API_KEY')]);
        $this->assertEquals(204, $this->response->status());
    }

    public function testShouldSaveABook()
    {
        $this->post("api/v1/work/create", $this->dataFake, ['Authorization' => 'Basic ' . env('APP_API_KEY')]);
        $this->assertEquals(201, $this->response->status());
    }

    public function testShouldUpdateABook()
    {
        $work = factory(Work::class)->create();

        $this->put("api/v1/work/update/{$work->id}", $this->dataFake, ['Authorization' => 'Basic ' . env('APP_API_KEY')]);
        $this->assertEquals(200, $this->response->status());
    }
}
