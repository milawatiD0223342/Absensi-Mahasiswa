<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Sistem Absensi Mahasiswa</title>
  </head>
  <body>
    <table border="1">
      <tr>
        <th colspan="2">Sistem Absensi Mahasiswa</th>
      </tr>
    </table>
    <br>
    <table border="1">
      <tr>
        <th colspan="2">Milawati</th>
      </tr>
      <tr>
        <td>NIM</td>
        <td>D022332</td>
      </tr>
      <tr>
        <td>Mata Kuliah</td>
        <td>Framework Web Based</td>
      </tr>
      <tr>
        <td>Tahun</td>
        <td>2025</td>
      </tr>
    </table>
    <br />
    <table border="1">
      <tr>
        <th>Role</th>
        <th>Fitur</th>
      </tr>
      <tr>
        <td>Admin</td>
        <td>
          kelola data dosen,<br />
          kelola data mahasiswa,<br />
          kelola matakuliah & jadwal,<br />
          lihat jadwal kuliah,<br />
          lihat rekap absensi,<br />
          manajemen user & role
        </td>
      </tr>
      <tr>
        <td>Dosen</td>
        <td>
          lihat jadwal kuliah,<br />
          isi absensi mahasiswa,<br />
          lihat rekap absensi
        </td>
      </tr>
      <tr>
        <td>Mahasiswa</td>
        <td>
          lihat jadwal,<br />
          lihat rekap absensi,<br />
          ajukan izin/sakit
        </td>
      </tr>
    </table>
    <br />
    <table border="1">
      <caption>
        Tabel Dosen
      </caption>
      <thead>
        <tr>
          <th>Nama field</th>
          <th>Tipe data</th>
          <th>keterangan</th>
        </tr>
      </thead>
      <tbody>
        <!-- Baris kosong untuk diisi nanti -->
        <tr>
          <td>id</td>
          <td>bigint</td>
          <td>primary key</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>string</td>
          <td>Nama lengkap dosen</td>
        </tr>
        <tr>
          <td>nidn</td>
          <td>string</td>
          <td>Nomor induk dosen nasional</td>
        </tr>
      </tbody>
    </table>
    <br>
    <table border="1">
      <caption>
        Tabel Mahasiswa
      </caption>
      <thead>
        <tr>
          <th>Nama field</th>
          <th>Tipe data</th>
          <th>keterangan</th>
        </tr>
      </thead>
      <tbody>
        <!-- Baris kosong untuk diisi nanti -->
        <tr>
          <td>id</td>
          <td>bigint</td>
          <td>primary key</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>string</td>
          <td>Nama lengkap mahasiswa</td>
        </tr>
        <tr>
          <td>nim</td>
          <td>string</td>
          <td>Nomor induk mahasiswa</td>
        </tr>
      </tbody>
    </table>
    <br>
    <table border="1">
      <caption>
        Tabel Matakuliah
      </caption>
      <thead>
        <tr>
          <th>Nama field</th>
          <th>Tipe data</th>
          <th>keterangan</th>
        </tr>
      </thead>
      <tbody>
        <!-- Baris kosong untuk diisi nanti -->
        <tr>
          <td>id</td>
          <td>bigint</td>
          <td>primary key</td>
        </tr>
        <tr>
          <td>kode</td>
          <td>string</td>
          <td>kode matakuliah</td>
        </tr>
        <tr>
          <td>nama</td>
          <td>string</td>
          <td>Nama matakuliah</td>
        </tr>
        <tr>
          <td>dosen_id</td>
          <td>unsignedBiginteger</td>
          <td>Relasi ke tabel dosen</td>
        </tr>
      </tbody>
    </table>
    <br>
    <table border="1">
      <caption>
        Tabel absensi
      </caption>
      <thead>
        <tr>
          <th>Nama field</th>
          <th>Tipe data</th>
          <th>keterangan</th>
        </tr>
      </thead>
      <tbody>
        <!-- Baris kosong untuk diisi nanti -->
        <tr>
          <td>id</td>
          <td>bigint</td>
          <td>primary key</td>
        </tr>
        <tr>
          <td>mahasiswa_id</td>
          <td>unsignedBigInteger</td>
          <td>Foreign key ke tabel mahasiswa</td>
        </tr>
        <tr>
          <td>matakuliah_id</td>
          <td>unsignedBigInteger</td>
          <td>Foreign key ke tabel matakuliah</td>
        </tr>
        <tr>
          <td>tanggal</td>
          <td>date</td>
          <td>tanggal absensi</td>
        </tr>
        <tr>
          <td>jam</td>
          <td>time</td>
          <td>waktu absensi</td>
        </tr>
        <tr>
          <td>status</td>
          <td>enum</td>
          <td>status kehadiran: hadir,izin,sakit,alpha</td>
        </tr>
      </tbody>
    </table>
    <br>
    <table border="1">
      <tr>
        <th>Tabel Relasi</th>
        <th>Jenis Relasi</th>
        <th>Keterangan</th>
      </tr>
      <tr>
        <td>Matakuliah → Dosen</td>
        <td>Many to One</td>
        <td>Banyak matakuliah diajar oleh satu dosen</td>
      </tr>
      <tr>
        <td>Absensi → Mahasiswa</td>
        <td>Many to One</td>
        <td>Banyak absensi untuk satu mahasiswa</td>
      </tr>
      <tr>
        <td>Absensi → Matakuliah</td>
        <td>Many to One</td>
        <td>Banyak absensi untuk satu matakuliah</td>
      </tr>
    </table>
  </body>
</html>
