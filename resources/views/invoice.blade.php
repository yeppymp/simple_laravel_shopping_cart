<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .d-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .text-right {
            text-align: right;
        }

        .m-0 {
            margin: 0;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mb-8px {
            margin-bottom: 8px;
        }

        .text-red {
            color: red;
            font-size: 10px;
        }

        .title {
            background-color: #eee;
            padding: 8px 16px;
        }

        table tr:not(:first-child) {
            margin-top: 32px;
        }

        table tr.spacer {
            height: 32px;
        }

        table tr td {
            vertical-align: top;
            padding-right: 32px;
        }

        table tr td.address {
            width: 250px;
        }
    </style>
</head>

<body>

    <div class="header d-flex">
        <div>
            <img src="aquascape-vector-logo.png" alt="Logo" height="75">
            <h2>Aquascape Store</h2>
            <p class="mb-8px">Jl. Pakatesan. Blok II, Desa Cikalahang, Dukupuntang, Kabupaten Cirebon, Jawa Barat, Indonesia</p>
            <p class="m-0"><strong>No.Telepon:</strong> 085 156 353 146 | <strong>Email:</strong> yeppymp@gmail.com</p>
        </div>
        <div class="text-right">
            <h1 class="mb-8px">TAGIHAN</h1>
            <p class="m-0">INV{{ $cart->id }}#9911</p>
            <br>
            <p>Date: {{ date("Y-m-d") }}</p>
        </div>
    </div>

    <div class="guest-detail">
        <h3 class="title">CUSTOMER DETAIL</h3>
        <table>
            <tr>
                <td>
                    <p><strong>Nama</strong></p>
                    <p>{{ $user->name }}</p>
                </td>
                <td>
                    <p><strong>Email</strong></p>
                    <p>{{ $user->email }}</p>
                </td>
                <td>
                    <p><strong>No. Telepon</strong></p>
                    <p>085 156 353 146</p>
                </td>
                <td class="address">
                    <p><strong>Alamat</strong></p>
                    <p>Karang Mulya, Karang Tengah, Tangerang</p>
                </td>
            </tr>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="guest-detail">
        <h3 class="title">DETAIL PRODUCT</h3>
        <table>
            <tr>
                <td>
                    <p><strong>Name</strong></p>
                    @foreach($cart_products as $cp)
                    <p>{{ $cp->product->name }}</p>
                    @endforeach
                </td>
                <td>
                    <p><strong>Quantity</strong></p>
                    @foreach($cart_products as $cp)
                    <p>x{{ $cp->qty }}</p>
                    @endforeach
                </td>
                <td>
                    <p><strong>Price</strong></p>
                    @foreach($cart_products as $cp)
                    <p>Rp. {{ number_format($cp->product->price) }}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p><strong></strong></p>
                    <p class="mt-0"></p>
                </td>
            </tr>
        </table>
    </div>

    <div class="guest-detail">
        <h3 class="title">DETAIL PEMBAYARAN</h3>
        <div class="d-flex">
            <div>
                <table>
                    @php
                        $ongkir = 10000;
                    @endphp
                    <tr>
                        <td>
                            <h3 class="m-0">Subtotal</h3>
                            <p>Rp. {{ number_format($cart->total) }}</p>
                        </td>
                        <td>
                            <h3 class="m-0">Diskon</h3>
                            <p>0%</p>
                        </td>
                        <td>
                            <h3 class="m-0">Ongkos Kirim</h3>
                            <p>Rp. {{ number_format($ongkir) }}</p>
                        </td>
                        <td>
                            <h3 class="m-0">Total</h3>
                            <p>Rp. {{ number_format($cart->total + $ongkir) }}</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="text-right">
                <p><strong>Pembayaran Ke:</strong></p>
                <p>BCA: 778275436</p>
                <p>Atas Nama: Yeppy Mangun Puspitajudin</p>
                <p class="text-red"><small>Pembayaran paling lambat pada: {{ date('Y-m-d', strtotime(' +1 day')) }}</small></p>
            </div>
        </div>
    </div>
</body>

</html>