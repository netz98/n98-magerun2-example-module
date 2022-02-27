<?php
declare(strict_types=1);

namespace N98\MagerunExample\Test\Command;

use N98\Magento\Command\PHPUnit\TestCase;
use N98\MagerunExample\Command\MakeSomethingCommand;
use Symfony\Component\Console\Tester\CommandTester;

class MageSomethingCommandTest extends TestCase
{
    public function testOutput()
    {
        /**
         * Load module config for unit test. In this case the relative
         * path from current test case.
         */
        $this->loadConfigFile(__DIR__ . '/../../n98-magerun2.yaml');

        /**
         * Test if command could be found
         */
        $command = $this->getApplication()->find('n98:make-something:example-command');

        /**
         * Call command
         */
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $this->assertStringContainsString(MakeSomethingCommand::class, $commandTester->getDisplay());
    }
}
