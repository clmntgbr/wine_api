<?php

namespace App\Service;

use App\Entity\Abv;
use App\Entity\Appellation;
use App\Entity\Arrangement;
use App\Entity\Award;
use App\Entity\Bio;
use App\Entity\BottleStopper;
use App\Entity\Capacity;
use App\Entity\Country;
use App\Entity\GrapeVariety;
use App\Entity\Region;
use App\Entity\StorageInstruction;
use App\Entity\Style;
use App\Entity\WineDetail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class WineFeeder
{
    public const URL = 'https://www.vinatis.com/recherche?country%5B%5D=France&type%5B%5D=Vin&tri=7';

    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    public function parse()
    {
        $finder = new Finder();
        $finder->files()->in(sprintf('%s/../../public/data', __DIR__));

        foreach ($finder as $file) {
            switch ($file->getFilename()) {
                case '1_country.txt':
                    $this->getCountries($file);
                    break;
                case '2_region.txt':
                    $this->getRegions($file);
                    break;
                case '3_appellation.txt':
                    $this->getAppellations($file);
                    break;
                case '4_capacity.txt':
                    $this->getCapacities($file);
                    break;
                case '5_abv.txt':
                    $this->getAbvs($file);
                    break;
                case '6_storage.txt':
                    $this->getStorages($file);
                    break;
                case '7_bottle_stopper.txt':
                    $this->getBottleStoppers($file);
                    break;
                case '8_wine_details.txt':
                    $this->getWineDetails($file);
                    break;
                case '9_style.txt':
                    $this->getStyles($file);
                    break;
                case '10_grape.txt':
                    $this->getGrapes($file);
                    break;
                case '11_bio.txt':
                    $this->getBios($file);
                    break;
                case '12_award.txt':
                    $this->getAwards($file);
                    break;
                case '13_arrangement.txt':
                    $this->getArrangements($file);
                    break;
                default:
                    break;
            }
        }
    }

    private function getCountries(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $country = new Country();
            $country->setName($key);
            $this->em->persist($country);
        }
        $this->em->flush();
    }

    private function getRegions(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $region = new Region();
            $region->setName($key);
            $this->em->persist($region);
        }
        $this->em->flush();
    }

    private function getAppellations(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $appellation = new Appellation();
            $appellation->setName($key);
            $this->em->persist($appellation);
        }
        $this->em->flush();
    }

    private function getCapacities(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $capacity = new Capacity();
            $capacity->setName(str_replace(' ', '', $key));
            $capacity->setValue((float)str_replace(' L', '', $key));
            $this->em->persist($capacity);
        }
        $this->em->flush();
    }

    private function getAbvs(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $abv = new Abv();
            $abv->setName($key);
            $this->em->persist($abv);
        }
        $this->em->flush();
    }

    private function getStorages(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new StorageInstruction();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getBottleStoppers(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new BottleStopper();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getWineDetails(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new WineDetail();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getStyles(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Style();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getGrapes(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new GrapeVariety();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getBios(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Bio();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getAwards(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Award();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getArrangements(SplFileInfo $fileInfo)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Arrangement();
            $entity->setName($key);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }
}
