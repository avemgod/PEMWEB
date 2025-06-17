<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Produk Kami</title>
<style>
body { font-family: sans-serif; margin: 40px; background-color: #f8f8f8; color: #333; }
.container { max-width: 900px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
h1 { text-align: center; color: #4CAF50; margin-bottom: 30px; }
.product-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
.product-item { border: 1px solid #eee; padding: 20px; border-radius: 8px; background-color: #fff; box-shadow: 0 1px 5px rgba(0,0,0,0.05); }
.product-item h2 { font-size: 1.5em; color: #333; margin-top: 0; margin-bottom: 10px; }
.product-item p { font-size: 0.9em; color: #666; margin-bottom: 5px; }
.product-item .price { font-weight: bold; color: #4CAF50; font-size: 1.2em; margin-top: 15px; }
.no-products { text-align: center; color: #999; }
</style>
</head>
<body>
<div class="container">
<h1>Daftar Produk Kami</h1>
@if ($products->isEmpty())
            <p class="no-products">Belum ada produk yang tersedia.</p>
        @else
            <div class="product-list">
                @foreach ($products as $product)
                    <div class="product-item">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p>Status: {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
                        {{-- Anda bisa tambahkan link untuk melihat detail produk di sini --}}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>