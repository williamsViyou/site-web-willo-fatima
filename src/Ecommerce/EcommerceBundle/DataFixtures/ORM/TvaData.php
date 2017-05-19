<?php
namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Ecommerce\EcommerceBundle\Entity\Tva;

class TvaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $Tva2= new Tva();
        $Tva2->setMultiplicate('0.982');   
        $Tva2->setNom('Tva 1.75') ;
        $Tva2->setValeur('1.75') ;
        $manager->persist($Tva2);
        


        $Tva3= new Tva();
        $Tva3->setMultiplicate('0.833');   
        $Tva3->setNom('Tva 20%') ;
        $Tva3->setValeur('20') ;
        $manager->persist($Tva3);
        
        
        $manager->flush();

        $this->addReference('Tva2', $Tva2);
        $this->addReference('Tva3', $Tva3);
       

    }


     public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}