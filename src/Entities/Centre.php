<?php
namespace App\Entities;

/**
 * @Entity
 * @Table(name="centres")
 */
class Centre
{
    /**
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="centreid", type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(name="centrename", type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(name="centreactive", type="integer")
     * @var bool
     */
    protected $active;

    /**
     * @OneToMany(targetEntity="User", mappedBy="centre")
     * @var User[]
     */
    protected $leads;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return User[]
     */
    public function getLeads()
    {
        return $this->leads;
    }

    /**
     * @param User[] $leads
     */
    public function setLeads($leads)
    {
        $this->leads = $leads;
    }
}
