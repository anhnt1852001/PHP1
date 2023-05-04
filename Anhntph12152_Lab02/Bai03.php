<?php
$arr = [
    ['id' => 1, 'name' => 'Nguyễn văn Nam', 'email' => 'namnv@gmail.com', 'address' => 'Hòa Bình'],
    ['id' => 2, 'name' => 'Lê Quang Long', 'email' => 'longlq@gmail.com', 'address' => 'Hòa Bình'],
    ['id' => 3, 'name' => 'Trinh Lê Ninh', 'email' => 'Ninhtl@gmail.com', 'address' => 'Hà Nam'],
    ['id' => 4, 'name' => 'Bùi Đúc Huy', 'email' => 'huybh@gmail.com', 'address' => 'Hà Nội'],
    ['id' => 5, 'name' => 'Lưu quang điệp', 'email' => 'dienlq@gmail.com', 'address' => 'Thái Bình']
];

echo "
 <table border=1; width=500; style=text-align:center;>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Email</th>
            <th>Adress</tdh>
        </tr>";

foreach ($arr as $items) {
    echo "<tr>";
    foreach ($items as $item) {
        echo "<td> $item </td>";
    }
    echo "</tr>";
}
echo "</table>";
