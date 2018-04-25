<?php

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $form = [
            
            0 => [
                'title' => 'Formulario de pesquisa',
                'author' => 'Reinoldo',
                'initial_date' => '2018-02-01', 
                'final_date' => '2018-02-02',
                'qnt_recept' => '10',
                'status' => '1',
                'description' => 'Descrição Formulario de pesquisa'],
            
            1 => [
                'title' => 'Formulario 2',
                'author' => 'Ygor',
                'initial_date' => '2018-02-01', 
                'final_date' => '2018-02-02',
                'qnt_recept' => '10',
                'status' => '1',
                'description' => 'Descrição formulario 2']
            ];
        DB::table('forms')->insert($form);
    }
}
