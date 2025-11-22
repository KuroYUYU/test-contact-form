<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'last_name'   => $this->faker->lastName,
            'first_name'  => $this->faker->firstName,
            'gender'      => $this->faker->numberBetween(1, 3),   //性別条件を満たす1~3のみ
            'email'       => $this->faker->unique()->safeEmail,
            'tel'         => $this->faker->numerify('0##########'),   //記号も混ざるためphoneNumber()は不採用
            'address'     => $this->faker->address,
            'building'    => $this->faker->optional()->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1, 5),
            'detail'      => $this->faker->realText(80),    //自然な文章かつ丁度いい文字量にするため採用
        ];
    }
}
