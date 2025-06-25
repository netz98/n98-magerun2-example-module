<?php

declare(strict_types=1);

namespace N98\MagerunExample\Command\DevConsole;

use Laminas\Code\Generator\FileGenerator;
use Magento\Framework\Code\Generator\ClassGenerator;
use N98\Magento\Command\Developer\Console\AbstractGeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MyCustomDevConsoleCommand extends AbstractGeneratorCommand
{
    const CLASSPATH = 'classpath';

    protected function configure()
    {
        $this
            ->setName('dev:console:make:simple-class')
            ->setDescription('Generates a simple PHP class file using the code generator')
            ->addArgument(self::CLASSPATH, InputArgument::REQUIRED, 'Class path (e.g. Foo/Bar)');
    }

    protected function catchedExecute(InputInterface $input, OutputInterface $output)
    {
        $classFileName = $this->getNormalizedPathByArgument($input->getArgument(self::CLASSPATH));
        $classNameToGenerate = $this->getCurrentModuleNamespace()
            . '\\'
            . $this->getNormalizedClassnameByArgument($input->getArgument(self::CLASSPATH));
        $filePathToGenerate = $classFileName . '.php';

        /** @var $classGenerator ClassGenerator */
        $classGenerator = $this->create(ClassGenerator::class);
        $classGenerator->setName($classNameToGenerate);

        $fileGenerator = new FileGenerator();
        $fileGenerator->setClass($classGenerator);

        $directoryWriter = $this->getCurrentModuleDirectoryWriter();
        $directoryWriter->writeFile($filePathToGenerate, $fileGenerator->generate());

        $output->writeln('<info>Generated </info><comment>' . $filePathToGenerate . '</comment>');
    }
}
