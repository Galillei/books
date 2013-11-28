<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Authors
 *
 * @Table(name="authors", indexes={@Index(name="Name_midlename_surname", columns={"name", "surname", "lastname"})})
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
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="surname", type="string", length=128, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @Column(name="lastname", type="string", length=128, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @Column(name="Biography", type="text", nullable=false)
     */
    private $biography;

    /**
     * @var string
     *
     * @Column(name="picturePath", type="string", length=255, nullable=true)
     */
    private $picturepath;


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
     * Set lastname
     *
     * @param string $lastname
     * @return Authors
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
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

    /**
     * Set picturepath
     *
     * @param string $picturepath
     * @return Authors
     */
    public function setPicturepath($picturepath)
    {
        $this->picturepath = $picturepath;

        return $this;
    }

    /**
     * Get picturepath
     *
     * @return string 
     */
    public function getPicturepath()
    {
        return $this->picturepath;
    }
}
