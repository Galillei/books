<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Authors
 *
 * @Table(name="authors")
 * @Entity
 */
class Authors
{
    /**
     * @var integer
     *
     * @Column(name="id_author", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idAuthor;

    /**
     * @var string
     *
     * @Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="midlename", type="string", length=128, nullable=true)
     */
    private $midlename;

    /**
     * @var string
     *
     * @Column(name="surname", type="string", length=128, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @Column(name="Biography", type="text", nullable=false)
     */
    private $biography;


    /**
     * Get idAuthor
     *
     * @return integer 
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Authors
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
     * Set midlename
     *
     * @param string $midlename
     * @return Authors
     */
    public function setMidlename($midlename)
    {
        $this->midlename = $midlename;

        return $this;
    }

    /**
     * Get midlename
     *
     * @return string 
     */
    public function getMidlename()
    {
        return $this->midlename;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Authors
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return Authors
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }
}
