<?php

namespace Tests\Feature;

use App\Models\Maker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MakerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_user_can_view_makers_index(){
        Maker::factory()->count(3)->create();

        $response = $this->get(route("getMakers"));

        $response->assertStatus(200);

        $response->assertViewHas("makers");
    }

    public function test_user_can_create_maker(){
        $makerData = ["name" => "New maker"];

        $response = $this->post(route("storeMakers"), $makerData);

        $response->assertRedirect(route("getMakers"));

        $this->assertDatabaseHas("makers", $makerData);
        $response->assertSessionHas("success", "Gyártó sikeresen hozzáadva");
    }

    public function test_user_can_update_maker(){
        $maker = Maker::factory()->create();

        $updatedData = ["name" => "Updated maker"];

        $response = $this->patch(route("updateMakers", $maker->id), $updatedData);

        $response->assertRedirect(route("getMakers"));

        $this->assertDatabaseHas("makers", $updatedData);
        $response->assertSessionHas("success", "Gyártó sikeresen szerkesztve");
    }
    
    public function test_user_can_delete_maker(){
        $maker = Maker::factory()->create();

        $response = $this->delete(route("deleteMakers", $maker->id));

        $response->assertRedirect(route("getMakers"));
        
        $this->assertDatabaseMissing("makers", ['id' => $maker->id]);
        $response->assertSessionHas("success", "Gyártó sikeresen törölve");
    }
}
