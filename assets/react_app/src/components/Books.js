import React, { useEffect, useState } from 'react';

function Books() {
    const [books, setBooks] = useState([]);

    useEffect(() => {
        fetch('/books') // No necesitas especificar el puerto gracias al proxy
            .then(response => response.json())
            .then(data => setBooks(data.data));
    }, []);

    return (
        <div>
            <h1>List of Books</h1>
            <ul>
                {books.map(book => (
                    <li key={book.id}>
                        {book.title} - {book.category}
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default Books;
