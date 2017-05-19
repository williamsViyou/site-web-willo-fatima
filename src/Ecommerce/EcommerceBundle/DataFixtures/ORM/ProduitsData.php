<?php




namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Ecommerce\EcommerceBundle\Entity\Produits;

class ProduitsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {


/*
        $produits1 = new Produits();
        $produits1->setCategorie($this->getReference('categorie2')->getId());
        $produits1->setDescription('');
        $produits1->setDisponible('1');
        $produits1->setImages(($this->getReference('media5'))->getId()); 
        $produits1->setNom('');
        $produits1->setPrix('');
        $produits1->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits1);


*/


        $produits1 = new Produits();
        $produits1->setCategorie($this->getReference('categorie2')->getId());
        $produits1->setDescription('Au bord non d\'un vehicule mais du meileur quui puisse exister');
        $produits1->setDisponible('1');
        $produits1->setImage(($this->getReference('media5'))->getId()); 
        $produits1->setNom('XBenz 3280');
        $produits1->setPrix('40000.00');
        $produits1->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits1);


        $produits2 = new Produits();
        $produits2->setCategorie($this->getReference('categorie2')->getId());
        $produits2->setDescription('Le meilleur confort au bord d\'un vehicule à 4 chevaux');
        $produits2->setDisponible('1');
        $produits2->setImage(($this->getReference('media14'))->getId()); 
        $produits2->setNom('Ferrari Xyz9800');
        $produits2->setPrix('38800.00');
        $produits2->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits2);  

        $produits3 = new Produits();
        $produits3->setCategorie($this->getReference('categorie2')->getId());
        $produits3->setDescription('Un vehicule indefiable : Cinq mètre en un quart de seconde, batisé la bète');
        $produits3->setDisponible('1');
        $produits3->setImage(($this->getReference('media15'))->getId()); 
        $produits3->setNom('Ferrari beast');
        $produits3->setPrix('790000.00');
        $produits3->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits3);

        $produits4 = new Produits();
        $produits4->setCategorie($this->getReference('categorie2')->getId());
        $produits4->setDescription('L\'ideal pour les business men');
        $produits4->setDisponible('1');
        $produits4->setImage(($this->getReference('media16'))->getId()); 
        $produits4->setNom('Droid d57');
        $produits4->setPrix('19999.99');
        $produits4->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits4);

        $produits6 = new Produits();
        $produits6->setCategorie($this->getReference('categorie2')->getId());
        $produits6->setDescription('Incarne Luxe et Respect en un seul regard ');
        $produits6->setDisponible('1');
        $produits6->setImage(($this->getReference('media18'))->getId()); 
        $produits6->setNom('Ligth car Wp9');
        $produits6->setPrix('69999.99');
        $produits6->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits6);

        
        $produits5 = new Produits();
        $produits5->setCategorie($this->getReference('categorie2')->getId());
        $produits5->setDescription('Ideal pour une sortie agréable nen famille');
        $produits5->setDisponible('1');
        $produits5->setImage(($this->getReference('media17'))->getId()); 
        $produits5->setNom('Yzly loop PL8');
        $produits5->setPrix('49998.99');
        $produits5->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits5);




        $produits6 = new Produits();
        $produits6->setCategorie($this->getReference('categorie3')->getId());
        $produits6->setDescription('La console du futur');
        $produits6->setDisponible('1');
        $produits6->setImage(($this->getReference('media3'))->getId()); 
        $produits6->setNom('Playstation 5');
        $produits6->setPrix('799.99');
        $produits6->setTva(($this->getReference('Tva2'))->getId());
        $manager->persist($produits6);

        $produits7 = new Produits();
        $produits7->setCategorie($this->getReference('categorie3')->getId());
        $produits7->setDescription('La nouvelle PS4, la console la plus vendue au monde,
         en version plus fine : un concentré de puissance de jeu en versions 500 Go et 1 To.
          Disponible en Jet Black dès maintenant. Disponible en Glacier White à partir du 24 janvier.');
        $produits7->setDisponible('1');
        $produits7->setImage(($this->getReference('media20'))->getId()); 
        $produits7->setNom('Playstation 4');
        $produits7->setPrix('399.99');
        $produits7->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits7);

        $produits8 = new Produits();
        $produits8->setCategorie($this->getReference('categorie3')->getId());
        $produits8->setDescription('Welcome to the Future of Play');
        $produits8->setDisponible('1');
        $produits8->setImage(($this->getReference('media21'))->getId()); 
        $produits8->setNom('XXBox Revolution');
        $produits8->setPrix('399.99');
        $produits8->setTva(($this->getReference('Tva2'))->getId());
        $manager->persist($produits8);


        $produits9 = new Produits();
        $produits9->setCategorie($this->getReference('categorie3')->getId());
        $produits9->setDescription('Sois vigilent, ça commence quand on ne s\'y attend pas, une véritable passion');
        $produits9->setDisponible('1');
        $produits9->setImage(($this->getReference('media19'))->getId()); 
        $produits9->setNom('RealGame GetForce FX');
        $produits9->setPrix('999.99');
        $produits9->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits9);




/******************Higt tech ***********************/



        $produits10 = new Produits();
        $produits10->setCategorie($this->getReference('categorie4')->getId());
        $produits10->setDescription('Une montre unique en son genre');
        $produits10->setDisponible('1');
        $produits10->setImage(($this->getReference('media20_'))->getId()); 
        $produits10->setNom('La Montre du Futur');
        $produits10->setPrix('1999.99');
        $produits10->setTva(($this->getReference('Tva2'))->getId());
        $manager->persist($produits10);

              $produits11 = new Produits();
        $produits11->setCategorie($this->getReference('categorie4')->getId());
        $produits11->setDescription('Ultimate computer');
        $produits11->setDisponible('1');
        $produits11->setImage(($this->getReference('media21_'))->getId()); 
        $produits11->setNom('God Computer');
        $produits11->setPrix('3999.99');
        $produits11->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits11);



      $produits12 = new Produits();
        $produits12->setCategorie($this->getReference('categorie4')->getId());
        $produits12->setDescription('Le PlayStation VR est le nouveau venu de la famille PS4, 
        alors quelle que soit la console PS4 que vous possédez, vous êtes prêt pour le PS VR :
         connectez le casque-micro à votre PS4, ajoutez une PlayStation Camera* et oubliez le
          monde réel.');
        $produits12->setDisponible('1');
        $produits12->setImage(($this->getReference('media22'))->getId()); 
        $produits12->setNom('Playstation VR : YourWorld ');
        $produits12->setPrix('1999.99');
        $produits12->setTva(($this->getReference('Tva2'))->getId());
        $manager->persist($produits12);

/*****************************************************/




/****************Mobil ******************/ 
      $produits13 = new Produits();
        $produits13->setCategorie($this->getReference('categorie6')->getId());
        $produits13->setDescription('Il n\'est pas juste le meilleur mais il demeure le meilleur' );
        $produits13->setDisponible('1');
        $produits13->setImage(($this->getReference('media4'))->getId()); 
        $produits13->setNom('Iphone 8');
        $produits13->setPrix('1599.99');
        $produits13->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits13);

        $produits14 = new Produits();
        $produits14->setCategorie($this->getReference('categorie6')->getId());
        $produits14->setDescription('Plus qu\'un smartphone : Avec les Galaxy S7,
         nous avons transformé la manière de vivre et partager vos meilleures 
         expériences. Plongez dans une toute nouvelle dimension et dépassez vos limites.' );
        $produits14->setDisponible('1');
        $produits14->setImage(($this->getReference('media23'))->getId()); 
        $produits14->setNom('Samsung S7');
        $produits14->setPrix('1699.99');
        $produits14->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits14);


        $produits15 = new Produits();
        $produits15->setCategorie($this->getReference('categorie6')->getId());
        $produits15->setDescription('LA PHOTOGRAPHIE SUR SMARTPHONE RÉINVENTÉE .' );
        $produits15->setDisponible('1');
        $produits15->setImage(($this->getReference('media24'))->getId()); 
        $produits15->setNom('Huawei P9');
        $produits15->setPrix('1599.99');
        $produits15->setTva(($this->getReference('Tva3'))->getId());
        $manager->persist($produits15);






















        $manager->flush();

    }


     public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}