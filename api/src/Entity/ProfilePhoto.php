<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Controller\UploadProfilePhoto;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ApiResource(collectionOperations={
 *     "get",
 *     "post"={
 *         "method"="POST",
 *         "path"="/upload_profile_photo",
 *         "controller"=UploadProfilePhoto::class,
 *         "defaults"={"_api_receive"=false},
 *     },
 * })
 */
class ProfilePhoto
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(nullable=false)
     * @ApiProperty(iri="http://schema.org/contentUrl")
     */
    private $contentUrl;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContentUrl(): string
    {
        return $this->contentUrl;
    }

    /**
     * @param string $contentUrl
     * @return ProfilePhoto
     */
    public function setContentUrl(string $contentUrl): ProfilePhoto
    {
        $this->contentUrl = $contentUrl;
        return $this;
    }
}