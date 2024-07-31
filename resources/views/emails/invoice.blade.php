<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice</h1>
    <p>Book: {{ $orderItem->book->title }}</p>
    <p>Quantity: {{ $orderItem->quantity }}</p>
    <p>Price per item: {{ $orderItem->price }}</p>
    <p>Total Price: {{ $orderItem->quantity * $orderItem->price }}</p>
</body>
</html>
