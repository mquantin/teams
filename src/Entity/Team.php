<?php
namespace Teams\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Omeka\Entity\AbstractEntity;

/**
 *
 * @Entity
 * @Table(name="team")
 */
class Team extends AbstractEntity
{
    /**
     * @var int
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string", length=240, unique=true, nullable=false)
     */
    protected $name;

    /**
     * @Column(type="text", nullable=false)
     */
    protected $description;

    /* *
     *
     * @var ArrayCollection|User[]
     * @ManyToMany(
     *     targetEntity="Omeka\Entity\User",
     *     mappedBy="team",
     *     inversedBy="user"
     * )
     * @JoinTable(
     *     name="team_user",
     *     joinColumns={
     *         @JoinColumn(
     *             name="team_id",
     *             referencedColumnName="id",
     *             onDelete="cascade",
     *             nullable=false
     *         )
     *     },
     *     inverseJoinColumns={
     *         @JoinColumn(
     *             name="user_id",
     *             referencedColumnName="id",
     *             onDelete="cascade",
     *             nullable=false
     *         )
     *     }
     * )
     */
    protected $users;

    /**
     * @var ArrayCollection|TeamUser[]
     * @OneToMany(
     *     targetEntity="Teams\Entity\TeamUser",
     *     mappedBy="team",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $team_users;

    /* *
     *
     * Many Teams have Many Resources.
     * @var Collection|Resource[]
     * @ManyToMany(
     *     targetEntity="Omeka\Entity\Resource",
     *     mappedBy="team",
     *     inversedBy="resource"
     * )
     * @JoinTable(
     *     name="team_resource",
     *     joinColumns={
     *         @JoinColumn(
     *             name="team_id",
     *             referencedColumnName="id",
     *             onDelete="cascade",
     *             nullable=false
     *         )
     *     },
     *     inverseJoinColumns={
     *         @JoinColumn(
     *             name="resource_id",
     *             referencedColumnName="id",
     *             onDelete="cascade",
     *             nullable=false
     *         )
     *     }
     * )
     */
    protected $resources;

    /**
     * @var Collection|TeamResource[]
     * @OneToMany(
     *     targetEntity="Teams\Entity\TeamResource",
     *     mappedBy="team",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $team_resources;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->team_users = new ArrayCollection();
        $this->resources = new ArrayCollection();
        $this->team_resources = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function getTeamUsers()
    {
        return $this->team_users;
    }


    public function getResources()
    {
        return $this->resources;
    }

    public function getTeamResources()
    {
        return $this->team_resources;
    }
}
