<?php
namespace App\Console\Commands;
use Exception;
use Illuminate\Console\Command;

class Add extends Command {
    protected $signature = ' add {first : first number} {second : second number}';                        
    protected $description = 'Add two numbers and return the result.';
    protected $alias = '+';

    public function __construct(){
        parent::__construct();
    }

    protected function configure()
    {
        $this->setAliases([
            $this->alias,
        ]);

        parent::configure();
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



            $result = $this->add($first, $second);
            $this->line('The result is: '.$result);

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    private function add($a, $b) {
        return $a + $b;
    }
}
?>