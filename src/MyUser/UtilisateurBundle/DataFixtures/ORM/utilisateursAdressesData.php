<?php
namespace MyUser\UtilisateurBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Ecommerce\EcommerceBundle\Entity\utilisateurAdresse;








class utilisateursAdressesData extends AbstractFixture implements  OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {

       $adresse1 = new utilisateurAdresse();

        $adresse1->setUtilisateur( ($this->getReference('utilisateur1')));

        $adresse1->setNom('Catelain');

        $adresse1->setPrenom('Benjamin');

        $adresse1->setTelephone('0600000000');

        $adresse1->setAdresse('3 rue alberta rubosca');

        $adresse1->setCp('76600');

        $adresse1->setPays('France');

        $adresse1->setVille('Le Havre');

        $adresse1->setComplement('face à l\'église');

        $manager->persist($adresse1);

        

        $adresse2 = new UtilisateurAdresse();

        $adresse2->setUtilisateur($this->getReference('utilisateur3'));

        $adresse2->setNom('premier');

        $adresse2->setPrenom('albert');

        $adresse2->setTelephone('0600000000');

        $adresse2->setAdresse('5 rue rubosca');

        $adresse2->setCp('76600');

        $adresse2->setPays('France');

        $adresse2->setVille('Le Havre');

        $adresse2->setComplement('face à la plage');

        $manager->persist($adresse2);

        

        

        $adresse6 = new UtilisateurAdresse();

        $adresse6->setUtilisateur($this->getReference('utilisateur6'));

        $adresse6->setNom('Yakuno');

        $adresse6->setPrenom('Yumi');

        $adresse6->setTelephone('0621589632');

        $adresse6->setAdresse('5 rue de l\'entente ');

        $adresse6->setCp('76600');

        $adresse6->setPays('France');

        $adresse6->setVille('Le Havre');

        $adresse6->setComplement('face à la plage');

        $manager->persist($adresse6);


        $manager->flush();
    }


     public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    }
}