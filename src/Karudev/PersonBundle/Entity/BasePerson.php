<?php

namespace Karudev\PersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Karudev\PersonBundle\Service\FileService;
use Symfony\Component\Filesystem\Filesystem;


/**
 * 
 * BasePerson
 * @ORM\Table(name="base_person")
 * @ORM\Entity(repositoryClass="Karudev\PersonBundle\Repository\PersonRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({

 * })
 *
 */
abstract class BasePerson
{

    const GENDER_MAN = 'H';
    const GENDER_WOMAN = 'F';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    protected $gender;

    /**
     *
     *
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=64, nullable=true)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=64, nullable=true)
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=true)
     */
    protected $email;


    /**
     * @var string
     *
     * @ORM\Column(name="main_phone", type="string", length=25,nullable=true)
     */
    protected $mainPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="secondary_phone", type="string", length=20, nullable=true)
     */
    protected $secondaryPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="address_complement", type="string", length=255, nullable=true)
     */
    protected $addressComplement;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=10,nullable=true)
     */
    protected $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=64,nullable=true)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=64,nullable=true)
     */
    protected $district;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     */
    protected $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    protected $birthday;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime",nullable=true)
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime",nullable=true)
     */
    protected $deletedAt;


    
    /**
     *
     * @Assert\File(maxSize="10000000",mimeTypesMessage="Seuls les fichiers jpg, gif, png sont autorisés",mimeTypes={"image/png","image/jpeg","image/gif"})
     */
    protected $file;
    
    /**
     * @var string
     *
     * @ORM\Column(name="file_path",type="string",length=255,nullable=true)
     */
    protected $filePath;

    
    public function __toString() {
        return $this->getCivility().' '.$this->firstname.' '.$this->lastname;
    }
    
    public function getCivility(){
        $civility = null;
        
        if($this->gender == self::GENDER_MAN){
          $civility = "M."; 
        } elseif($this->gender == self::GENDER_WOMAN){
           $civility = "MME";   
        }
        
        return $civility;
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get mainPhone
     *
     * @return string
     */
    public function getMainPhone()
    {
        return $this->mainPhone;
    }

    /**
     * Set mainPhone
     *
     * @param string $mainPhone
     *
     * @return Person
     */
    public function setMainPhone($mainPhone)
    {
        $this->mainPhone = $mainPhone;

        return $this;
    }

    /**
     * Get secondaryPhone
     *
     * @return string
     */
    public function getSecondaryPhone()
    {
        return $this->secondaryPhone;
    }

    /**
     * Set secondaryPhone
     *
     * @param string $secondaryPhone
     *
     * @return Person
     */
    public function setSecondaryPhone($secondaryPhone)
    {
        $this->secondaryPhone = $secondaryPhone;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Person
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get addressComplement
     *
     * @return string
     */
    public function getAddressComplement()
    {
        return $this->addressComplement;
    }

    /**
     * Set addressComplement
     *
     * @param string $addressComplement
     *
     * @return Person
     */
    public function setAddressComplement($addressComplement)
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Person
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Person
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return Person
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Person
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Person
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Person
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt != null ? $this->updatedAt : $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Person
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Person
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }



    
    /**
     * Get the picture with the person id
     */
    public function getAssetPicture()
    {
        $ext = ['png','jpg','jpeg','gif'];
        
        $assetPath = $this->getUploadDir().'/0.png';
        
        foreach ($ext as $value) {
            
            $fileTest = $this->getBaseWeb().$this->getUploadDir().'/'.$this->getId().'.'.$value;
            
            if(file_exists($fileTest)){
                $assetPath = $this->getUploadDir().'/'.$this->getId().'.'.$value;
            }
        }
        
        
        return $assetPath;
    }
    
    public function getBaseWeb()
    {
        $uploadDir = __DIR__.'/../../../../web';
        
        return $uploadDir;
    }
    
    public function getUploadDir()
    {
        $uploadDir = '/uploads/persons';
        
        return $uploadDir;
    }

 
    
     /**
     * Set file
     *
     * @param File $file
     */
    public function setFile($file) {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return File
     */
    public function getFile() {
        return $this->file;
    }
    
    public function preUpload() {
        if ($this->id != null && null !== $this->file) {
            $this->removeUpload();
        }

      
        if (null !== $this->file) {


            $this->filePath = uniqid() . '.' . $this->file->guessExtension();
        }
        
        
       
    }

    public function upload() {

        if ($this->file != null) {

            $ext = $this->file->guessExtension();
            $this->file->move($this->getUploadRootDir(), $this->filePath);
           
            FileService::resizeFile($this->getUploadRootDir() . '/' . $this->filePath, $ext, null, 150);
 
            unset($this->file);
        }
    }

    /**
     * @ORM\PreRemove
     */
    public function removeUpload() {

        $fs = new Filesystem();
        if ($fs->exists($this->getAbsolutePath($this->filePath)) && $this->filePath != null) {
            unlink($this->getAbsolutePath($this->filePath));
        }
    }

    public function getAbsolutePath($file) {
        return $this->getUploadRootDir() . '/' . $file;
    }

   
    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../web/uploads/picture';
    }
    
    public function getPicture(){
        
        $fs = new Filesystem();
        $basePath = '/uploads/picture';
        if ($fs->exists($this->getAbsolutePath($this->filePath)) && $this->filePath != null) {
            return $basePath.'/'.$this->filePath;
        }else{
            return $basePath.'/0.png';
        }
        
    }

   

    /**
     * Set filePath
     *
     * @param string $filePath
     *
     * @return Document
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}
