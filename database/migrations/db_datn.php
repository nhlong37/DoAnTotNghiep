<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tạo bảng thương hiệu
        Schema::create('table_product_brand', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng loại sản phẩm
        Schema::create('table_product_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng màu sắc
        Schema::create('table_color', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng kích thước
        Schema::create('table_size', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng sản phẩm
        Schema::create('table_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_brand')->nullable();
            $table->foreign('id_brand')->references('id')->on('table_product_brand')->onDelete('set null');
            $table->unsignedBigInteger('id_type')->nullable();
            $table->foreign('id_type')->references('id')->on('table_product_type')->onDelete('set null');
            $table->string('code', 10)->nullable()->unique();
            $table->string('name');
            $table->mediumText('content')->nullable();
            $table->string('photo')->nullable();
            $table->double('price_regular')->nullable();
            $table->double('sale_price')->nullable();
            $table->string('view')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng thư viện ảnh của sản phẩm
        Schema::create('table_album', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng phụ cho bảng sản phẩm và bảng màu sắc và bảng kích thước
        Schema::create('table_variants_pcs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->unsignedBigInteger('id_color')->nullable();
            $table->foreign('id_color')->references('id')->on('table_color')->onDelete('set null');
            $table->unsignedBigInteger('id_size')->nullable();
            $table->foreign('id_size')->references('id')->on('table_size')->onDelete('set null');
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng vai trò
        Schema::create('table_role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng người dùng
        Schema::create('table_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_role')->nullable();
            $table->foreign('id_role')->references('id')->on('table_role')->onDelete('set null');
            $table->string('name')->nullable();
            $table->integer('gender')->default(0);
            $table->date('birthday')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng comment
        Schema::create('table_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('table_user')->onDelete('set null');
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->mediumText('content')->nullable();
            $table->string('avatar')->nullable();
            $table->string('comment_name')->nullable();
            $table->integer('content_parent_comment')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng đánh giá sao của sản phẩm
        Schema::create('table_rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('table_user')->onDelete('set null');
            $table->integer('rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng hoá đơn
        Schema::create('table_order', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('table_user')->onDelete('set null');
            $table->string('fullname')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('address')->nullable();
            $table->text('content')->nullable();
            $table->string('payment')->nullable();
            $table->string('status')->nullable();
            $table->double('total_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng chi tiết hoá đơn
        Schema::create('table_order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order')->nullable();
            $table->foreign('id_order')->references('id')->on('table_order')->onDelete('set null');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('table_user')->onDelete('set null');
            $table->unsignedBigInteger('id_product')->nullable();
            $table->foreign('id_product')->references('id')->on('table_product')->onDelete('set null');
            $table->unsignedBigInteger('id_color')->nullable();
            $table->foreign('id_color')->references('id')->on('table_color')->onDelete('set null');
            $table->unsignedBigInteger('id_size')->nullable();
            $table->foreign('id_size')->references('id')->on('table_size')->onDelete('set null');
            $table->string('name_product')->nullable();
            $table->string('photo_product')->nullable();
            $table->double('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        //tạo bảng photo
        Schema::create('table_photo', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('link')->nullable();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng bài viết
        Schema::create('table_article', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('content')->nullable();
            $table->string('photo')->nullable();
            $table->integer('view')->default(0);
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        // tạo bảng thiết lập
        Schema::create('table_setting', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('hotline');
            $table->string('email');
            $table->string('fanpage');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('table_variants_pcs');
        Schema::dropIfExists('table_album');
        Schema::dropIfExists('table_product');
        Schema::dropIfExists('table_product_brand');
        Schema::dropIfExists('table_product_type');
        Schema::dropIfExists('table_color');
        Schema::dropIfExists('table_size');
        Schema::dropIfExists('table_role');
        Schema::dropIfExists('table_user');
        Schema::dropIfExists('table_comment');
        Schema::dropIfExists('table_rating');
        Schema::dropIfExists('table_order');
        Schema::dropIfExists('table_order_detail');
        Schema::dropIfExists('table_article');
        Schema::dropIfExists('table_photo');
        Schema::dropIfExists('table_setting');
    }
};
