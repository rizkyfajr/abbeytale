<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('caption');
            $table->string('image'); // Store the image file path
            $table->string('link')->nullable(); // Optional link
            $table->boolean('active')->default(true);
            $table->timestamps(); // Created_at and updated_at columns
        });

        // Tabel pembayaran
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama metode pembayaran (misal: Transfer Bank, COD, Kartu Kredit)
            $table->text('description')->nullable(); // Deskripsi opsional
            $table->boolean('active')->default(true); // Status aktif/nonaktif
            $table->timestamps();
        });

        //Tabel Pengiriman
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama jasa pengiriman (misal: JNE, Tiki, GoSend)
            $table->decimal('cost', 8, 2); // Biaya pengiriman
            $table->integer('estimated_days'); // Estimasi hari pengiriman
            $table->boolean('active')->default(true); // Status aktif/nonaktif
            $table->timestamps();
        });


        //setting table
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            // Informasi Umum
            $table->string('site_name')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->text('address')->nullable();

            // Logo & Ikon
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_image')->nullable();

            // Media Sosial
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();

            // Lainnya (opsional)
            $table->string('google_analytics_id')->nullable();
            $table->text('footer_text')->nullable();
            $table->json('additional_settings')->nullable(); // Untuk pengaturan tambahan yang fleksibel

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
        Schema::dropIfExists('shippings');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('website_settings');
    }
};
