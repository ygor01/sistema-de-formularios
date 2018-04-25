<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Form;
use Symfony\Component\Console\Formatter\OutputFormatter;

class form_info extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'form_info';

    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para saber se existem forms cadastrados';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            $form_count = Form::count();

            if($form_count instanceof QueryException){
                echo "ocorreu um erro";
            }
    
            if($form_count > 1){
                echo "\n";
                $this->info("Existem $form_count formulários cadastrados no momento.");
            }  
            else{
                echo "\n";
                $this->info("Existe $form_count formulário cadastrado no momento.");
            }
            // Closures include ->first(), ->get(), ->pluck(), etc.    
        }catch(\Illuminate\Database\QueryException $ex){ 
            
            $this->error('Nenhum banco de dados encontrado');
        }
        
    }
}
