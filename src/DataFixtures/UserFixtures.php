<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->encoder = $userPasswordHasherInterface;
    }
  
    public function load(ObjectManager $manager): void
    {
         
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail('admin@admin.com');
        $utilisateur->setName("admin");
        $plainPassword = "passpass";
        $encodedPassword = $this->encoder->hashPassword($utilisateur, $plainPassword);
        $utilisateur->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $utilisateur->setPassword($encodedPassword);
        $manager->persist($utilisateur);

        $manager->flush();
    }
}
