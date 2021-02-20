<?php
namespace App\DataFixtures;

use App\Entity\Statistics;
use App\Entity\Teachr;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TeachrFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()
    {

        // TODO: Implement getDependencies() method.
    }

    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create('FR_fr');

        $tab = array(
            "Universtté de Paris Sorbonne",
            "Universtté de Nantes",
            "Universtté de Pau",
            "Universtté de Paul Sabatier Toulouss",
            "Universtté de Rennes",
            "Universtté d'Angers",
            "Polytechnique Lyon",
            "Universtté d'Aix Marseille",
            "Ecole de Commerce Paris",
            "Universtté de Bordeaux",
            "Universtté Paris Dauphine"
        );

        for ($i = 0; $i < 10; $i++)
        {
            $teach = new Teachr();

            $teach->setPrenom($faker->name);
            $teach->setDescription($faker->paragraph());
            $teach->setFormation($tab[rand(0, 10)]);
            $teach->setImage($faker->imageUrl(50, 30));
            $teach->setDateCreation(new \DateTime());

            $manager->persist($teach);
        }

        $statistics = new Statistics();
        $statistics->setCompteur($i);

        $manager->persist($statistics);

        $manager->flush();
    }
}