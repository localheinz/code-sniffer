<?php

namespace Spryker\Sniffs\Commenting;

/**
 * Checks if file doc block exists
 */
class DemoshopMissingFileDocBlockSniff extends AbstractDemoshopFileDocBlockSniff
{

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return void
     */
    public function process(\PHP_CodeSniffer_File $phpCsFile, $stackPointer)
    {
        if (!$this->isPyzNamespace($phpCsFile, $stackPointer)) {
            return;
        }

        if (!$this->existsFileDocBlock($phpCsFile, $stackPointer)) {
            $this->addFixableMissingDocblock($phpCsFile, $stackPointer);
        }
    }

    /**
     * @param \PHP_CodeSniffer_File $phpCsFile
     * @param int $stackPointer
     *
     * @return void
     */
    protected function addFixableMissingDocBlock(\PHP_CodeSniffer_File $phpCsFile, $stackPointer)
    {
        $fix = $phpCsFile->addFixableError(basename($phpCsFile->getFilename()) . ' has no File Doc Block.', $stackPointer);
        if ($fix) {
            $this->addFileDocBlock($phpCsFile, 0);
        }
    }

}
