<!DOCTYPE html>
<html>
<head>
    <title>Danh sách loại sản phẩmtitle>
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
                    <b>Công ty TNHH Sunshine</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>http://sunshine.com/</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>(0292)3.888.999 # 01.222.888.999</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    <img src="{{ asset('storage/storage/sunshine_wm64.png') }}" /></td>
            </tr>
            <tr>
                <td colspan="6" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>Danh sách sản phẩm</b>
                </td>
            </tr>
            <tr style="border: 1px solid #000">
               
                <th style="text-align: center">STT - Mã loại</th>
                <th style="text-align: center">Loại sản phẩm</th>
            </tr>
            @foreach ($danhsachloai as $loai)
            <tr style="border: 1px solid #000">
                    @if ($sp->l_ma == $l->l_ma)
                    <td align="left" width="15" valign="middle">{{ $l->l_ten }}</td>
                    @endif
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>