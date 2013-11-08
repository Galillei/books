<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Rootuser
 *
 * @Table(name="rootuser")
 * @Entity
 */
class Rootuser
{
    /**
     * @var integer
     *
     * @Column(name="id_rootuser", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idRootuser;

    /**
     * @var \DateTime
     *
     * @Column(name="time_start", type="time", nullable=true)
     */
    private $timeStart;

    /**
     * @var \DateTime
     *
     * @Column(name="time_end time", type="time", nullable=true)
     */
    private $timeEndTime;

    /**
     * @var \DateTime
     *
     * @Column(name="datework", type="date", nullable=true)
     */
    private $datework;


    /**
     * Get idRootuser
     *
     * @return integer 
     */
    public function getIdRootuser()
    {
        return $this->idRootuser;
    }

    /**
     * Set timeStart
     *
     * @param \DateTime $timeStart
     * @return Rootuser
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return \DateTime 
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set timeEndTime
     *
     * @param \DateTime $timeEndTime
     * @return Rootuser
     */
    public function setTimeEndTime($timeEndTime)
    {
        $this->timeEndTime = $timeEndTime;

        return $this;
    }

    /**
     * Get timeEndTime
     *
     * @return \DateTime 
     */
    public function getTimeEndTime()
    {
        return $this->timeEndTime;
    }

    /**
     * Set datework
     *
     * @param \DateTime $datework
     * @return Rootuser
     */
    public function setDatework($datework)
    {
        $this->datework = $datework;

        return $this;
    }

    /**
     * Get datework
     *
     * @return \DateTime 
     */
    public function getDatework()
    {
        return $this->datework;
    }
}
