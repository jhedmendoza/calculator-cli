<?php
namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;

class Multiply extends Command {
    protected $signature = 'multiply 
                                {first : first number} 
                                {second : second number}';                  
    protected $description = 'Multiply two numbers and return the result.';
    protected $alias = '*';

    public function __construct(){
        parent::__construct();
    }

    public function handle(){
        $first = $this->argument('first');
        $second = $this->argument('second');


        try {

            if (!$first) {
                throw new Exception('First parameter is missing');
            }

            if ($first && !$second) {
                throw new Exception('Second parameter is missing');
            }

            if ( !is_numeric($first) ) {
                throw new Exception('First parameter needs to be a number');
            }

            if (!is_numeric($second) && $same == false) {
                throw new Exception('Second parameter needs to be a number');
            }

            $result = $this->multiply($first, $second);
            $this->line('The result is: '.$result);

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function multiply($a, $b) {
        return $a * $b;
    }
}
?>