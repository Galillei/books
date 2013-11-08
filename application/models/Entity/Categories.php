<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @Table(name="categories", indexes={@Index(name="ParentCategory", columns={"ParentCategory"})})
 * @Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @Column(name="id_category", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $idCategory;

    /**
     * @var integer
     *
     * @Column(name="ParentCategory", type="smallint", nullable=false)
     */
    private $parentcategory;

    /**
     * @var string
     *
     * @Column(name="Name", type="string", length=32, nullable=false)
     */
    private $name;


    /**
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set parentcategory
     *
     * @param integer $parentcategory
     * @return Categories
     */
    public function setParentcategory($parentcategory)
    {
        $this->parentcategory = $parentcategory;

        return $this;
    }

    /**
     * Get parentcategory
     *
     * @return integer 
     */
    public function getParentcategory()
    {
        return $this->parentcategory;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Categories
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
}
