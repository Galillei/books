<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Worktime
 *
 * @Table(name="workTime")
 * @Entity
 */
class Worktime
{
    /**
     * @var integer
     *
     * @Column(name="id_workTime", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idWorktime;

    /**
     * @var string
     *
     * @Column(name="timeWorks", type="string", length=255, nullable=false)
     */
    private $timeworks;


    /**
     * Get idWorktime
     *
     * @return integer 
     */
    public function getIdWorktime()
    {
        return $this->idWorktime;
    }

    /**
     * Set timeworks
     *
     * @param string $timeworks
     * @return Worktime
     */
    public function setTimeworks($timeworks)
    {
        $this->timeworks = $timeworks;

        return $this;
    }

    /**
     * Get timeworks
     *
     * @return string 
     */
    public function getTimeworks()
    {
        return $this->timeworks;
    }
}
