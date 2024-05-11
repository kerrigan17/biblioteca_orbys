<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return Book[] Returns an array of Book objects
     */
    public function findByCategory(string $category): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.category = :val')
            ->setParameter('val', $category)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Book[] Returns an array of Book objects published before a certain year
     */
    public function findPublishedBefore(int $year): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.publicationYear < :year')
            ->setParameter('year', $year)
            ->orderBy('b.publicationYear', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
