<!DOCTYPE html>
<html>
<head>
    <title>Danh sách nhà cung cấp</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }
        body {
            font-size: 10px;
        }
        table {
            border-collapse: collapse;
        }
        td {
            vertical-align: middle;
        }
        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }
        .hinhSanPham {
            width: 100px;
            height: 100px;
        }
        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    ARMY FASHION Shop<br />
                    http://armyfashion.com/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img src="{{ asset('storage/storage/ddd.jpg') }}" wight="50px" height="50px" />
                </td>
            </tr> <!--public/storage/photos/floral-2622309_960_720.jpg-->
        </table> <!--storage/storage/sunshine_wm64.png-->
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachnhacungcap)/5);
         ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Danh sách nhà cung cấp</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            @foreach ($danhsachnhacungcap as $ncc)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $ncc->ncc_ten }}</td>
                <td align="right">{{ $ncc->ncc_diaChi }}</td>
                <td align="right">{{ $ncc->ncc_dienThoai }}</td>
                <td align="right">{{ $ncc->ncc_email }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>
</html>