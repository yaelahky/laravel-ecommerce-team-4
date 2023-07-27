<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Halaman Cek Ongkir</h2>

        <div class="w-50">
            <form action="" method="POST">
                @csrf
                <div class='mt-3'>
                    <label for="origin">Asal Kota</label>
                    <select name="origin" id="origin" class="form-control" required>
                        <option value="">Pilih Kota Asal</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class='mt-3'>
                    <label for="destination">Kota Tujuan</label>
                    <select name="destination" id="destination" class="form-control" required>
                        <option value="">Pilih Kota Tujuan</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class='mt-3'>
                    <label for="weight">Berat Paket</label>
                    <input type="number" name="weight" id="weight" class="form-control" required>
                </div>

                <div class='mt-3'>
                    <label for="courier">Kurir</label>
                    <select name="courier" id="courier" class="form-control" required>
                        <option value="">Pilih Kurir</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                </div>

                <div class='mt-3'>
                    <input type="submit" name="cekOngkir" class="btn btn-primary w-100">
                </div>

            <div class='mt-5'>
                @if ($ongkir != '')
                    <h3>Rincian Ongkir</h3>

                    <h4>
                        <ul>
                            <li>Asal Kota : {{ $ongkir['origin_details']['city_name'] }}</li>
                            <li>Kota Tujuan : {{ $ongkir['destination_details']['city_name'] }}</li>
                            <li>Berat Paket : {{ $ongkir['query']['weight'] }} gram</li>
                        </ul>
                    </h4>

                    @foreach ($ongkir['results'] as $item)
                        <div>
                            <label for="name">Nama : {{ $item['name'] }}</label>

                            @foreach ($item['costs'] as $cost)
                                <div class="mb-3">
                                    <label for="service">Service : {{ $cost['service'] }}</label>

                                    @foreach ($cost['cost'] as $harga)
                                        <div class="mb-3">
                                            <label for="harga">
                                                Harga : {{ $harga['value'] }} (est : {{ $harga['etd'] }} hari)

                                            </label>
                                        </div>

                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                    @endforeach

                @endif
            </div>

            </form>
        </div>
    </div>
</body>
</html>
