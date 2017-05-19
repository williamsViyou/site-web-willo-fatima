<?php




namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use  Ecommerce\EcommerceBundle\Entity\media;

class mediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $media= new media();
        $media->setAlt('Drone');   
        $media->setPath('http://voices.nationalgeographic.com/files/2015/11/Holy-Stone%C2%AE-RC-Quadcopter-Drone-with-HD-Camera-600x338.jpg'); 
        $manager->persist($media);

        
        $media2= new media();
        $media2->setAlt('Drone');   
        $media2->setPath('http://voices.nationalgeographic.com/files/2015/11/Holy-Stone%C2%AE-RC-Quadcopter-Drone-with-HD-Camera-600x338.jpg'); 
        $manager->persist($media2);


        $media12= new media();
        $media12->setAlt('NetPublic drone');   
        $media12->setPath('http://www.netpublic.fr/wp-content/uploads/2015/02/drone.jpg'); 
        $manager->persist($media12);


   $media13= new media();
        $media13->setAlt('Sneaker nike');   
        $media13->setPath('http://static.lexpress.fr/medias_10645/w_945,h_709,c_crop,x_126,y_0/w_640,h_358,c_fill,g_center/v1445510876/nike-a-annonce-que-ses-baskets-a-lacage-automatique-seront-vendues-aux-encheres-au-printemps-2016_5450285.jpg'); 
        $manager->persist($media13);



   $media11= new media();
        $media11->setAlt('Parfum Dior');   
        $media11->setPath('http://www.origines-parfums.com/content/product_9136761hd.jpg'); 
        $manager->persist($media11);


   $media3= new media();
        $media3->setAlt('Playstation 5');   
        $media3->setPath('http://media.meltystyle.fr/article-3329976-fb/playstation-5-date-de-sortie-ps5-ps4-slim.jpg'); 
        $manager->persist($media3);


   $media4= new media();
        $media4->setAlt('Iphone 8');   
        $media4->setPath('https://www.forbes.fr/wp-content/uploads/2017/04/iphone-8-fuites-de-chez-apple.jpg'); 
        $manager->persist($media4);


   $media5= new media();
        $media5->setAlt('BMW ligth air ');   
        $media5->setPath('http://www.favorisxp.com/fond-ecran/voiture-cars-wallpapers/koenigsegg-ccx-fond-ecran-voiture-de-sport.jpg'); 
        $manager->persist($media5);


   $media6= new media();
        $media6->setAlt('Vetement femme');   
        $media6->setPath('https://s-media-cache-ak0.pinimg.com/564x/4a/38/b7/4a38b7a8b1713fc9b0cd5262d2f6f968.jpg'); 
        $manager->persist($media6);


   $media7= new media();
        $media7->setAlt('veste homme');   
        $media7->setPath('http://www.surmesurepascher.com/cpimg/06122012134918b.jpg'); 
        $manager->persist($media7);


   $media8= new media();
        $media8->setAlt('parfun homme');   
        $media8->setPath('http://www.luimagazine.fr/wp-content/uploads/2015/06/parfum-homme-boss-bottled.jpg'); 
        $manager->persist($media8);

   $media9= new media();
        $media9->setAlt('bague de mariage femme');   
        $media9->setPath('http://cdn.gemperles.com/media/catalog/product/cache/1/small_image/400x346/bbc5a75aa9b507e77d240bd05470eea8/s/d/sdy034-1_1.jpg'); 
        $manager->persist($media9);


   $media10= new media();
        $media10->setAlt('Talon femme');   
        $media10->setPath('https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTCmraJn6aZDsjcraX1tDqIRRP4Is7Dx4rppRmxwKwdMZUy8EOa'); 
        $manager->persist($media10);

/****************Les voitures ******************/ 

   $media14= new media();
        $media14->setAlt('Voiture de luxe : Ferrari');   
        $media14->setPath('http://www.snut.fr/wp-content/uploads/2015/10/image-de-voiture-de-course.jpg'); 
        $manager->persist($media14);


 $media15= new media();
        $media15->setAlt('Voiture de luxe : Ferrari');   
        $media15->setPath('http://o.aolcdn.com/commerce/autodata/images/USC50FRC201A021001.jpg'); 
        $manager->persist($media15);

 $media16= new media();
        $media16->setAlt('Mazda droid 6 ');   
        $media16->setPath('http://www.mazdaplasencia.com/img/360/mazda-3-sedan/rojo/m6.png'); 
        $manager->persist($media16);


 $media17= new media();
        $media17->setAlt('Rent A Car Sa Model:Yzly loop PL8');   
        $media17->setPath('https://static.rentacar.fr/images/cms_uploaded/pages/hub-vehicule/vp/locatio-voiture-rentacar-qashqai.png'); 
        $manager->persist($media17);

 $media18= new media();
        $media18->setAlt('Rent A Car Sa Model:Ligth car Wp9');   
        $media18->setPath('https://static.rentacar.fr/images/cms_uploaded/pages/hub-vehicule/vp/location-voiture-luxe-rentacar.png'); 
        $manager->persist($media18);











/****************Gaming ******************/ 

   $media20= new media();
        $media20->setAlt('Playstation 4');   
        $media20->setPath('http://media.melty.fr/article-2558138-fb/ps4-sony-console.jpg'); 
        $manager->persist($media20);


 $media21= new media();
        $media21->setAlt('XXBox Revolution');   
        $media21->setPath('http://www.gqmagazine.fr/uploads/images/thumbs/201629/99/une_date_de_sortie_pour_la_xbox_one_s_en_france_1549_north_780x_white.png'); 
        $manager->persist($media21);

 $media19= new media();
        $media19->setAlt('RealGame GetForce FX');   
        $media19->setPath('http://i2.cdscdn.com/pdt2/1/1/3/1/700x700/auc0326233000113/rw/lunettes-video-pour-console-ecran-virtuel-de-72.jpg'); 
        $manager->persist($media19);
/***************************************************************/



/****************High Tech ******************/ 

   $media20_= new media();
        $media20_->setAlt('La montre du futur');   
        $media20_->setPath('http://www.mallafric.com/media/catalog/product/cache/17/thumbnail/9df78eab33525d08d6e5fb8d27136e95/0/m/0mipwk7b.jpg'); 
        $manager->persist($media20_);


 $media21_= new media();
        $media21_->setAlt('God Computer');   
        $media21_->setPath('http://gadgetsin.com/uploads/2012/02/concept_magic_macbook_pro_3.jpg'); 
        $manager->persist($media21_);

 $media22= new media();
        $media22->setAlt('Playstation VR : YourWorld ');   
        $media22->setPath('http://www.appgame.com/wp-content/uploads/2016/01/PlayStation-VR-20160120-t.jpg'); 
        $manager->persist($media22);
/*******************************************************/


/****************Mobil ******************/ 

   $media23= new media();
        $media23->setAlt('Samsung S7');   
        $media23->setPath('https://www.dpreview.com/files/p/articles/5703485458/24547595003_7a6b8e8c9e_k.jpg'); 
        $manager->persist($media23);


 $media24= new media();
        $media24->setAlt('Huawei P9');   
        $media24->setPath('http://wimages.vr-zone.net/2016/01/Huawei-P9.jpg'); 
        $manager->persist($media24);
/************************************************************************/


 $media25= new media();
        $media25->setAlt('Crampon Nike Mecurial Vert');   
        $media25->setPath('http://sport.foot007.fr/pic/Nike-Mercurial/Crampon-Nike-Mercurial-Vert-1.jpg'); 
        $manager->persist($media25);


/********************************************************************************************/

        $this->addReference('media', $media);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
        $this->addReference('media9', $media9);
        $this->addReference('media10', $media10);
        $this->addReference('media11', $media11);
        $this->addReference('media12', $media12);
        $this->addReference('media13', $media13);
        $this->addReference('media14', $media14);
        $this->addReference('media15', $media15);
        $this->addReference('media16', $media16);
        $this->addReference('media17', $media17);
        $this->addReference('media18', $media18);
        $this->addReference('media19', $media19);
        $this->addReference('media20', $media20);
        $this->addReference('media21', $media21);
        $this->addReference('media22', $media22);
        $this->addReference('media23', $media23);
        $this->addReference('media24', $media24);
        $this->addReference('media25', $media25);
           $this->addReference('media20_', $media20_);
        $this->addReference('media21_', $media21_);







        $manager->flush();

    }


     public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}