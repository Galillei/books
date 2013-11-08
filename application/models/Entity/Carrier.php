<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Carrier
 *
 * @Table(name="carrier", indexes={@Index(name="fk_id_carriers", columns={"id_workTime"})})
 * @Entity
 */
class Carrier
{
    /**
     * @var integer
     *
     * @Column(name="carrier_id_carrier", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $carrierIdCarrier = '0';

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="surname", type="string", length=50, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @Column(name="middlename", type="string", length=50, nullable=false)
     */
    private $middlename;

    /**
     * @var \Worktime
     *
     * @ManyToOne(targetEntity="Worktime")
     * @JoinColumns({
     *   @JoinColumn(name="id_workTime", referencedColumnName="id_workTime")
     * })
     */
    private $idWorktime;


    /**
     * Get carrierIdCarrier
     *
     * @return integer 
     */
    public function getCarrierIdCarrier()
    {
        return $this->carrierIdCarrier;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Carrier
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
     * Set surname
     *
     * @param string $surname
     * @return Carrier
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
     * Set middlename
     *
     * @param string $middlename
     * @return Carrier
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * Get middlename
     *
     * @return string 
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * Set idWorktime
     *
     * @param \Worktime $idWorktime
     * @return Carrier
     */
    public function setIdWorktime(\Worktime $idWorktime = null)
    {
        $this->idWorktime = $idWorktime;

        return $this;
    }

    /**
     * Get idWorktime
     *
     * @return \Worktime 
     */
    public function getIdWorktime()
    {
        return $this->idWorktime;
    }
}
