<!DOCTYPE html>
<html>
<head>
    <title>Danh sách nhà cung cấp</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>
<body style="font-size: 10px">
    <div class="row">
        <table border="0" align="center" cellpadding="5" style="border-collapse: collapse;">
            <tr>
                <td colspan="6" align="center" style="font-size: 13px;" width="100">
                    <b>ARMY FASHION Shop</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>http://armyfashion.com/</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>(0292)3.888.999 # 01.222.888.999</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <img src="{{ asset('storage/ddd.jpg') }}" /></td>
            </tr>
            <tr>
                <td colspan="6" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>Danh sách nhà cung cấp</b>
                </td>
            </tr>
            <tr style="border: 1px solid #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Tên nhà cung cấp</th>
                <th style="text-align: center">Địa chỉ</th>
                <th style="text-align: center">Điện thoại</th>
                <th style="text-align: center">Email</th>
            </tr>
            @foreach ($danhsachnhacungcap as $ncc)
            <tr style="border: 1px solid #000">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="left" valign="middle" width="30">{{ $ncc->ncc_ten }}</td>
                <td align="left" valign="middle" width="30">{{ $ncc->ncc_diaChi }}</td>
                <td align="right" valign="middle" width="15">{{ $ncc->ncc_dienThoai }}</td>
                <td align="right" valign="middle" width="15">{{ $ncc->ncc_email }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>