import React, { useEffect, useState } from 'react';
import './Books.css';

function Books() {
    const [books, setBooks] = useState([]);

    useEffect(() => {
        fetch('/books')
        .then(response => response.json())
        .then(data => setBooks(data.data))
        .catch(error => console.error('Error fetching data:', error));
    }, []);

    return (
        <div className="books-container">
        <h1>Libros Disponibles</h1>
        <div className="book-list">
            {books.map(book => (
            <div key={book.id} className="book-item">
                <h2>{book.title}</h2>
                <p>ISBN: {book.isbn}</p>
                <p>Año de Publicación: {book.publicationYear}</p>
                <p>Categoría: {book.category}</p>
            </div>
            ))}
        </div>
        </div>
    );
}

export default Books;
