<?php

namespace ParkBundle\Twig;

use Doctrine\ORM\PersistentCollection;

class ComputerExtension extends \Twig_Extension
{
    public function numberComputersAndNumberEnabled(PersistentCollection $computers)
    {
        $nbComputersEnabled = 0;

        foreach ($computers as $computer) {
            if ($computer->isEnabled()) {
                $nbComputersEnabled++;
            }
        }
        return sprintf("%d computers (%d enabled)", $computers->count(), $nbComputersEnabled);
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'number_computers_and_number_enabled',
                array($this, 'numberComputersAndNumberEnabled')
            ),
        );
    }

    public function getName()
    {
        return 'park_computer_extension';
    }
}
