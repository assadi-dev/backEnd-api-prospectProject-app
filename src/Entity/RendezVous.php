<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Utils\UserOwnedInterface;
use App\Controller\RendezVousCollection;
use App\Repository\RendezVousRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ApiResource(
 *        collectionOperations={
 *          "get",
 *          "post"={
 *              "security"="is_granted('IS_AUTHENTICATED_FULLY')",
 *              "openapi_context" = {"security"={{"bearerAuth"={}}}}
 *           },
 *          "rendezVousCollection" = {
 *              "method"="get",
 *              "path"="/rendez_vous/collections",
 *              "controller"= RendezVousCollection::class,
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

 *  )
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 * @ApiFilter(SearchFilter::Class,properties={"nom": "start"})
 * @ApiFilter(BooleanFilter::class, properties={"checked"})
 * @ApiFilter(OrderFilter::class, properties={"nom","createdAt","updatedAt","date"})
 */
class RendezVous implements UserOwnedInterface
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $checked;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rendezVous")
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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
