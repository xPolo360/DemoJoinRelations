<?php

namespace App\DataFixtures;

use App\Entity\Example;
use App\Entity\Relation1;
use App\Entity\Relation2;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $relation1 = (new Relation1())
                ->setRelationProperty1($faker->word)
                ->setRelationProperty2($faker->word);
            $example = (new Example())
                ->setProperty1($faker->word)
                ->setProperty2($faker->word)
                ->setRelation1($relation1);
            for ($j = 0; $j < rand(0, 4); $j++) {
                $relation2 = (new Relation2())
                    ->setRelationProperty1($faker->word);
                $example->addRelation2($relation2);
            }
            $manager->persist($example);
        }

        $manager->flush();
    }
}
