<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @Table(name="users", indexes={@Index(name="id_rootuser", columns={"id_rootuser"})})
 * @Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @Column(name="id_users", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idUsers;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=127, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=64, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="place", type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @var string
     *
     * @Column(name="telephone", type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @var \Rootuser
     *
     * @ManyToOne(targetEntity="Rootuser")
     * @JoinColumns({
     *   @JoinColumn(name="id_rootuser", referencedColumnName="id_rootuser")
     * })
     */
    private $idRootuser;


    /**
     * Get idUsers
     *
     * @return integer 
     */
    public function getIdUsers()
    {
        return $this->idUsers;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Users
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Users
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Users
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set idRootuser
     *
     * @param \Rootuser $idRootuser
     * @return Users
     */
    public function setIdRootuser(\Rootuser $idRootuser = null)
    {
        $this->idRootuser = $idRootuser;

        return $this;
    }

    /**
     * Get idRootuser
     *
     * @return \Rootuser 
     */
    public function getIdRootuser()
    {
        return $this->idRootuser;
    }
}
