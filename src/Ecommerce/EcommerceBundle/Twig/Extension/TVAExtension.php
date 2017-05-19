<?php
namespace Ecommerce\EcommerceBundle\Twig\Extension;
use Doctrine\Bundle\DoctrineBundle\Twig ;
use Doctrine\Bundle\DoctrineBundle\Twig\Twig_SimpleFilter;

class TVAExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('tva', array($this,'calculTva')));
    }
    
    function calculTva($prixHT,$tva)
    {
        return round($prixHT / $tva,2);
    }
    
    public function getName()
    {
        return 'tva_extension';
    }
}