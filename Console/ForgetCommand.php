<?php

namespace QuantaForge\Cache\Console;

use QuantaForge\Cache\CacheManager;
use QuantaForge\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'cache:forget')]
class ForgetCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'cache:forget {key : The key to remove} {store? : The store to remove the key from}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove an item from the cache';

    /**
     * The cache manager instance.
     *
     * @var \QuantaForge\Cache\CacheManager
     */
    protected $cache;

    /**
     * Create a new cache clear command instance.
     *
     * @param  \QuantaForge\Cache\CacheManager  $cache
     * @return void
     */
    public function __construct(CacheManager $cache)
    {
        parent::__construct();

        $this->cache = $cache;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->cache->store($this->argument('store'))->forget(
            $this->argument('key')
        );

        $this->components->info('The ['.$this->argument('key').'] key has been removed from the cache.');
    }
}
