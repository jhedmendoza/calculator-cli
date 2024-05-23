<?php
namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;

class Subtract extends Command {
    protected $signature = 'subtract 
                                {first : first number} 
                                {second : second number}';                     
    protected $description = 'Subtract two numbers and return the result.';
    protected $alias = '-';

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
                throw new Exception('Second is missing');
            }

            if ( !is_numeric($first) ) {
                throw new Exception('First needs to be a number');
            }

            if ( !is_numeric($second) ) {
                throw new Exception('Second needs to be a number');
            }

            $result = $this->subtract($first, $second);
            $this->line('The result is: '.$result);

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function subtract($a, $b) {
        return $a - $b;
    }
}
?>