<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }

    /**
     * @return Image[] Returns an array of Image objects linked to a book
     */
    public function findByBookId(int $bookId): array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.book = :val')
            ->setParameter('val', $bookId)
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
