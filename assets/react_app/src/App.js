import React, { useEffect, useState } from 'react';

function Books() {
    const [books, setBooks] = useState([]);

    useEffect(() => {
        fetch('/books')
            .then(response => response.json())
            .then(data => setBooks(data.data))
            .catch(error => console.error('Error fetching data:', error));
    }, []);

    // Objeto de estilos
    const styles = {
        container: {
            maxWidth: '800px',
            margin: '0 auto',
            padding: '20px',
            textAlign: 'center'
        },
        list: {
            display: 'flex',
            flexWrap: 'wrap',
            justifyContent: 'space-around'
        },
        item: {
            border: '1px solid #ccc',
            borderRadius: '8px',
            padding: '20px',
            margin: '10px',
            width: '30%',
            boxShadow: '0 2px 5px rgba(0,0,0,0.1)',
            transition: 'transform 0.3s ease-in-out'
        },
        itemHover: { // Este estilo se aplicará en el evento onMouseEnter
            transform: 'translateY(-5px)',
            boxShadow: '0 4px 10px rgba(0,0,0,0.2)'
        },
        title: {
            color: '#333',
            fontSize: '1.2rem'
        },
        details: {
            color: '#666',
            fontSize: '0.9rem'
        }
    };

    return (
        <div style={styles.container}>
            <h1>Libros Disponibles</h1>
            <div style={styles.list}>
                {books.map(book => (
                    <div key={book.id} style={styles.item} onMouseEnter={() => {
                        const item = document.getElementById(`book-${book.id}`);
                        Object.assign(item.style, styles.itemHover);
                    }} onMouseLeave={() => {
                        const item = document.getElementById(`book-${book.id}`);
                        Object.assign(item.style, styles.item, {transform: 'none'});
                    }} id={`book-${book.id}`}>
                        <h2 style={styles.title}>{book.title}</h2>
                        <p style={styles.details}>ISBN: {book.isbn}</p>
                        <p style={styles.details}>Año de Publicación: {book.publicationYear}</p>
                        <p style={styles.details}>Categoría: {book.category}</p>
                    </div>
                ))}
            </div>
        </div>
    );
}

export default Books;
