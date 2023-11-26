const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = 3000;

app.use(cors());
app.use(bodyParser.json());
app.use(express.static('public')); // Serve static files from the 'public' directory

let books = [
  { id: 1, title: 'Book 1', author: 'Author 1' },
  { id: 2, title: 'Book 2', author: 'Author 2' },
];

// Function to generate a unique ID for new books
function generateUniqueId() {
  const ids = books.map(book => book.id);
  return ids.length > 0 ? Math.max(...ids) + 1 : 1;
}

app.get('/api/books', (req, res) => {
  res.json(books);
});

app.post('/api/books', (req, res) => {
  const newBook = req.body;
  newBook.id = generateUniqueId(); // Assign a unique ID to the new book
  books.push(newBook);
  res.json({ message: 'Book added successfully', book: newBook });
});

app.delete('/api/books/:id', (req, res) => {
  const bookId = parseInt(req.params.id);
  books = books.filter(book => book.id !== bookId);
  res.json({ message: 'Book deleted successfully', deletedBookId: bookId });
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
