<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraping Page</title>
</head>
<body>
    <form action="/scrap" method="POST">
        @csrf
        <button type="submit">Test Scraping</button>
    </form>
</body>
</html>