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
     * @return Book[] 
     */
    public function findByCategory(string $category)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.category = :val')
            ->setParameter('val', $category)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Book[] 
     */
    public function findPublishedBefore(int $year)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.publicationYear < :year')
            ->setParameter('year', $year)
            ->orderBy('b.publicationYear', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find books with a search term in title or ISBN
     *
     * @param string $searchTerm
     * @return Book[]
     */
    public function searchBooks($searchTerm)
    {
        return $this->createQueryBuilder('b')
            ->where('b.title LIKE :term OR b.isbn LIKE :term')
            ->setParameter('term', '%' . $searchTerm . '%')
            ->getQuery()
            ->getResult();
    }
}
