<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Publishers
 *
 * @Table(name="publishers")
 * @Entity
 */
class Publishers
{
    /**
     * @var integer
     *
     * @Column(name="id_publisher", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idPublisher;

    /**
     * @var string
     *
     * @Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="Description", type="text", nullable=false)
     */
    private $description;


    /**
     * Get idPublisher
     *
     * @return integer 
     */
    public function getIdPublisher()
    {
        return $this->idPublisher;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Publishers
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
     * Set description
     *
     * @param string $description
     * @return Publishers
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
