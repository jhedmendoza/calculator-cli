<?php
namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;

class SquareRoot extends Command {
    protected $signature = 'sqrt 
                                {first : first number}';                    
    protected $description = 'Get the square root of a number';

    public function __construct(){
        parent::__construct();
    }

    public function handle(){
        $first = $this->argument('first');

        try {
            if (!$first) {
                throw new Exception('First number is missing');
            }

            if ( !is_numeric($first) ) {
                throw new Exception('First parameter needs to be a number');
            }

            $result = $this->squareRoot($first);
            $this->line('The result is: '.$result);

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function squareRoot($number) {
        return sqrt($number);
    }
}
?>