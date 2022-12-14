<?php

namespace Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->withoutExceptionHandling();
        $this->user = User::factory()->create();
    }

    /**
     * @test
     */
    public function it_validates_data_successfully_when_we_want_to_create_a_new_category()
    {
        $params = [
            'name' => 'Education',
            'planned' => 100
        ];

        $response = $this->actingAs($this->user)->post('/category', $params);

        $response->assertValid();
    }

    /**
     * @test
     */
    public function user_is_successfully_authenticated()
    {
        $params = [
            'name' => 'Education',
            'planned' => 100
        ];

        $this->actingAs($this->user)->post('/category', $params);

        $this->assertAuthenticated();
    }

    /**
     * @test
     */
    public function it_can_create_category_successfully()
    {
        $params = [
            'name' => 'Education',
            'planned' => 100
        ];

        $this->actingAs($this->user)->post('/category', $params);
        $category = Category::find(1);

        $this->assertModelExists($category);
    }

    /**
     * @test
     */
    public function it_can_delete_category_successfully()
    {
        $category = Category::factory()->create();

        $this->actingAs($this->user)->delete("/category/{$category->id}");

        $this->assertModelMissing($category);
    }

    /**
     * @test
     */
    public function it_returns_category_name_as_all_capital_letters()
    {
        Category::factory()->create([
            'name' => 'education'
        ]);

        $response = $this->actingAs($this->user)->get('/category');

        $response->assertSeeText('EDUCATION');
    }

    /**
     * @test
     */
    public function it_returns_category_successfully_in_the_view()
    {
        Category::factory()->create([
            'name' => 'Unexpected expenses',
            'planned' => 100
        ]);

        $response = $this->actingAs($this->user)->get('/category');

        $response->assertSeeText('UNEXPECTED EXPENSES');
        $response->assertSeeText(100);
    }

//    /**
//     * @test
//     */
//    public function it_can_edit_category_successfully(){
//
//    }



}
