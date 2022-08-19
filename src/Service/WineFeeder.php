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
use App\Entity\Domain;
use App\Entity\GrapeVariety;
use App\Entity\Region;
use App\Entity\Status;
use App\Entity\StorageInstruction;
use App\Entity\Style;
use App\Entity\User;
use App\Entity\WineDetail;
use App\Lists\StatusReference;
use App\Repository\StatusRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class WineFeeder
{
    public const URL = 'https://www.vinatis.com/recherche?country%5B%5D=France&type%5B%5D=Vin&tri=7';

    public function __construct(
        private EntityManagerInterface $em,
        private StatusRepository $statusRepository,
        private UserRepository $userRepository
    ) {
    }

    public function parse()
    {
        $finder = new Finder();
        $finder->files()->in(sprintf('%s/../../public/data', __DIR__));

        $status = $this->statusRepository->findOneBy(['reference' => StatusReference::VALIDATED]);
        $user = $this->userRepository->findOneBy(['email' => 'clement@gmail.com']);

        foreach ($finder as $file) {
            switch ($file->getFilename()) {
                case '1_country.txt':
                    $this->getCountries($file, $status, $user);
                    break;
                case '2_region.txt':
                    $this->getRegions($file, $status, $user);
                    break;
                case '3_appellation.txt':
                    $this->getAppellations($file, $status, $user);
                    break;
                case '4_capacity.txt':
                    $this->getCapacities($file, $status, $user);
                    break;
                case '5_abv.txt':
                    $this->getAbvs($file, $status, $user);
                    break;
                case '6_storage.txt':
                    $this->getStorages($file, $status, $user);
                    break;
                case '7_bottle_stopper.txt':
                    $this->getBottleStoppers($file, $status, $user);
                    break;
                case '8_wine_details.txt':
                    $this->getWineDetails($file, $status, $user);
                    break;
                case '9_style.txt':
                    $this->getStyles($file, $status, $user);
                    break;
                case '10_grape.txt':
                    $this->getGrapes($file, $status, $user);
                    break;
                case '11_bio.txt':
                    $this->getBios($file, $status, $user);
                    break;
                case '12_award.txt':
                    $this->getAwards($file, $status, $user);
                    break;
                case '13_arrangement.txt':
                    $this->getArrangements($file, $status, $user);
                    break;
                case '14_domain.txt':
                    $this->getDomains($file, $status, $user);
                    break;
                default:
                    break;
            }
        }
    }

    private function getCountries(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $country = new Country();
            $country->setName($key);
            $country->setStatus($status);
            $country->setCreatedBy($user);
            $country->setUpdatedBy($user);
            $this->em->persist($country);
        }
        $this->em->flush();
    }

    private function getRegions(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $region = new Region();
            $region->setName($key);
            $region->setStatus($status);
            $region->setCreatedBy($user);
            $region->setUpdatedBy($user);
            $this->em->persist($region);
        }
        $this->em->flush();
    }

    private function getAppellations(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $appellation = new Appellation();
            $appellation->setName($key);
            $appellation->setStatus($status);
            $appellation->setCreatedBy($user);
            $appellation->setUpdatedBy($user);
            $this->em->persist($appellation);
        }
        $this->em->flush();
    }

    private function getCapacities(SplFileInfo $fileInfo, Status $status, User $user)
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

    private function getAbvs(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $abv = new Abv();
            $abv->setName($key);
            $abv->setStatus($status);
            $abv->setCreatedBy($user);
            $abv->setUpdatedBy($user);
            $this->em->persist($abv);
        }
        $this->em->flush();
    }

    private function getStorages(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new StorageInstruction();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getBottleStoppers(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new BottleStopper();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getWineDetails(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new WineDetail();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getStyles(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Style();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getGrapes(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new GrapeVariety();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getBios(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Bio();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getAwards(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Award();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getArrangements(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Arrangement();
            $entity->setName($key);
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }

    private function getDomains(SplFileInfo $fileInfo, Status $status, User $user)
    {
        $datas = array_flip(array_filter(explode(';', $fileInfo->getContents())));

        foreach ($datas as $key => $value) {
            $entity = new Domain();
            $entity->setName(ucwords(strtolower($key)));
            $entity->setStatus($status);
            $entity->setCreatedBy($user);
            $entity->setUpdatedBy($user);
            $this->em->persist($entity);
        }
        $this->em->flush();
    }
}
