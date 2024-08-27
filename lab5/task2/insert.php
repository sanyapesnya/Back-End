<!DOCTYPE html>
<html>
<head>
    <title>Додати новий запис</title>
</head>
<body>
<h1>Додати новий запис</h1>

<form action="insert_handler.php" method="post">
    <label for="name">Назва:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="category">Категорія:</label>
    <input type="text" name="category" id="category" required><br>

    <label for="price">Ціна:</label>
    <input type="number" step="0.01" name="price" id="price" required><br>

    <label for="quantity">Кількість:</label>
    <input type="number" name="quantity" id="quantity" required><br>

    <label for="description">Опис:</label>
    <textarea name="description" id="description" required></textarea><br>

    <button type="submit">Додати</button>
</form>
</body>
</html>
