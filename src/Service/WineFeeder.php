<?php

namespace App\Service;

use App\Entity\Abv;
use App\Entity\Appellation;
use App\Entity\Arrangement;
use App\Entity\Award;
use App\Entity\Bio;
use App\Entity\Bottle;
use App\Entity\BottleStopper;
use App\Entity\Capacity;
use App\Entity\Color;
use App\Entity\Country;
use App\Entity\Domain;
use App\Entity\GrapeVariety;
use App\Entity\Region;
use App\Entity\Status;
use App\Entity\StorageInstruction;
use App\Entity\Style;
use App\Entity\User;
use App\Entity\Vintage;
use App\Entity\Wine;
use App\Entity\WineDetail;
use App\Lists\StatusReference;
use App\Repository\StatusRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class WineFeeder
{
    public const URL = 'https://www.vinatis.com/recherche?country%5B%5D=France&type%5B%5D=Vin&tri=7';

    public function __construct(
        private EntityManagerInterface $em,
        private StatusRepository $statusRepository,
        private UserRepository $userRepository,
        private array $appellations = [],
        private array $domains = [],
        private array $regions = [],
        private array $countries = [],
        private array $abvs = [],
        private array $wineDetails = [],
        private array $vintages = [],  
        private array $capacities = [], 
        private array $storages = [],  
        private array $stoppers = [],
        private array $wines = [],
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

        $this->CreateWineAndBottles($user);
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
            $this->countries[] = $country;
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
            $this->regions[] = $region;
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
            $this->appellations[] = $appellation;
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
            $this->capacities[] = $capacity;
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
            $this->abvs[] = $abv;
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
            $this->storages[] = $entity;
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
            $this->stoppers[] = $entity;
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
            $this->wineDetails[] = $entity;
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
            $this->domains[] = $entity;
        }
        $this->em->flush();
    }

    private function CreateWineAndBottles(User $user)
    {
        $colors = $this->em->getRepository(Color::class)->findAll();
        $vintages = $this->em->getRepository(Vintage::class)->findAll();
        $users = $this->em->getRepository(User::class)->findAll();
        
        for ($i=0;$i<150;$i++) {
            $wine = new Wine();
            $wine->setName(sprintf('Wine number %s', $i));
            $wine->setAbv($this->abvs[rand(0, count($this->abvs)-1)]);
            $wine->setAppellation($this->appellations[rand(0, count($this->appellations)-1)]);
            $wine->setDomain($this->domains[rand(0, count($this->domains)-1)]);
            $wine->setRegion($this->regions[rand(0, count($this->regions)-1)]);
            $wine->setCountry($this->countries[rand(0, count($this->countries)-1)]);
            $wine->setColor($colors[rand(0, count($colors)-1)]);
            $wine->setWineDetail($this->wineDetails[rand(0, count($this->wineDetails)-1)]);
            $wine->setVintage($vintages[rand(0, count($vintages)-1)]);
            $this->em->persist($wine);
            $this->wines[] = $wine;
        }
        $this->em->flush();


        $isLiked = [true, false];
        $date = [new \DateTimeImmutable('now'), null];
        
        foreach ($users as $user) {
            foreach ($user->getCellars() as $cellar) {
                for ($i=0;$i<15;$i++) {
                    $bottle = new Bottle();
                    $bottle->setWine($this->wines[rand(0, count($this->wines)-1)]);
                    $bottle->setBottleStopper($this->stoppers[rand(0, count($this->stoppers)-1)]);
                    $bottle->setCapacity($this->capacities[rand(0, count($this->capacities)-1)]);
                    $bottle->setCellar($cellar);
                    $bottle->setPosition(sprintf('A0', rand(0,99)));
                    $bottle->setStorageInstruction($this->storages[rand(0, count($this->storages)-1)]);
                    $bottle->setPurchasePrice(random_int(0, 100));
                    $bottle->setIsLiked($isLiked[rand(0,1)]);
                    $bottle->setEmptyAt($date[rand(0,1)]);
                    $bottle->setAlertAt($date[rand(0,1)]);
                    $bottle->setPeakAt($date[rand(0,1)]);
                    $bottle->setPurchaseAt($date[rand(0,1)]);
                    $bottle->setComment(sprintf('comment number %s', $i));
                    $this->em->persist($bottle);
                }
                $this->em->flush();
            }
        }
    }
}