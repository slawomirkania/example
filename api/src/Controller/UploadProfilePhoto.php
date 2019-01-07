<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ProfilePhoto;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UploadProfilePhoto
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * UploadProfilePhoto constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @return ProfilePhoto
     */
    public function __invoke(Request $request): ProfilePhoto
    {
        if ($request->files->count() !== 1) {
            throw new BadRequestHttpException('Invalid amount of photos. We expect only one file.');
        }

        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('profile_photo');
        // move file content somewhere and get URL...

        $profilePhoto = new ProfilePhoto();
        $profilePhoto->setContentUrl('some URL');
        $this->em->persist($profilePhoto);
        $this->em->flush();
        return $profilePhoto;
    }
}