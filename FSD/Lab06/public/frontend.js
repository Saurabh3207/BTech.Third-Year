// public/frontend.js

// Function to fetch and display books
async function fetchBooks() {
  const response = await fetch('http://localhost:3000/api/books');
  const books = await response.json();

  const bookList = document.getElementById('bookList');
  bookList.innerHTML = '';

  const ul = document.createElement('ul'); // Add an unordered list container

  books.forEach(book => {
      const li = document.createElement('li');
      li.innerHTML = `${book.title} by ${book.author} 
                     <button onclick="deleteBook(${book.id})">Delete</button>`;
      ul.appendChild(li);
  });

  bookList.appendChild(ul); // Append the list to the bookList container
}

// Function to add a new book
async function addBook() {
  const title = document.getElementById('title').value;
  const author = document.getElementById('author').value;

  const response = await fetch('http://localhost:3000/api/books', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ title, author }),
  });

  const result = await response.json();
  console.log(result);

  // Fetch and display updated book list
  fetchBooks();
}

// Function to delete a book by ID
async function deleteBook(id) {
  const response = await fetch(`http://localhost:3000/api/books/${id}`, {
    method: 'DELETE',
  });

  const result = await response.json();
  console.log(result);

  // Fetch and display updated book list
  fetchBooks();
}

// Initial fetch and display of books
fetchBooks();
