<h3><center>Laporan Data Jurusan</center></h3>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>No</th>
      <th>Nama</th>
  </tr>
  @foreach($jurusans as $jurusan)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $jurusan->nama }}</td>
        </tr>
  @endforeach
</table>

