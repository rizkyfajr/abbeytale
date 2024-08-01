<?php
namespace App\Services;

use App\Models\Product;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Metric\Distance\Euclidean; // Contoh metrik jarak

class ProductRecommendationService
{
    public function getRecommendations(Product $product, $k = 5) // Parameter k untuk jumlah tetangga terdekat
    {
        // 1. Persiapan Data
        $products = Product::where('id', '!=', $product->id)->get(); // Ambil produk lain
        $samples = [];
        $labels = [];
        foreach ($products as $p) {
            $samples[] = $p->getFeatureVector(); // Fungsi ini harus Anda buat untuk mendapatkan fitur produk
            $labels[] = $p->id;
        }

        // 2. Latih Model k-NN
        $classifier = new KNearestNeighbors($k, new Euclidean()); // Menggunakan metrik Euclidean
        $classifier->train($samples, $labels);

        // 3. Prediksi
        $recommendedProductIds = $classifier->predict($product->getFeatureVector());

        // 4. Ambil Produk Rekomendasi
        return Product::whereIn('id', $recommendedProductIds)->get();
    }
}
