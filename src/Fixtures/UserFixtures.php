<?php

namespace App\Fixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
      $user = new User();
      $user->setEmail('admin@admin.com');
  
      // $password = $this->encoder->encodePassword($user, 'pass_1234');
      $user->setPassword("passer");
  
      $manager->persist($user);
      $manager->flush();
    }
}