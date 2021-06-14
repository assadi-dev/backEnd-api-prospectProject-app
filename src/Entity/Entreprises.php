<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Utils\UserOwnedInterface;
use App\Controller\EntreprisesCollection;
use App\Repository\EntreprisesRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ApiResource(
 *      
 *      collectionOperations={
 *          "get",
 *          "post"={"security"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "openapi_context" = {"security"={{"bearerAuth"={}}}}
 *           },
 *          "entrepriseCollection" = {
 *              "method"="get",
 *              "path"="/entreprises/collections",
 *              "controller"= EntreprisesCollection::class,
 *              
 *          }
 *           
 * 
 *      },
 *      itemOperations ={
 *          "get",
 *          "put"={"security"="is_granted('IS_AUTHENTICATED_FULLY')","openapi_context" ={"security"={{"bearerAuth"={}}}  }},
 *          "delete"={"security"="is_granted('IS_AUTHENTICATED_FULLY')","openapi_context" ={"security"={{"bearerAuth"={}}}  }},
 * 
 *     },
 *      
 *         
 *      
 * )
 * @ORM\Entity(repositoryClass=EntreprisesRepository::class)
 * @ApiFilter(SearchFilter::Class,properties={"nom": "start","ville":"start","codePostal":"start"})
 * @ApiFilter(BooleanFilter::class, properties={"checked"})
 * @ApiFilter(OrderFilter::class, properties={"nom","createAt","updateAt"})
 */
class Entreprises implements UserOwnedInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $checked;

    /**
     * @ORM\Column(type="datetime", nullable=true )
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="entreprises")
     */
    private $user_id;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    public function setChecked(?bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(?\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
