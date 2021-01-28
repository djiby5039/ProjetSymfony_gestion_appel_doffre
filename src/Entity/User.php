<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $username;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
     ///////////////////////////////////

     /**
      * @see UserInterface
      */
     public function getSalt(){


     }

     public function getUsername(): string
     {
         return (string) $this->email;
     }

     public function getRoles(): array
     {
         $roles = $this->roles;
         // guarantee every user at least has ROLE_USER
         $roles[] = 'ROLE_USER';
 
         return array_unique($roles);
     }

     public function setRoles(array $roles): self
     {
         $this->roles = $roles;
 
         return $this;
     }

     public function eraseCredentials(){
            // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
     }

     public function setUsername(?string $username): self
     {
         $this->username = $username;

         return $this;
     }

     
    
}
