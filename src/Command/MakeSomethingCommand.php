<?php
declare(strict_types=1);

namespace N98\MagerunExample\Command;

use N98\Magento\Command\AbstractMagentoCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeSomethingCommand extends AbstractMagentoCommand
{
    protected function configure()
    {
        $this
            ->setName('n98:make-something:example-command')            
            ->setDescription('Example command')
        ;
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->detectMagento($output);
        if ($this->initMagento()) {
            $output->writeln('Works!');
            $output->writeln(__DIR__ . ' -> ' . __CLASS__);
        }
    }
}
