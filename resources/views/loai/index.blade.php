<h1>HELLO DS LOAI</h1>

<table border = "2">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachloai as $loai)
            <tr>
                <td>{{ $loai->l_ma }}</td>
                <td>{{ $loai->l_ten }}</td>
            </tr>
        @endforeach
    </tbody>
</table>