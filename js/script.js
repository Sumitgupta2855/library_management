document.addEventListener('DOMContentLoaded', async () => {
    const response = await fetch('php/get_books.php');
    const books = await response.json();
    const tableBody = document.getElementById('bookTableBody');

    books.forEach(book => {
        const row = `<tr>
            <td>${book.title}</td>
            <td>${book.author}</td>
            <td>${book.genre}</td>
            <td>${book.year}</td>
            <td>${book.status}</td>
            <td>${book.id}</td>
        </tr>`;
        tableBody.innerHTML += row;
    });
});
