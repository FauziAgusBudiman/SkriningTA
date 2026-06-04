<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePenyakitToTingkatKecanduan extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('aturan', 'penyakit_id')) {
            Schema::table('aturan', function (Blueprint $table) {
                try {
                    $table->dropForeign(['penyakit_id']);
                } catch (\Throwable $e) {}
            });
        }

        if (Schema::hasColumn('hasil', 'penyakit_id')) {
            Schema::table('hasil', function (Blueprint $table) {
                try {
                    $table->dropForeign(['penyakit_id']);
                } catch (\Throwable $e) {}
            });
        }

        if (Schema::hasTable('penyakit') && !Schema::hasTable('tingkat_kecanduan')) {
            Schema::rename('penyakit', 'tingkat_kecanduan');
        }

        if (Schema::hasColumn('tingkat_kecanduan', 'kode_penyakit')) {
            Schema::table('tingkat_kecanduan', function (Blueprint $table) {
                $table->renameColumn('kode_penyakit', 'kode_kecanduan');
            });
        }

        if (Schema::hasColumn('tingkat_kecanduan', 'nama_penyakit')) {
            Schema::table('tingkat_kecanduan', function (Blueprint $table) {
                $table->renameColumn('nama_penyakit', 'nama_kecanduan');
            });
        }

        if (Schema::hasColumn('aturan', 'penyakit_id') && !Schema::hasColumn('aturan', 'kecanduan_id')) {
            Schema::table('aturan', function (Blueprint $table) {
                $table->renameColumn('penyakit_id', 'kecanduan_id');
            });
        }

        if (Schema::hasColumn('hasil', 'penyakit_id') && !Schema::hasColumn('hasil', 'kecanduan_id')) {
            Schema::table('hasil', function (Blueprint $table) {
                $table->renameColumn('penyakit_id', 'kecanduan_id');
            });
        }

        Schema::table('aturan', function (Blueprint $table) {
            try {
                $table->foreign('kecanduan_id')->references('id')->on('tingkat_kecanduan')->cascadeOnDelete();
            } catch (\Throwable $e) {}
        });

        Schema::table('hasil', function (Blueprint $table) {
            try {
                $table->foreign('kecanduan_id')->references('id')->on('tingkat_kecanduan')->cascadeOnDelete();
            } catch (\Throwable $e) {}
        });
    }

    public function down()
    {
        //
    }
}
