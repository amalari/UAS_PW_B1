$(function(){
  'use strict';

  $('table').DataTable({
    processing: true,
    serverSide: true,
    "bAutoWidth": false,
    ajax: {
      url : '/dt/ktp',
      type : 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    },
    columns: [
      { className: "dt-body-center", data: 'no', name: 'no' },
      { data: 'nikk', name: 'nikk' },
      { data: 'nik', name: 'nik' },
      { data: 'nama', name: 'nama' },
      { data: 'ttl', name: 'ttl' },
      { data: 'alamat', name: 'alamat' },
      { className: "dt-body-center action", data: 'action', name: 'action' },
    ]
  });

});
