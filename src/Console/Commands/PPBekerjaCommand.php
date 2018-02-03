<?php namespace Bantenprov\PPBekerja\Console\Commands;

use Illuminate\Console\Command;

/**
 * The PPBekerjaCommand class.
 *
 * @package Bantenprov\PPBekerja
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PPBekerjaCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:pp-bekerja';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\PPBekerja package';

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
        $this->info('Welcome to command for Bantenprov\PPBekerja package');
    }
}
