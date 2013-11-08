<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @Table(name="order", indexes={@Index(name="fk_id_books", columns={"id_books"}), @Index(name="fk_id_users", columns={"id_users"}), @Index(name="id_carrier", columns={"id_carrier"})})
 * @Entity
 */
class Order
{
    /**
     * @var integer
     *
     * @Column(name="id_order", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idOrder;

    /**
     * @var \DateTime
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @Column(name="time", type="time", nullable=true)
     */
    private $time;

    /**
     * @var integer
     *
     * @Column(name="count", type="integer", nullable=false)
     */
    private $count = '1';

    /**
     * @var boolean
     *
     * @Column(name="place", type="boolean", nullable=false)
     */
    private $place;

    /**
     * @var \Books
     *
     * @ManyToOne(targetEntity="Books")
     * @JoinColumns({
     *   @JoinColumn(name="id_books", referencedColumnName="id_author")
     * })
     */
    private $idBooks;

    /**
     * @var \Users
     *
     * @ManyToOne(targetEntity="Users")
     * @JoinColumns({
     *   @JoinColumn(name="id_users", referencedColumnName="id_users")
     * })
     */
    private $idUsers;

    /**
     * @var \Carrier
     *
     * @ManyToOne(targetEntity="Carrier")
     * @JoinColumns({
     *   @JoinColumn(name="id_carrier", referencedColumnName="carrier_id_carrier")
     * })
     */
    private $idCarrier;


    /**
     * Get idOrder
     *
     * @return integer 
     */
    public function getIdOrder()
    {
        return $this->idOrder;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Order
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Order
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return Order
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set place
     *
     * @param boolean $place
     * @return Order
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return boolean 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set idBooks
     *
     * @param \Books $idBooks
     * @return Order
     */
    public function setIdBooks(\Books $idBooks = null)
    {
        $this->idBooks = $idBooks;

        return $this;
    }

    /**
     * Get idBooks
     *
     * @return \Books 
     */
    public function getIdBooks()
    {
        return $this->idBooks;
    }

    /**
     * Set idUsers
     *
     * @param \Users $idUsers
     * @return Order
     */
    public function setIdUsers(\Users $idUsers = null)
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    /**
     * Get idUsers
     *
     * @return \Users 
     */
    public function getIdUsers()
    {
        return $this->idUsers;
    }

    /**
     * Set idCarrier
     *
     * @param \Carrier $idCarrier
     * @return Order
     */
    public function setIdCarrier(\Carrier $idCarrier = null)
    {
        $this->idCarrier = $idCarrier;

        return $this;
    }

    /**
     * Get idCarrier
     *
     * @return \Carrier 
     */
    public function getIdCarrier()
    {
        return $this->idCarrier;
    }
}
