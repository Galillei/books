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
