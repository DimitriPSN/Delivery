<?php
namespace Ws\Delivery\Common\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Position
 *
 * @author PISANI Dimitri
 *
 * @package Ws\Delivery\Common\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\PositionRepository")
 * @ORM\Table(name="positions")
 * @ORM\Entity
 */
class Position
{
    /**
     * Identifier of the position
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
   public $id;

    /**
     * Represents the number of the parcel
     * @ORM\Column(name="parcelNumber", type="string", length=255, nullable=false)
     * @var string
     */
   public $parcelNumber;

    /**
     * Represents the latitude of the position
     * @ORM\Column(name="latitude", type="float", nullable=false)
     * @var float
     */
   public $latitude;

    /**
     * Represents the longitude of the position
     * @ORM\Column(name="longitude", type="float", nullable=false)
     * @var float
     */
   public $longitude;

    /**
     * Datetime when the parcel was at this position
     * @ORM\Column(name="`date`", type="datetime", nullable=false)
     * @var \DateTime
     */
   public $date;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Position
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getParcelNumber(): ?string
    {
        return $this->parcelNumber;
    }

    /**
     * @param string $parcelNumber
     * @return Position
     */
    public function setParcelNumber(string $parcelNumber): self
    {
        $this->parcelNumber = $parcelNumber;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Position
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float
     * @return Position
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Position
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}