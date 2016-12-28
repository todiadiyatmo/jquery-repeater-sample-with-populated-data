<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Repeater</title>
    <title>jquery.repeater</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
      .daftar-direktori {
        background-color: #E8DDDD;
        padding: 10px;
        margin-bottom:20px;
      }
      .daftar-tautan-single {
        background-color: grey;
        padding: 10px;
        margin-bottom:10px;
      }

      .daftar-tautan-utama-single {
        background-color: grey;
        padding: 10px;
        margin-bottom:10px;
      }
    </style>
</head>
<body>
  <?php

  if( isset($_GET['blank']) ) {
    $data = [
      "judul" => "",
      "konten" => "",
      "konten_html" => "",
      "induk_node" => "",
      "daftar-tautan-utama" => [
        0 => [
          "nama" => "",
          "url" => "",
          "extra_class" => "",
        ]
      ],
      "daftar-direktori" => [
        0 => [
          "judul" => "",
          "konten" => "",
          "judul_url_direktori" => "",
          "url_direktori" => "",
          "daftar-tautan" => [
            0 => [
              "nama" => "",
              "url" => "",
              "extra_class" => ""
            ]
          ]
        ]
      ]
    ];
  }
  else {
    $data = [
      "judul" => "Judul",
      "konten" => "Konten",
      "konten_html" => "Konten HTML",
      "induk_node" => "Induk Node",
      "daftar-tautan-utama" => [
        0 => [
          "nama" => "tautan utama 1",
          "url" => "url tautan utama 1",
          "extra_class" => "extra1class tautan utama 1",
        ],
        1 => [
          "nama" => "tautan utama 2",
          "url" => "url tautan utama 2",
          "extra_class" => "extra1class tautan utama 2",
        ],
      ],
      "daftar-direktori" => [
        0 => [
          "judul" => "direktori 1",
          "konten" => "konten direktori 1",
          "judul_url_direktori" => "judul url direktori 1",
          "url_direktori" => "url direktori 1",
          "daftar-tautan" => [
            0 => [
              "nama" => "direktori 1 tautan 1",
              "url" => "direktori 1 url 1",
              "extra_class" => "direktori 1 class 2"
            ],
            1 => [
              "nama" => "direktori 1 tautan 2",
              "url" => "direktori 1 url 2",
              "extra_class" => "direktori 1 class 2"
            ]
          ]
        ],
        1 => [
          "judul" => "direktori 2",
          "konten" => "konten direktori 2",
          "judul_url_direktori" => "judul url direktori 2",
          "url_direktori" => "url direktori 2",
          "daftar-tautan" => [
            0 => [
              "nama" => "direktori 2 tautan 1",
              "url" => "direktori 2 url 1",
              "extra_class" => "direktori 1 class 2"
            ],
            1 => [
              "nama" => "direktori 2 tautan 2",
              "url" => "direktori 2 url 2",
              "extra_class" => "direktori 1 class 2"
            ]
          ]
        ]
      ]
    ];
  }
  ?>


    <div class='container'>
      <div class='row'>
        <div class='col-md-8'>
          <h2>Form Direktori</h2>
          <a href="?blank=true">Form kosong</a>
          <form action="echo.php" method="POST" class="form-horizontal">
            <!-- Start Data Direktori  -->
            <div class="form-group">
               <label class="col-sm-4 control-label">Judul</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control input-sm" name="judul" value="<?php echo @$data['judul'] ?>" placeholder="Judul">
               </div>
             </div>
            <div class="form-group">
               <label class="col-sm-4 control-label">Konten</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control input-sm" name="konten" placeholder="Konten" value="<?php echo @$data['konten'] ?>">
               </div>
             </div>
            <div class="form-group">
               <label class="col-sm-4 control-label">Konten HTML</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control input-sm" name="konten_html" placeholder="Konten HTML" value="<?php echo @$data['konten_html'] ?>">
               </div>
            </div>
            <div class="form-group">
               <label class="col-sm-4 control-label">Induk Node</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control input-sm" name="induk_node" value="<?php echo @$data['induk_node'] ?>">
               </div>
            </div>
            <!-- End Data Direktori -->

            <!-- start daftar tautan utama -->
            <div class='col-md-6' id="form-tautan-utama">
              <h3>Daftar Tautan Utama</h3>
              <!-- Start Daftar Tautan Utama -->
              <div data-repeater-list="daftar-tautan-utama">
                <?php foreach($data['daftar-tautan-utama'] as $tautanUtama ): ?>
                <div data-repeater-item  class="daftar-tautan-utama-single">

                  <div class="form-group">
                     <label class="col-sm-4 control-label">Nama</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" name="nama" value="<?php echo $tautanUtama['nama'] ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">URL</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control" name="url" value="<?php echo $tautanUtama['url'] ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Extra Class</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" name="extra_class" value="<?php echo $tautanUtama['extra_class'] ?>">
                     </div>
                  </div>


                  <input data-repeater-delete type="button" value="Hapus Tautan Utama" class="btn btn-danger"/>
                </div>
              <?php endforeach ?>
                  <!-- End Daftar Directory Item -->
              </div>
              <input data-repeater-create type="button" value="Tambah Tautan Utama" class="btn btn-success"/>
              <!-- End Daftar Direktori -->
            </div>
            <!-- end daftar tautan utama -->
            <!-- start daftar direktori -->
            <div class='col-md-6 ' id="form-direktori">
              <h3>Daftar Direktori</h3>
              <!-- Start Daftar Direktori -->
              <div data-repeater-list="daftar-direktori">
                <?php foreach($data['daftar-direktori'] as $daftarDirektori ): ?>
                <div data-repeater-item  class="daftar-direktori">

                  <div class="form-group">
                     <label class="col-sm-4 control-label">Judul</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" name="judul" value="<?php echo @$daftarDirektori['judul'] ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Konten</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" name="konten" value="<?php echo @$daftarDirektori['konten'] ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">Judul URL Direktori</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" name="judul_url_direktori" value="<?php echo @$daftarDirektori['judul_url_direktori'] ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-4 control-label">URL Direktori</label>
                     <div class="col-sm-8">
                       <input type="text" class="form-control input-sm" name="url_direktori" value="<?php echo @$daftarDirektori['url_direktori'] ?>">
                     </div>
                  </div>
                  <h4>Daftar Tautan</h4>
                  <!-- Start Daftar Tautan -->
                  <div class="daftar-tautan">
                    <div data-repeater-list="daftar-tautan" class="daftar-tautan-list">
                      <input data-repeater-create type="button" value="Add" class="daftar-tautan-list"/>
                      <?php foreach( @$daftarDirektori['daftar-tautan'] as $daftarTautan  ):  ?>
                      <div data-repeater-item class="daftar-tautan-single">
                        <div class="form-group">
                           <label class="col-sm-4 control-label">Nama</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control input-sm" name="nama" value="<?php echo $daftarTautan['nama'] ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-4 control-label">URL</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" name="url" value="<?php echo $daftarTautan['url'] ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-4 control-label">Extra Class</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control input-sm" name="extra_class" value="<?php echo $daftarTautan['extra_class'] ?>">
                           </div>
                        </div>
                        <input data-repeater-delete type="button" value="Delete" class="btn btn-danger pull-right"/>
                        <br>
                        <br>
                      </div>
                    <?php endforeach; ?>
                    </div>
                  </div>
                  <!-- End Daftar Tautan -->
                  <input data-repeater-delete type="button" value="Hapus Direktori" class="btn btn-danger"/>
                </div>
              <?php endforeach; ?>
                <!-- End Daftar Directory Item -->
              </div>
              <input data-repeater-create type="button" value="Tambah Daftar Direktori" class="btn btn-success"/>
              <!-- End Daftar Direktori -->
            </div>
            <!-- end daftar direktori -->
            <input type='submit' class='btn btn-danger'>
          </form>
        </div>
      </div>
    </div>


    <script src="jquery-1.11.1.js"></script>
    <script src="jquery.repeater.js"></script>
    <script>
    $(document).ready(function () {
        'use strict';

        window.formDirektori = $('#form-direktori').repeater({
            isFirstItemUndeletable: true,
            defaultValues: { 'text-input': 'outer-default' },
            show: function () {
                console.log('outer show');
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                console.log('outer delete');
                $(this).slideUp(deleteElement);
            },
            repeaters: [{
                isFirstItemUndeletable: true,
                selector: '.daftar-tautan',
                defaultValues: { 'inner-text-input': 'inner-default' },
                show: function () {
                    console.log('inner show');
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    console.log('inner delete');
                    $(this).slideUp(deleteElement);
                }
            }]
        });

        window.formTautanUtama = $('#form-tautan-utama').repeater({
            isFirstItemUndeletable: true,
            defaultValues: { 'text-input': 'outer-default' },
            show: function () {
                console.log('outer show');
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                console.log('outer delete');
                $(this).slideUp(deleteElement);
            }
        });
    });
    </script>
</body>
</html>
