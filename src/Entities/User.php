<?php
namespace App\Entities;

use DateTime;

/**
 * @Entity(repositoryClass="App\Repositories\UserRepository")
 * @Table(name="users")
 */
class User implements TransformableEntity
{
    /**
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="uid", type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $username;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $firstname;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $surname;

    /**
     * @Column(name="created", type="integer")
     * @var int
     */
    protected $createdTimestamp;

    /**
     * @ManyToOne(targetEntity="Centre", inversedBy="users")
     * @JoinColumn(name="centreid", referencedColumnName="centreid")
     * @var Centre
     */
    protected $centre;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return int
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * @param int $createdTimestamp
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;
    }

    /**
     * @return Centre
     */
    public function getCentre()
    {
        return $this->centre;
    }

    /**
     * @param Centre $centre
     */
    public function setCentre($centre)
    {
        $this->centre = $centre;
    }

    /**
     * @return array
     */
    public function transform()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'surname' => $this->surname,
            'created_timestamp' => $this->createdTimestamp,
            'created_at' => date('c', $this->createdTimestamp),
            'centre_id' => $this->centre->getId(),
            'centre_name' => $this->centre->getName(),
        ];
    }
}
