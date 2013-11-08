<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @Table(name="books", indexes={@Index(name="fk_id_category", columns={"id_category"}), @Index(name="fk_id_publisher", columns={"id_publisher"}), @Index(name="fk_id_author", columns={"id_author"})})
 * @Entity
 */
class Books
{
    /**
     * @var integer
     *
     * @Column(name="id_books", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idBooks;

    /**
     * @var string
     *
     * @Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="ISBN", type="string", length=13, nullable=false)
     */
    private $isbn;

    /**
     * @var string
     *
     * @Column(name="ImageHREF", type="string", length=255, nullable=false)
     */
    private $imagehref;

    /**
     * @var string
     *
     * @Column(name="Synopsis", type="text", nullable=false)
     */
    private $synopsis;

    /**
     * @var integer
     *
     * @Column(name="PagesCount", type="smallint", nullable=false)
     */
    private $pagescount;

    /**
     * @var \DateTime
     *
     * @Column(name="PublicationDate", type="date", nullable=false)
     */
    private $publicationdate;

    /**
     * @var \DateTime
     *
     * @Column(name="AppearDate", type="date", nullable=false)
     */
    private $appeardate;

    /**
     * @var string
     *
     * @Column(name="Price", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @Column(name="count_books", type="integer", nullable=true)
     */
    private $countBooks = '0';

    /**
     * @var \Authors
     *
     * @ManyToOne(targetEntity="Authors")
     * @JoinColumns({
     *   @JoinColumn(name="id_author", referencedColumnName="id_author")
     * })
     */
    private $idAuthor;

    /**
     * @var \Categories
     *
     * @ManyToOne(targetEntity="Categories")
     * @JoinColumns({
     *   @JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;

    /**
     * @var \Publishers
     *
     * @ManyToOne(targetEntity="Publishers")
     * @JoinColumns({
     *   @JoinColumn(name="id_publisher", referencedColumnName="id_publisher")
     * })
     */
    private $idPublisher;


    /**
     * Get idBooks
     *
     * @return integer 
     */
    public function getIdBooks()
    {
        return $this->idBooks;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Books
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
     * Set isbn
     *
     * @param string $isbn
     * @return Books
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set imagehref
     *
     * @param string $imagehref
     * @return Books
     */
    public function setImagehref($imagehref)
    {
        $this->imagehref = $imagehref;

        return $this;
    }

    /**
     * Get imagehref
     *
     * @return string 
     */
    public function getImagehref()
    {
        return $this->imagehref;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Books
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set pagescount
     *
     * @param integer $pagescount
     * @return Books
     */
    public function setPagescount($pagescount)
    {
        $this->pagescount = $pagescount;

        return $this;
    }

    /**
     * Get pagescount
     *
     * @return integer 
     */
    public function getPagescount()
    {
        return $this->pagescount;
    }

    /**
     * Set publicationdate
     *
     * @param \DateTime $publicationdate
     * @return Books
     */
    public function setPublicationdate($publicationdate)
    {
        $this->publicationdate = $publicationdate;

        return $this;
    }

    /**
     * Get publicationdate
     *
     * @return \DateTime 
     */
    public function getPublicationdate()
    {
        return $this->publicationdate;
    }

    /**
     * Set appeardate
     *
     * @param \DateTime $appeardate
     * @return Books
     */
    public function setAppeardate($appeardate)
    {
        $this->appeardate = $appeardate;

        return $this;
    }

    /**
     * Get appeardate
     *
     * @return \DateTime 
     */
    public function getAppeardate()
    {
        return $this->appeardate;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Books
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set countBooks
     *
     * @param integer $countBooks
     * @return Books
     */
    public function setCountBooks($countBooks)
    {
        $this->countBooks = $countBooks;

        return $this;
    }

    /**
     * Get countBooks
     *
     * @return integer 
     */
    public function getCountBooks()
    {
        return $this->countBooks;
    }

    /**
     * Set idAuthor
     *
     * @param \Authors $idAuthor
     * @return Books
     */
    public function setIdAuthor(\Authors $idAuthor = null)
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }

    /**
     * Get idAuthor
     *
     * @return \Authors 
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }

    /**
     * Set idCategory
     *
     * @param \Categories $idCategory
     * @return Books
     */
    public function setIdCategory(\Categories $idCategory = null)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return \Categories 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set idPublisher
     *
     * @param \Publishers $idPublisher
     * @return Books
     */
    public function setIdPublisher(\Publishers $idPublisher = null)
    {
        $this->idPublisher = $idPublisher;

        return $this;
    }

    /**
     * Get idPublisher
     *
     * @return \Publishers 
     */
    public function getIdPublisher()
    {
        return $this->idPublisher;
    }
}
