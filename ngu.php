<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Thiết lập các thuộc tính cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        /* Thiết lập các thuộc tính cho ô đầu tiên của hàng */
        th {
            background-color: #ff8e51;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            text-align: left;
        }

        /* Thiết lập các thuộc tính cho ô của bảng */
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }
    </style>
    <title>CSS Table Example</title>
</head>
<body>

    <!-- Bảng -->
    <table>
        <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
                <th>Header 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1, Cell 1</td>
                <td>Row 1, Cell 2</td>
                <td>Row 1, Cell 3</td>
            </tr>
            <tr>
                <td>Row 2, Cell 1</td>
                <td>Row 2, Cell 2</td>
                <td>Row 2, Cell 3</td>
            </tr>
            <!-- Thêm các dòng khác nếu cần -->
        </tbody>
    </table>

</body>
</html>
