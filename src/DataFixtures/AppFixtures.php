<?php

namespace App\DataFixtures;

use App\Entity\Courses;
use App\Entity\News;
use Cocur\Slugify\SlugifyInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;

    private $slug;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->faker = Factory::create();
        $this->slug = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadNews($manager);
        $this->loadCourses($manager);
    }

    private function loadNews(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; $i++) {
            $news = new News();
            $news->setTitle($this->faker->text(100));
            $news->setLinkText($this->faker->text(100));
            $news->setBody($this->faker->text(1000));
            $news->setPushText($this->faker->text(1000));
            $news->setCreatedAt($this->faker->dateTime);
            $news->setUpdatedAt($this->faker->dateTime);
            $news->setSubtitle($this->faker->text(500));
            $news->setIsPublished((bool)random_int(0, 1));
            $news->setLink($this->faker->url);

            $manager->persist($news);
        }
        $manager->flush();
    }


    private function loadCourses(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; $i++) {
            $news = new Courses();
            $news->setTitle($this->faker->text(100));
            $news->setDescription($this->faker->text(1000));
            $news->setImageFileName($this->faker->slug);
            $news->setImageContentType($this->faker->fileExtension);
            $news->setImageFileSize('30000');
            $news->setImageFileSize('30000');
            $news->setCreatedAt($this->faker->dateTime);
            $news->setUpdatedAt($this->faker->dateTime);
            $news->setImageUpdatedAt($this->faker->dateTime);
            $news->setMode("course");

            $manager->persist($news);
        }
        $manager->flush();
    }
}
