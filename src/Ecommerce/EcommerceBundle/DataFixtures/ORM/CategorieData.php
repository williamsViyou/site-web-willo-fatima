<?php




namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Ecommerce\EcommerceBundle\Entity\Categorie;

class CategorieData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $Categorie2= new Categorie();
        $Categorie2-> setNom('Automobile');   
        $Categorie2->setImageId(($this->getReference('media5'))->getId());          
        $manager->persist($Categorie2);
        


        $Categorie3= new Categorie();
        $Categorie3-> setNom('Jeux video et console');   
        $Categorie3->setImageId(($this->getReference('media3'))->getId());          
        $manager->persist($Categorie3);
        


        $Categorie4= new Categorie();
        $Categorie4-> setNom('Higt-Tech');     
        $Categorie4->setImageId(($this->getReference('media12'))->getId());         
        $manager->persist($Categorie4);
        


        $Categorie6= new Categorie();
        $Categorie6-> setNom('Mobile et telephone');     
        $Categorie6->setImageId(($this->getReference('media12'))->getId());         
        $manager->persist($Categorie6);
     


        $Categorie7= new Categorie();
        $Categorie7-> setNom('Vetements');     
        $Categorie7->setImageId(($this->getReference('media12'))->getId());         
        $manager->persist($Categorie7);    


        $Categorie5= new Categorie();
        $Categorie5-> setNom('Sports');     
        $Categorie5->setImageId(($this->getReference('media12'))->getId());         
        $manager->persist($Categorie5);
        



        

        $manager->flush();



        $this->addReference('categorie2', $Categorie2);
        $this->addReference('categorie3', $Categorie3);
        $this->addReference('categorie4', $Categorie4);
        $this->addReference('categorie5', $Categorie5);
        $this->addReference('categorie6', $Categorie6);
        $this->addReference('categorie7', $Categorie7);
       

    }


     public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}