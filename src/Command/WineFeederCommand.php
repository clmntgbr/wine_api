<?php

namespace App\Command;

use App\Service\WineFeeder;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:wine-feeder',
    description: 'Add a short description for your command',
)]
class WineFeederCommand extends Command
{
    public function __construct(
        private WineFeeder $wineFeeder,
        string             $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setDescription(self::getDescription());
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->wineFeeder->parse();

        return Command::SUCCESS;
    }
}
