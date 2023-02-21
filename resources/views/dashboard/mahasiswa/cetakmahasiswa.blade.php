<h3><center>Laporan Data Mahasiswa</center></h3>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Jurusan</th>
      <th>Alamat</th>
  </tr>
  @foreach($mahasiswas as $mahasiswa)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $mahasiswa->nim }}</td>
        <td>{{ $mahasiswa->nama }}</td>
        <td>{{ $mahasiswa->jenis_kelamin }}</td>
        <td>{{ $mahasiswa->jurusan->nama }}</td>
        <td>{{ $mahasiswa->alamat }}</td>
        </tr>
  @endforeach
</table>