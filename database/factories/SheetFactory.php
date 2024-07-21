<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sheet;

class SheetFactory extends Factory
{
    protected $model = Sheet::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $column = 1;
        static $row = 'a';
        
        $data = [
            'column' => $column,
            'row' => $row,
        ];
        
        $column++;
        if ($column > 5) {
            $column = 1;
            $row++;
        }

        return $data;
    }
}
